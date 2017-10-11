<?php

$cone = $this->router->fetch_class();
$func = $this->router->fetch_method();

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1,minmum-scale=1,maxmum-scale=1,user-scalable=no">
    <title><?php echo isset($title) ? $title : '白菜汽车-用最少的钱，买最好的车' ?></title>
    <meta name="description" content="白菜汽车专注于汽车销售及金融服务，提供0首付购车、低价出售二手车，100%放心车源、15天可退换、3年6万公里质保" />
    <meta name="keywords" content="网约车,汽车租赁, 二手车网,买车,新车,0首付,分期买车,租车,二手车,贷款买车,网约车购买" />

    <!--公用样式文件-->
    <link href="<?php echo rtrim(site_url('static'),'/') . '/' ;?>css/common.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>js/html5shiv.min.js"></script>
    <script src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>js/respond.min.js"></script>
    <![endif]-->

    <!-- Font Awesome -->
    <link href="<?php echo rtrim(site_url('static'),'/') . '/' ;?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo rtrim(site_url('static'),'/') . '/' ;?>css/5icool.org.css" rel="stylesheet" />

    <script type="text/javascript" src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>js/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>js/layer/layer.js"></script>
    <script>var baseURL = "<?php echo rtrim(site_url('static'),'/') . '/' ;?>";</script>
</head>
<body id="body_container">
    <div id="main">
    <!--固定导航-->
        <div class="header_nav">
            <div class="nav_con clear">
                <a href="<?php echo site_url('welcome');?>"  class="nav_logo fl">
                    <img src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>images/logo.png">
                    <p>闪闪金服</p>
                </a>

                <ul class="menu fr">
                    <li data-menuanchor="page">
                        <a href="<?php echo site_url('welcome'); ?>" style="
                        <?php echo $cone == 'welcome' && $func == 'index' ? 'color:#999' : '' ;?>"
                        >
                            首　页
                        </a>
                    </li>

                    <li data-menuanchor="page">
                        <a href="<?php echo site_url('newcar') ?>" style="
                        <?php echo $cone == 'NewCarController' && $func == 'index' ? 'color:#999' : '' ;?>"
                        >新　车</a>
                    </li>

                    <li data-menuanchor="page">
                        <a href="<?php echo site_url('usedcar');?>" style="
                        <?php echo $cone == 'UsedCarController' &&  in_array($func,['index','usedcarDetail']) ? 'color:#999' : '' ;?>"
                        >
                            二手车
                        </a>
                    </li>
                    <!--<li data-menuanchor="page"><a href="#">金融方案</a></li>-->
                    <!--<li data-menuanchor="page"><a href="#">创业加盟</a></li>
                    <li data-menuanchor="page"><a href="#">智慧选车</a></li>-->
                    <li data-menuanchor="page"  class="last"><a href="http://wpa.qq.com/msgrd?v=3&uin=383213654&site=qq&menu=yes" target="_blank">在线客服</a></li>
                </ul>
            </div>
        </div>