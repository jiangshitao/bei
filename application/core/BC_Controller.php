<?php

class BC_Base_Controller extends CI_Controller
{
    //错误状态码
    protected static $errcode = 200;
    //错误信息
    protected static $errmsg  = NULL;
    //请求状态
    protected static $reqsts  = false;
    //返回的数据
    protected static $result  = [];
    //token
    protected static $token = NULL;

    public function __construct()
    {
        parent::__construct();

        $this->getAccessToken();
    }

    public function getResultByCurl($url,$params = array() , $method = 'get' , $is_encode = false )
    {
        if( ! $url)
        {
            self::rtnErrArrMsg(-200,'接口地址错误!');
        }

        if( ! is_array($params))
        {
            self::rtnErrArrMsg(-200,'参数为数组!');
        }

        if ( ! in_array($method,array('get', 'post', 'put', 'delete')))
        {
            self::rtnErrArrMsg(-200,'请求方法错误!');
        }

        $orgCode = 'shshanshanche01';
        $transNo = 'trans' . date('Ymd',time()) . rand(1000,9999);
        $batchNo = 'batch' . date('Ymd',time()) . rand(1000,9999);
        $sign    = md5( $orgCode . $transNo . SEQ_NO );
        //$sign    = '5CBB24133D8BB621DAE84AAE619C5FBF';

        $params['batchNo'] = $batchNo;

        $arr = [
            'header' => [
                'orgCode' => $orgCode,
                'transNo' => $transNo,
                'token'   => self::$token ,
                'transDate' => date('Y-m-d H:i:s',time())
            ],
            'busiData' => $params,
            'securityInfo' => ['sign' => $sign]
        ];

        $data = CurlHandle::send($url,['content' => base64_encode(json_encode($arr))],$method);

        if(empty($data))
        {
            self::rtnErrArrMsg(-200,'接口错误!');
        }

        if( ! ($data = json_decode(base64_decode($data),true)))
        {
            self::rtnErrArrMsg(-200,'接口错误!');
        }

        if( ! isset($data['header']) ||  ! isset($data['busiData']) ||  ! isset($data['securityInfo']))
        {
            self::rtnErrArrMsg(-200,'接口错误!');
        }

        if(isset($data['securityInfo']['sign']) && $data['securityInfo']['sign'] != $sign)
        {
            self::rtnErrArrMsg(-200,'验签失败');
        }

        switch ($data['header']['resultMsg'])
        {
            case '1000':
                self::$result = $data['busiData'];
                self::$reqsts = true;
                break;
            case '1001':
                self::rtnErrArrMsg(1001,'查询必填项为空');
                break;
            case '1002':
                self::rtnErrArrMsg(1002,'验签失败');
                break;
            case '1003':
                self::rtnErrArrMsg(1003,'网络超时');
                break;
            case '1004':
                self::rtnErrArrMsg(1004,'读取请求数据IO异常');
                break;
            case '1005':
                self::rtnErrArrMsg(1005,'用户名活密码错误');
                break;
            case '1006':
                self::rtnErrArrMsg(1006,'用户已禁用');
                break;
            case '1010':
                self::rtnErrArrMsg(1010,'json格式异常');
                break;
            case '1011':
                self::rtnErrArrMsg(1011,'json非法索引访问数组时异常');
                break;
            case '1012':
                self::rtnErrArrMsg(1012,'json数组下标越界异常');
                break;
            case '1013':
                self::rtnErrArrMsg(1013,'json参数类型错误');
                break;
        }
    }

    public static function rtnErrArrMsg($code = 200,$msg = NULL)
    {
        self::$errcode = $code ;
        self::$errmsg = $msg ;
        return false;
    }

    public function getAccessToken()
    {

        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

        if ( ! ($token = $this->cache->get(md5('token'))))
        {
            $url = API_URL . "modules/login.html";

            $params = ['userName' => 'wanglei','password' => 'f1737b82b7aa12909eba9f6ae3a463ce'];

            $this->getResultByCurl($url,$params);

            if(self::$reqsts)
            {
                $token = self::$result['token'];

                $this->cache->save(md5('token'), $token , 3600);
            }


        }

        self::$token = $token;
    }


}

class BC_Controller extends BC_Base_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

}

