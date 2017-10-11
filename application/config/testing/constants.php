<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//上传路径
defined('UPLOAD_PATH') OR define('UPLOAD_PATH', FCPATH  . 'uploads/');

//后台APIURL
defined('API_URL') OR define('API_URL', 'http://dev.baicaiqiche.com:8089/');
//defined('API_URL') OR define('API_URL', 'http://192.168.1.138:8081/');

defined('SEQ_NO') OR define('SEQ_NO', '2F02DBA074DE64A5D32A57227FE6337A');

defined('COOKIENAME') OR define('COOKIENAME', 'bcqcadmin');

defined('BASE_UPLOAD_PATH')    OR define('BASE_UPLOAD_PATH',rtrim(APPPATH,'/') . '/../uploads/');

defined('IMAGES_PATH')    OR define('IMAGES_PATH','http://picsrc.baicaiqiche.com/');

defined('IS_OPEN_QIUNIUYUN')    OR define('IS_OPEN_QIUNIUYUN',TRUE);