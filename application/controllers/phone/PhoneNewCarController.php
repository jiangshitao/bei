<?php

class PhoneNewCarController extends BC_Controller
{
    public function index()
    {
        $data = $params = [] ;

        $data['pageNumber'] = $params['pageNumber'] = (int) $this->input->get('page',true) ? (int) $this->input->get('page',true) : 1;
        $data['pageSize']   = $params['pageSize']   = (int) $this->input->get('pageSize',true) ? (int) $this->input->get('pageSize',true) : 8;
	$params['status'] = 0 ;
        $this->getResultByCurl(API_URL . 'sharkapi/action/car/allCarBaseinfo.html',$params);

        $data['car_data'] = isset(self::$result['arrays']) ? self::$result['arrays'] : [] ;
        //var_dump($data['car_data']);exit;
        $data['title']  = '白菜汽车-全国新车,新车,新车购买';
        $data['keywords'] = '买车，新车，新车购买，全国质保，0首付卖车，分期买车，新车资讯，汽车资料，详情4008310130';

        $this->load->view('phone/newcar/index',$data);
    }

    public function carDetail($id)
    {
        $this->getResultByCurl(API_URL . 'sharkapi/action/car/carinfodetail.html',['carInfoId' => $id]);

        $data['car_data'] = isset(self::$result) ? self::$result : [];

        $data['car_name'] = isset($data['car_data']['carBrand']['carBrandObj']) ? current($data['car_data']['carBrand']['carBrandObj']) : '' ;

        $data['title'] = $data['car_name']['name'] . '-白菜汽车';
        //var_dump( $data['car_data']);exit;
        $data['keywords'] =
            $data['car_data']['carType'] . ' ' .
            $data['car_data']['description'] . ' ' .
            $data['car_data']['carDisplacement'] . ' ' .
            intval($data['car_data']['carMarketPrice']) / 10000 . '万' .  ' ' .
            '详情4008310130';

        $data['description'] = '白菜汽车专注于汽车销售及金融服务，提供0首付购车、低价出售二手车，100%放心车源、15天可退换、3年6万公里质保';

        //$data['csrf'] = [ 'name' => $this->security->get_csrf_token_name(),'hash' => $this->security->get_csrf_hash()];

        $this->load->view('phone/newcar/detail',$data);
    }

    public function PhoneNewCarCreateReservation()
    {
        if($this->input->post())
        {
            if( ! ($card_id = $this->input->post('carId',true)))
            {
                $card_id = '4028810a58c3663f0158c36b375f0005' ;
            }

            if( ! ($name = $this->input->post('name',true)))
            {
                die(json_encode(['code' => 201 ,'msg' => '姓名错误']));
            }

            if( ! ($phone = $this->input->post('phone',true)))
            {
                die(json_encode(['code' => 201 ,'msg' => '手机号码错误']));
            }

            if( ! preg_match(PHONE_PATTERN,$phone))
            {
                die(json_encode(['code' => 201 ,'msg' => '手机号码错误']));
            }

            $arr = [
                'cardId' => $card_id,
                'userName' => $name,
                'userPhone' => $phone,
                'status' => '1',
                'description' => '',
            ];

            $this->getResultByCurl( API_URL . 'sharkapi/action/carReservation/addcarreservation.html',$arr);
        }

        die(json_encode(['code' => self::$errcode , 'msg' => self::$errmsg]));
    }
}
