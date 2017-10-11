<?php $URI =& load_class('URI', 'core');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport" />
    <title>404页面</title>
    <meta name="description" content="" />
    <link href="<?php echo rtrim($URI->config->config['base_url'],'/') . '/' ;?>static/phone/css/common.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo rtrim($URI->config->config['base_url'],'/') . '/' ;?>static/js/jquery-1.11.1.js"></script>
    <style>
        #body_container{
            background: #fff;
        }
        .page_404{
            position: fixed;
            top:30%;
            width: 100% ;
        }
        .page_404>img{
            width:70%;
            display: block;
            margin:0 auto;
        }
        .page_404>p{
            text-align: center;
            color: #000;
            font-size: 1.0em;
            font-family: "微软雅黑";
            margin:4% 0;
        }
        .page_404 a{
            width:30%;
            height: 2.6em;
            line-height: 2.6em;
            text-align: center;
            border-radius: 5px;
            display: block;
            text-decoration:none;
            font-size: 0.8em;
        }
        .page_404 a:first-child{
            background: #f55600;
            color: #fff;
            float: left;
            margin-right: 2%;
        }
        .page_404 a:last-child{
            background: #e2e2e2;
            color: #666;
            float: left;
        }
        .link{
            width:80%;
            margin-left:24%;
        }

        .footer_nav{
            position: fixed;
            bottom: 0;
        }
    </style>

</head>
<body id="body_container">
<!-- nav -->
<div class="nav clear">
    <div class="nav_top clear">
        <a href="index.html" class="fl">
            <div class="nav_fl  clear">
                <img src="<?php echo rtrim($URI->config->config['base_url'],'/') . '/' ;?>static/phone/images/logo.png" class="fl">
                <p class="fr">闪闪金服</p>
            </div>
        </a>
        <div class="nav_fr fr">
            <img src="<?php echo rtrim($URI->config->config['base_url'],'/') . '/' ;?>static/phone/images/nav_ri.png">
        </div>
    </div>

    <div class="nav_hide">
        <ul>
            <li><a href="<?php echo rtrim($URI->config->config['base_url'],'/') . '/'  . 'phone' ; ?>">首页</a></li>
            <li><a href="<?php echo rtrim($URI->config->config['base_url'],'/') . '/'  . 'phoneNewCar' ; ?>">新车</a></li>
            <li><a href="<?php echo rtrim($URI->config->config['base_url'],'/') . '/'  . 'phoneUsedCar' ; ?>">二手车</a></li>
        </ul>
    </div>
</div>

<div class="page_404">
    <img src="<?php echo rtrim($URI->config->config['base_url'],'/') . '/' ;?>static/phone/images/404.png">
    <p>您访问的页面出现故障，我们正在加紧修复。</p>
    <div class="clear link">
        <a href="<?php echo rtrim($URI->config->config['base_url'],'/') . '/'  . 'phone' ; ?>">返回首页</a>
        <a href="javascript:window.location.reload();">刷新页面</a>
    </div>
</div>

<!-- footer_nav -->
<div class="footer_nav">
    <div class="footer_nav_link">
        <a href="<?php echo rtrim($URI->config->config['base_url'],'/') . '/'  . 'phoneNewCar' ; ?>">新车</a>
        <a href="<?php echo rtrim($URI->config->config['base_url'],'/') . '/'  . 'phoneUsedCar' ; ?>">二手车</a>
        <a href="<?php echo rtrim($URI->config->config['base_url'],'/') . '/'  . 'phone' ; ?>"> 金融方案</a>
    </div>
    <div class="bottom clear">
        <div class="bottom_left fl">
            <span>服务热线  4008-310-130</span>
            <p>上海市闵行区申虹路663号虹桥协心中心2号搂503室</p>
            <p>沪ICP备16008654号-1 上海闪闪互联网金融信息服务有限公司 版权所有</p>
        </div>
        <div class="bottom_right fr">
            <img src="<?php echo rtrim($URI->config->config['base_url'],'/') . '/' ;?>static/phone/images/code.png">
        </div>
        <div class="mask_03"></div>
        <div class="bottom_right_hidden" >
            <img src="<?php echo rtrim($URI->config->config['base_url'],'/') . '/' ;?>static/phone/images/delete_02.png" class="bottom_right_hidden_pic01">
            <img src="<?php echo rtrim($URI->config->config['base_url'],'/') . '/' ;?>static/phone/images/code_02.jpg">
        </div>
    </div>

</div>
<!-- 导航 -->
<script>
    (function (){

        $(".nav_fr").click(function(){

            var n = $(".nav .nav_hide").hasClass("active")
            if( n ){
                $(".nav .nav_hide").removeClass("active")
            }else{
                $(".nav  .nav_hide").addClass("active")
            }

        })
    })();


    /* 底部二维码 */
    $(".bottom_right").click(function(){
        $(".mask_03").css("display","block");
        $(".bottom_right_hidden").css("display","block");
    })
    $(".bottom_right_hidden_pic01").click(function(){
        $(".mask_03").css("display","none");
        $(".bottom_right_hidden").css("display","none");
    })


    $(".money_item").click(function(){
        var x = $(".money_item").index(this)

        var m = $(".money_item .shoufu").eq(x);

        $(".money_item .shoufu").removeClass("active")
        m.addClass("active")

    })

</script>
</body>
</html>
