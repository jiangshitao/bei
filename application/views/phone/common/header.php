<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport" />
    <title><?php echo isset($title) ? $title : '白菜汽车' ;?></title>
    <meta name="keywords" content="<?php echo isset($keywords) ? $keywords : '网约车,汽车租赁, 二手车网,买车,新车,0首付,分期买车,租车,二手车,贷款买车,网约车购买' ;?>" />
    <meta name="description" content="<?php echo isset($description) ? $description : '白菜汽车专注于汽车销售及金融服务，提供0首付购车、低价出售二手车，100%放心车源、15天可退换、3年6万公里质保' ;?>" />
    <link href="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>css/common.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>js/layer/layer.js"></script>
</head>
<body scroll="no">

<!-- nav -->
<div class="nav clear">
    <div class="nav_top clear">
        <a href="<?php echo site_url('phone');?>" class="fl">
            <div class="nav_fl  clear">
                <img src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/logo.png" class="fl">
                <p class="fr">闪闪金服</p>
            </div>
        </a>
        <div class="nav_fr fr">
            <span>
                菜单
			    <i class="icon-menu"></i>
		    </span>
        </div>
    </div>

    <div class="nav_hide">
        <ul>
            <li><a href="<?php echo site_url('phone');?>">首页</a></li>
            <li><a href="<?php echo site_url('phoneNewCar');?>">新车</a></li>
            <li><a href="<?php echo site_url('phoneUsedCar');?>">二手车</a></li>
        </ul>
    </div>
</div>