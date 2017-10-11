<?php

class PhoneUsedCarController extends BC_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $params = [] ;

        $data['pageNumber'] = $params['pageNumber'] = (int) $this->input->get('page',true) ? (int) $this->input->get('page',true) : 1;
        $data['pageSize']   = $params['pageSize']   = (int) $this->input->get('pageSize',true) ? (int) $this->input->get('pageSize',true) : 10;
	$params['status'] = 0 ;
        $this->getResultByCurl(API_URL . 'sharkapi/action/usedcar/allCarBaseinfo.html',$params);
        $data['usedcardata'] = isset(self::$result['arrays']) ? self::$result['arrays'] : [] ;
        //var_dump($data['usedcardata']);exit;
        $data['title'] = '白菜汽车-上海二手车,二手车购买,二手车服务|贷款买车|分期买车|';
        $data['keywords'] = '买车，低价二手车，二手车购买，汽车租赁，15天可退换，3年6万公里质保，详情4008310130';
        $this->load->view('phone/usedcar/index',$data);
    }

    public function carDetail($id)
    {
        $this->getResultByCurl(API_URL . 'sharkapi/action/usedcar/usedCarDetailInfo.html',['carInfoId' => $id]);
        $data['car_data'] = self::$result;
        //var_dump($data['car_data']);exit;
        $data['title'] = isset($data['car_data']['carBrand']) ? $data['car_data']['carBrand'] . '-白菜汽车': '二手车-详情';

        $data['keywords'] =
            $data['car_data']['carBrand'] . ' ' .
            $data['car_data']['carLocation'] . ' ' .
            intval($data['car_data']['drivenDistance']) / 10000 . '万公里' . ' ' .
            $data['car_data']['carDisplacement'] . ' , ' .
            intval($data['car_data']['carGuidancePrice']) / 10000 . '万' .  ' ' .
            '详情4008310130';

        $data['description'] = '白菜汽车专注于汽车销售及金融服务，提供0首付购车、低价出售二手车，100%放心车源、15天可退换、3年6万公里质保';

        $this->load->view('phone/usedcar/detail',$data);
    }

}
