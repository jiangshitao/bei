<?php

    function getImgPathByName($filename,$is_yun = IS_OPEN_QIUNIUYUN)
    {
        if(empty($filename))return false;

        if($is_yun) return IMAGES_PATH . $filename;

        return rtrim(base_url(),'/') . '/uploads/' . substr($filename,0,4) .'/' . substr($filename,4,2) . '/' .$filename;
        //return 'http://dev.baicaiqiche.com:8044/uploads/' . substr($filename,0,4) .'/' . substr($filename,4,2) . '/' .$filename;
    }

    function getThumbnailImgPathByName($filename,$width,$height,$is_yun = IS_OPEN_QIUNIUYUN)
    {
        if(empty($filename))return false;

        if($is_yun) return QiNiuYunHandle::thumbnail(IMAGES_PATH . $filename,1,$width,$height);

        return rtrim(base_url(),'/') . '/uploads/' . substr($filename,0,4) .'/' . substr($filename,4,2) . '/' .$filename;
    }