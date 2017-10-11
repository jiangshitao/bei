<?php

class UsedCarController extends BC_Controller
{
    public function __construct()
    {
        parent::__construct();

        if(isMobile())
        {
            redirect(site_url('phone'));
        }
    }

    public function index()
    {
        $data = $params = [];

        $data['pageNumber'] = $params['pageNumber'] = (int) $this->input->get('page',true) ? (int) $this->input->get('page',true) : 1;
        $data['pageSize']   = $params['pageSize']   = (int) $this->input->get('pageSize',true) ? (int) $this->input->get('pageSize',true) : 9;
        $params['status'] = 0 ;
        $this->getResultByCurl(API_URL . 'sharkapi/action/usedcar/allCarBaseinfo.html',['pageSize' => 9 , 'pageNumber' => 1]);

        $data['usedcardata'] = isset(self::$result['arrays']) ? self::$result['arrays'] : [] ;
        $data['total'] = isset(self::$result['total']) ? self::$result['total'] : 0 ;

        $data['title'] = '白菜汽车-上海二手车,二手车购买,二手车服务|贷款买车|分期买车|';

        //var_dump($data['usedcardata']);exit;

        $this->load->view('usedcar/index',$data);
    }

    public function usedcarDetail($id)
    {

        $data = [] ;

        $this->getResultByCurl(API_URL . 'sharkapi/action/usedcar/usedCarDetailInfo.html',['carInfoId' => $id]);
        $data['car_data'] = self::$result;

        $data['title'] = $data['car_data']['carBrand'];

        $this->load->view('usedcar/detail',$data);
    }
}