class BC_Admin_Controller extends BC_Base_Controller
{
    protected static $user = NULL;

    public function __construct()
    {
        parent::__construct();

        $this->checkLogin();
    }

    public function checkLogin()
    {
        self::$user = $this->input->cookie(md5(COOKIENAME)) ? unserialize(base64_decode($this->input->cookie(md5(COOKIENAME)))) : NULL ;

        if(empty(self::$user))
        {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'))
            {
                die("-200");
            }
            else
            {
                redirect(site_url('adminLogin'));
            }
        }
    }

    /**
     * 分页样式
     *
     * @param int $total 数据总条数
     * @param int $page  当前第几页  默认第一页
     * @param int $size  每页显示多少条 默认50条
     * @param int $num   展示多少个分页按钮 默认(5个),最好传奇数
     * @param string $name 分页参数的名称 默认是page
     * @return string
     *
     */
    public function getPage($total = 0 , $page = 1 , $size = 50 , $num = 5 , $name = 'page')
    {
        if(empty($total)) return '';

        $num = intval($num) < 5 ? 5 : intval($num);

        //总页数
        $count_page = ceil(intval($total)/$size);

        //拼接URL，如果url中没有page参数
        if( false === strpos($_SERVER['REQUEST_URI'],$name))
        {
            $url = false === strpos($_SERVER['REQUEST_URI'],'?') ? $_SERVER['REQUEST_URI'] . '?'.$name.'=' : $_SERVER['REQUEST_URI'] . '&'.$name.'=';
        }
        else
        {   //有page参数
            $url = substr($_SERVER['REQUEST_URI'],0,(strpos($_SERVER['REQUEST_URI'],$name) + strlen($name) + 1));
        }

        $str = '';
        $str .= '<ul class="pagination pagination-sm">';

        //第一页
        $str .= '<li class="' . ($page <= 1 ? 'disabled' : '' ) . '"><a href="' . $url  . 1 . '"><i class="ace-icon fa fa-angle-double-left"></i></a></li>';
        //上一页
        $str .= '<li class="' . ($page <= 1 ? 'disabled' : '' ) . '"><a href="' . $url  . ($page-1) . '"><i class="ace-icon fa fa-angle-left"></i></a></li>';

        //如果总页数小于要展示的页数按钮，则直接展示
        if($count_page <= $num)
        {
            for($i=1;$i<=$count_page;$i++)
            {
                $str .= '<li class="'. ($page == $i ? 'active' : '') .'"><a href="' . $url . $i . '">' . $i . '</a></li>';
            }
        }
        else
        {
            //如果当前也是大于要展示按钮数的一半时
            if($page > intval($num / 2))
            {
                //拼接小于当前页数的部分
                for($i = intval($num / 2);$i > 0;$i--)
                {
                    //$i 的值为 2,1
                    if(($page - $i) > 0)
                    {
                        $str .= '<li><a href="' . $url . ($page-$i) . '">' . ($page-$i) . '</a></li>';
                    }
                }

                //拼接大于当前页数的部分
                for($i = 0 ;$i <= intval($num / 2) ; $i++)
                {
                    //$i 的值为 0,1,2
                    if($count_page > ($page + $i))
                    {
                        $str .= '<li '.((($page + $i) == $page) ?  'class="active"' : '') .'><a href="' . $url . ($page+$i) . '">' . ($page+$i) . '</a></li>';
                    }
                }
            }
            else
            {
                //如果当前也是小于要展示按钮数的一半时,直接展示
                for($i=1;$i<=$num;$i++)
                {
                    $str .= '<li class="'. ($page == $i ? 'active' : '') .'"><a href="' . $url . $i . '">' . $i . '</a></li>';
                }
            }
        }

        //下一页
        $str .= '<li class="' . (($page+1) > $count_page ? 'disabled' : '' ) . '"><a href="' . $url . ($page+1) . '"><i class="ace-icon fa fa-angle-right"></i></a></li>';

        //最后一页
        $str .= '<li class="' . (($page+1) > $count_page ? 'disabled' : '' ) . '"><a href="' . $url . $count_page . '"><i class="ace-icon fa fa-angle-double-right"></i></a></li>';

        $str .= '</ul>';

        return $str;
    }
}

