<?php


class NewCarController extends BC_Controller
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
        $data = $params = [] ;

        $data['pageNumber'] = $params['pageNumber'] = (int) $this->input->get('page',true) ? (int) $this->input->get('page',true) : 1;
        $data['pageSize']   = $params['pageSize']   = (int) $this->input->get('pageSize',true) ? (int) $this->input->get('pageSize',true) : 8;
        $params['status'] = 0;

        $this->getResultByCurl(API_URL . 'sharkapi/action/car/allCarBaseinfo.html',$params);

        $data['new_car_data'] = isset(self::$result['arrays']) ? self::$result['arrays'] : [] ;

        //var_dump($data['new_car_data']);exit;

        $data['title'] = '白菜汽车-全国新车,新车,新车购买';

        //$data['csrf'] = [ 'name' => $this->security->get_csrf_token_name(),'hash' => $this->security->get_csrf_hash()];

        $this->load->view('newcar/index',$data);
    }

    public function NewCarCreateReservation()
    {
        if($this->input->post())
        {
            if( ! ($card_id = $this->input->post('carId',true)))
            {
                $card_id = '8a28d72758d6fc500158d716ff510064';
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