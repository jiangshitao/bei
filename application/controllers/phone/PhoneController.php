<?php


class PhoneController extends BC_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [];

        $url = API_URL . 'modules/carBanner/queryList.html';
        $this->getResultByCurl($url);
        $data['list'] = isset(self::$result['arrays']) ? self::$result['arrays'] : [] ;

        $this->getResultByCurl(API_URL . 'sharkapi/action/car/allCarBaseinfo.html',
            ['status' => 0 ,'isPush' => 1,'pageNumber' => 1, 'pageSize' => 5 , 'addTime' => 'desc']
        );

        $data['newcar'] = isset(self::$result['arrays']) ? self::$result['arrays'] : [] ;
        $data['carBrand'] = [] ;

        if(!empty($data['newcar']))
        {
            foreach ($data['newcar'] as $key => $value)
            {
                $data['carBrand'][$key] = $value['carBrandObj']['2'];
            }
        }

        $data['title'] = '白菜汽车-用最少的钱，买最好的车';
        $data['keywords'] = '网约车,汽车租赁, 二手车网,买车,新车,0首付,分期买车,租车,二手车,贷款买车,网约车购买';
        $data['description'] = '白菜汽车专注于汽车销售及金融服务，提供0首付购车、低价出售二手车，100%放心车源、15天可退换、3年6万公里质保';

        $this->load->view('phone/index',$data);
    }

}