<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends BC_Controller {

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
	    $data = [];
        //$data['csrf'] = [ 'name' => $this->security->get_csrf_token_name(),'hash' => $this->security->get_csrf_hash()];
        $url = API_URL . 'modules/carBanner/queryList.html';
        $this->getResultByCurl($url);
        $data['list'] = isset(self::$result['arrays']) ? self::$result['arrays'] : [] ;

        $this->getResultByCurl(API_URL . 'sharkapi/action/car/allCarBaseinfo.html',['isPush' => 1,'pageNumber' => 1, 'pageSize' => 6]);
        $data['newcar'] = isset(self::$result['arrays']) ? self::$result['arrays'] : [] ;
        $data['carBrand'] = [] ;

        if(!empty($data['newcar']))
        {
            foreach ($data['newcar'] as $key => $value)
            {
                $data['carBrand'][$key] = $value['carBrandObj']['2'];
            }
        }

		$this->load->view('welcome_message',$data);
	}

	public function TestApi()
    {
        $url = 'http://192.168.1.116:8080/modules/carHomeDisplay/query.html';
        $this->getResultByCurl($url,['type' => 1]);

        //$url = 'http://192.168.1.116:8080/modules/carHomeDisplay/add.html';
        $arr = [
            'type' => 1,
            'title' => '新车推荐位',
            'targetId' => '4028810a58dc8a370158dc8b14350015',
            'status' => 1,
            'sysId' => 1,
        ];

        //$this->getResultByCurl($url,$arr);
        var_dump(self::$result['arrays']);

        //$url = 'http://192.168.1.116:8080/modules/carHomeDisplay/del.html';
        //$this->getResultByCurl($url,['id' => '4028b88158dc8a0f0158dc93695b0000']);
        //var_dump(self::$result);
    }

	public function testFileUpload()
    {
        // 要上传文件的本地路径
        $filePath = UPLOAD_PATH  . '3.jpg';

        // 上传到七牛后保存的文件名
        $key = 'test-test.jpg';

        //$rst = QiNiuYunHandle::getFileInfo('test.jpg');
        //$rst = QiNiuYunHandle::thumbnail('http://picsrc.baicaiqiche.com/test.jpg',1,400,400);
        //var_dump($rst);
    }

    public function importData()
    {
        $this->load->library('PHPExcel');
        //$php_excel = new PHPExcel();
        $PHPReader = new PHPExcel_Reader_Excel2007();        //建立reader对象

        $filePath = UPLOAD_PATH . 'newcardata.xlsx';

        if( ! $PHPReader->canRead($filePath))
        {
            $PHPReader = new PHPExcel_Reader_Excel5();

            if( ! $PHPReader->canRead($filePath))
            {
                return false;
            }
        }

        $PHPExcel = $PHPReader->load($filePath);        //建立excel对象
        $currentSheet = $PHPExcel->getSheet(0);        //**读取excel文件中的指定工作表*/
        $allColumn = $currentSheet->getHighestColumn();        //**取得最大的列号*/
        $allRow = $currentSheet->getHighestRow();        //**取得一共有多少行*/
        $data = array();

        $arr = [
            'B' => 'position',
            'C' => 'car_type',
            'D' => 'guide_price',
            'E' => 'real_price',
            'F' => 'description',
            'G' => 'car_vol',
            'H' => 'fuel_consumption',
            'I' => 'wheelbase',
            'J' => 'max_power',
            'K' => 'max_torque',
            'L' => 'gearbox',
            'M' => 'video',
            'N' => 'images_names',
            'O' => 'images_dir_name',
        ];

        for($rowIndex=3;$rowIndex<=$allRow;$rowIndex++){        //循环读取每个单元格的内容。注意行从1开始，列从A开始

            for($colIndex='B';$colIndex<=$allColumn;$colIndex++){

                $addr = $colIndex.$rowIndex;
                $cell = $currentSheet->getCell($addr)->getValue();

                if($cell instanceof PHPExcel_RichText){ //富文本转换字符串
                    $cell = $cell->__toString();
                }

                $data[$rowIndex][$arr[$colIndex]] = $cell;
            }
        }

        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $this->cache->save('newcardata', $data, 15*24*3600);

        echo '导入数据成功' ;
       //var_dump($data);
    }

    public function importusedCarData()
    {
        $this->load->library('PHPExcel');
        //$php_excel = new PHPExcel();
        $PHPReader = new PHPExcel_Reader_Excel2007();        //建立reader对象

        $filePath = UPLOAD_PATH . 'usedcardata.xlsx';

        if( ! $PHPReader->canRead($filePath))
        {
            $PHPReader = new PHPExcel_Reader_Excel5();

            if( ! $PHPReader->canRead($filePath))
            {
                return false;
            }
        }

        $PHPExcel = $PHPReader->load($filePath);        //建立excel对象
        $currentSheet = $PHPExcel->getSheet(0);        //**读取excel文件中的指定工作表*/
        $allColumn = $currentSheet->getHighestColumn();        //**取得最大的列号*/
        $allRow = $currentSheet->getHighestRow();        //**取得一共有多少行*/
        $data = array();

        $arr = [
            'A' =>  'car_name' ,
            'B' =>  'open_time' ,
            'C' =>  'car_price',
            'D' =>  'car_real_price' ,
            'E' =>  'driven_distance',
            'F' =>  'first_register_time',
            'G' =>  'car_location',
            'H' =>  'car_transmission' ,
            'I' =>  'car_vol',
            'J' =>  'car_emission_standards' ,
            'K' =>  'quality_assurance_time' ,
            'L' =>  'car_color',
            'M' =>  'car_type',
            'N' =>  'fuel_label' ,
            'O' =>  'car_description',
            'P' =>  'car_images',
            'Q' =>  'car_images_dir_name',
            'R' =>  'car_id'
        ];

        for($rowIndex=2;$rowIndex<=$allRow;$rowIndex++){        //循环读取每个单元格的内容。注意行从1开始，列从A开始

            for($colIndex='A';$colIndex<=$allColumn;$colIndex++){

                $addr = $colIndex.$rowIndex;
                $cell = $currentSheet->getCell($addr)->getValue();

                if($cell instanceof PHPExcel_RichText){ //富文本转换字符串
                    $cell = $cell->__toString();
                }

                if(in_array($colIndex,['B','F']))
                {
                    $data[$rowIndex][$arr[$colIndex]] = gmdate("Y-m-d H:i", PHPExcel_Shared_Date::ExcelToPHP($PHPExcel->getActiveSheet()->getCell("$colIndex$rowIndex")->getValue()));
                }
                else
                {
                    $data[$rowIndex][$arr[$colIndex]] = $cell;
                }
            }
        }

        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $this->cache->save('usedcardata', $data, 15*24*3600);

        echo '导入数据成功' ;
        //var_dump($data);
    }
}
