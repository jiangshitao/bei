<?php $this->load->view('phone/common/header'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>css/swiper.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>css/used_car_details.css" />
    <style type="text/css">
        /* tab  CSS开始 */
        .tabBox .hd{ height:50px; line-height:50px;  font-size:20px; margin-bottom: 0%;border-bottom:1px solid #e5e5e5;}
        .tabBox .hd ul{ overflow:hidden;  }
        /*.tabBox .hd ul li{ float:left; margin:0 2.5%; color:#515151;font-size:0.8em;  }*/
        .tabBox .hd ul li{ float:left;
            width:50%; color:#515151;font-size:0.8em; text-align: center }
        .tabBox .hd ul .on{ border-bottom:2px solid #e66923; color:#e66923; font-size:0.8em; }
        .tabBox .hd ul .on a{ display:block; /* 修复Android 4.0.x 默认浏览器当前样色无效果bug */  }
        .tabBox .bd a{ -webkit-tap-highlight-color:rgba(0,0,0,0); }  /* 去掉链接触摸高亮 */
        .tabBox .bd li a{ color:#555;  }
        .tabBox .bd .t{ height:85px; overflow:hidden;   }
        .tabBox .bd .t .pic{ width:130px; float:left;    }
        .tabBox .bd .t .con{ margin-left:130px; line-height:20px;   }
        .tabBox .bd .t .con p{ font-size:12px; color:#999;  }
        /* tab  CSS结束 */


        /* 第三部分开始 */
        .swiper-container2 {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .swiper-slide2 {
            background-position: center;
            background-size: cover;
            width: 40%;
            box-shadow: #c7c6c6 0px 0px 10px;
            text-align: center;
            padding:5% 10%;
        }
        /* 第三部分结束 */

    </style>
    <!--banner-->
    <div style="margin-top:50px;">
        <div class="swiper-container swiper-container1 swiper-container-horizontal">
            <div class="swiper-wrapper swiper-slide1" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                <?php foreach ($car_data['picture'] as $val): ?>
                    <div class="swiper-slide swiper-slide1">
                        <img src="<?php echo getThumbnailImgPathByName($val,640,480);?>" />
                    </div>
                <?php endforeach;?>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination  swiper-pagination1 swiper-pagination-clickable swiper-pagination-bullets">
                <?php foreach ($car_data['picture'] as $val): ?>
                    <span class="swiper-pagination-bullet"></span>
                <?php endforeach;?>
            </div>
        </div>
    </div>
    <!-- details_info -->
    <div class="details_info clear">
        <div class="details_info_left fl">
            <h2><?php echo isset($car_data['carBrand']) ? $car_data['carBrand'] : '' ;?></h2>
            <div class="clear price">
                <p class="fl new_price">
                    <span><?php echo isset($car_data['carGuidancePrice']) ? intval($car_data['carGuidancePrice']) / 10000 : 0 ;?></span>万
                    &nbsp;&nbsp;新车指导价
                    <span><del><?php echo isset($car_data['carMarketPrice']) ? intval($car_data['carMarketPrice']) / 10000 : 0 ;?></del></span>万</p>
            </div>
            <ul class="clear list-service">
                <li class="fl">三天包退</li>
                <li class="fl">七天包换</li>
                <li class="fl">
                    <span>6</span>
                    万公里质保
                </li>
            </ul>
        </div>
        <a href="#"   class="fr details_info_right share" >
            <i class="icon-share"></i>
            <p>分享抢红包</p>
        </a>
    </div>
    <div class="details_info02">
        <h2>车辆说明</h2>
        <p>
            <?php echo isset($car_data['carExplanation']) ? $car_data['carExplanation'] : '' ;?>
        </p>
    </div>

    <!-- tab -->
    <div id="content">
        <div id="leftTabBox" class="tabBox item_con">
            <div class="bd item_con">
                <div class="car_info clear">
                    <ul class="fl">
                        <li>
                            <p>所在地</p>
                            <span> <?php echo isset($car_data['carLocation']) ? $car_data['carLocation'] : '' ;?></span>
                        </li>
                        <li>
                            <p>初登时间</p>
                            <span>
                                <?php
                                    echo isset($car_data['firstRegisterTime']) ?
                                        date('Y-m-d',strtotime($car_data['firstRegisterTime'])) : '' ;
                                ?>
                            </span>
                        </li>
                        <li>
                            <p>汽车排量</p>
                            <span><?php echo isset($car_data['carDisplacement']) ? $car_data['carDisplacement'] : '' ;?></span>
                        </li>
                    </ul>
                    <ul class="fl">
                        <li>
                            <p>变速箱</p>
                            <span> <?php echo isset($car_data['transmission']) ? $car_data['transmission'] : '' ;?></span>
                        </li>
                        <li>
                            <p>排放标准</p>
                            <span><?php echo isset($car_data['emissionStandards']) ? $car_data['emissionStandards'] : '' ;?></span>
                        </li>
                        <!--<li>
                            <p>质保到期</p>
                            <span><?php /*echo isset($car_data['quality_assurance_time']) ? $car_data['quality_assurance_time'] : '' ;*/?></span>
                        </li>-->
                    </ul>
                </div>

                <ul class="item_con_list">
                    <?php foreach ($car_data['picture'] as $val): ?>
                        <div class="swiper-slide swiper-slide1">
                            <img src="<?php echo getImgPathByName($val) ;?>" />
                        </div>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
    <!-- bottom -->
    <div class="bottom">
        <a class="fl appointment" data-id="<?php echo $car_data['id'] ;?>">立即下单</a>
        <a class="fr appointment_02" data-id="<?php echo $car_data['id'] ;?>">贷款计算器</a>
    </div>

    <!-- 立即下单 -->
    <div class="mask"></div>
    <div class="bounced">
        <form class="form_01" id="form_01">
            <h2>您的联系方式</h2>
            <img src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/delete.jpg" class="delete">
            <span id="span_usesr"></span>
            <input placeholder="您的姓名"  class="name">
            <input placeholder="您的电话"  class="tel">
            <input value="立即预约" type="button" class="btn">
        </form>
    </div>

    <!-- 下单成功 -->
    <div class="mask_02"></div>
    <div class="bounced_pic">
        <img src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/mask_02.png">
        <img src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/know.png" class="know" >
    </div>

    <!-- 贷款计算器 -->
    <div class="bounced_02">
        <div class="calculator">
            <div class="title clear">
                <h2 class="fl">贷款计算器</h2>
                <img class="fr delete_02" src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/delete.jpg" >
            </div>
            <div class="fenqi_list clear"
                 data-car-vol="<?php echo floatval($car_data['carDisplacement']) > 1.6 ? 1 : 2;?>"
                 data-car-real-price="<?php echo floatval($car_data['carGuidancePrice']); ?>"
            >
                <ul class="top clear">
                    <h2>首付</h2>
                    <li class="active" data-firstpay="20">
                        <a>20%</a>
                    </li>
                    <li  data-firstpay="30">
                        <a>30%</a>
                    </li>
                    <li data-firstpay="40">
                        <a>40%</a>
                    </li>
                    <li data-firstpay="50">
                        <a>50%</a>
                    </li>
                </ul>
                <ul class="down clear">
                    <h2>期数</h2>
                    <li class="active" data-period="12">
                        <a>12期</a>
                    </li>
                    <li data-period="24">
                        <a>24期</a>
                    </li>
                    <li data-period="36">
                        <a>36期</a>
                    </li>
                </ul>
            </div>
        </div>
        <!--  conclusion -->
        <h2 class="pay_h2">计算结果</h2>
        <ul class="pay clear">
            <li>
                <p>首付</p>
                <span>0</span>
            </li>
            <li>
                <p>月付</p>
                <span>4300</span>
            </li>
            <li>
                <p>保证金</p>
                <span>5000</span>
            </li>
        </ul>
        <form class="form_01" id="form_02">
            <h2>联系方式</h2>
            <span id="span_usesr_02"></span>
            <input type="text" placeholder="您的姓名"  class="name_02">
            <input type="text" placeholder="您的电话"  class="tel_02">
            <input type="hidden" name="car-id" value="" />
            <input value="立即预约" type="button" class="btn_02">
        </form>
    </div>
    <div id="tophovertree" title="返回顶部"></div>
    <!-- 下单成功 -->
    <div class="mask_02"></div>
    <div class="bounced_pic">
        <img src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/mask_02.png">
        <img src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/know.png" class="know" >
    </div>
    <div class="bounced_pic_03">
        <img src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/mask_03.png">
        <img src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/know.png" class="know" >
    </div>
    <!-- div结束 -->
    <script type="text/javascript" src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>js/swiper.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>css/icon_style.css" />
    <script type="text/javascript" src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>/js/go_top.js"></script>
    <script src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>js/TouchSlide.1.1.js"></script>
    <script>

        $(document).ready(function () {

            $(window).resize(function(){

                if($(window).width() > 640)
                {
                    window.location.href = "<?php echo site_url('usedcarDetail') . '/' . $car_data['id'];?>";
                }
            });

            //返回顶部
            initTopHoverTree("tophov"+"ertree",500,30,20);

            /* 动态定义遮罩层的高度 */
            $(".mask").css("height",$(document).height());

            //TouchSlide({ slideCell:"#leftTabBox" });

            var swiper1 = new Swiper('.swiper-container1', {
                pagination: '.swiper-pagination1',
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev',
                paginationClickable: true,
                spaceBetween: 30,
                centeredSlides: true,
                /*autoplay: 2500,*/
                autoplayDisableOnInteraction: false
            });

            $(".nav_fr").click(function(){

                var n = $(".nav .nav_hide").hasClass("active")
                if( n ){
                    $(".nav .nav_hide").removeClass("active")
                }else{
                    $(".nav  .nav_hide").addClass("active")
                }

            });

            fnTab( $('.tabNav2'), $('.tabCon2'), 'click' );
            fnTab( $('.tabNav3'), $('.tabCon3'), 'click' );

            $('.appointment').click(function(){

                $("body").attr("overflow","hidden");
                $("input[name='car-id']").val($(this).attr("data-id"));
                $('.bounced').show();
                $('.mask').show();
            });

            $('.delete').click(function(){
                $("input[name='car-id']").val($(this).attr(""));
                $('.bounced').hide();
                $('.mask').hide();
            });

            $('.appointment_02').click(function(){
                $("input[name='car-id']").val($(this).attr("data-id"));
                $('.bounced_02').show();
                $('.mask').show();
            });

            $('.delete_02').click(function(){
                $("input[name='car-id']").val($(this).attr(""));
                $('.bounced_02').hide();
                $('.mask').hide();
            });

            var Arr = computer(
                $(".fenqi_list").attr("data-car-vol"),
                Number($(".fenqi_list").attr("data-car-real-price")),
                Number(parseInt($(".fenqi_list").find(".top .active").attr("data-firstpay")) / 100),
                $(".fenqi_list").parent().parent().find(".down .active").attr("data-period")
            );

            for (var i=0;i<3;i++)
            {
                $(".bounced_02").find(".pay span:eq("+i+")").text(Arr[i]);
            }

            $(".fenqi_list .top li").click(function(){

                $(this).addClass('active').siblings().removeClass('active');
                var firstPay = Number(parseInt($(this).attr("data-firstpay")) / 100);
                var periods = $(this).parent().parent().find(".down .active").attr("data-period");
                var carVol  = $(this).parent().parent().attr("data-car-vol");
                var realPrice  = Number($(this).parent().parent().attr("data-car-real-price"));
                var dataArr = computer(carVol,realPrice,firstPay,periods);
                $(this).parent().parent().parent().parent().find(".pay span:eq(0)").text(Math.ceil(dataArr[0]));
                $(this).parent().parent().parent().parent().find(".pay span:eq(1)").text(Math.ceil(dataArr[1]));
                $(this).parent().parent().parent().parent().find(".pay span:eq(2)").text(Math.ceil(dataArr[2]));

            });

            $(".fenqi_list .down li").click(function(){
                $(this).addClass('active').siblings().removeClass('active');

                var firstPay   = Number(parseInt($(this).parent().parent().find(".top .active").attr("data-firstpay")) / 100);
                var periods    = $(this).attr("data-period");
                var carVol     = $(this).parent().parent().attr("data-car-vol");
                var realPrice  = Number($(this).parent().parent().attr("data-car-real-price"));
                var dataArr    = computer(carVol,realPrice,firstPay,periods);

                $(this).parent().parent().parent().parent().find(".pay span:eq(0)").text(Math.ceil(dataArr[0]));
                $(this).parent().parent().parent().parent().find(".pay span:eq(1)").text(Math.ceil(dataArr[1]));
                $(this).parent().parent().parent().parent().find(".pay span:eq(2)").text(Math.ceil(dataArr[2]));
            });


            /*提交表单*/
            $(".btn").click(function(){

                var oName = $(".name").val();
                var oTel = $(".tel").val();
                var Cid = $("input[name='car-id']").val();

                if(oName == ""){
                    $("#span_usesr").text("用户名不能为空").show();
                    return false;
                }

                if(Cid.length == 0){
                    $("#span_usesr").text("参数错误").show();
                    return false;
                }

                if(oTel == ""){
                    $("#span_usesr").text("手机号不能为空").show();
                    return false;
                }

                if(!(/^1(3|4|5|7|8)\d{9}$/.test(oTel))){
                    $("#span_usesr").text("手机号不正确").show();
                    return false;
                }

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('phoneReservation');?>",
                    data: {"name":oName,"phone":oTel,"carId":Cid},
                    dataType: "json",
                    success: function(msg){
                        console.log(msg);

                        if(msg && msg.code == 201) {
                            layer.msg("缺少参数");
                            return false;
                        }else if(msg && msg.code == 200) {

                            layer.msg("预约成功",{time:1000},function () {
                                $(".mask_02").show();
                                $(".bounced_pic_03").show();
                            });

                        }else{
                            layer.msg(msg.msg);
                            return false;
                        }
                    }
                });
            });

            $(".name").keydown(function(){
                $("#span_usesr").text("").hide();
            });

            $(".tel").keydown(function(){
                $("#span_usesr").text("").hide();
            });

            $(".btn_02").click(function(){

                var oName_02 = $(".name_02").val();
                var oTel_02 = $(".tel_02").val();
                var Cid = $("input[name='car-id']").val();

                if(oName_02 == ""){
                    $("#span_usesr_02").text("用户名不能为空").show();
                    return false;
                }

                if(Cid.length == 0){
                    $("#span_usesr").text("参数错误").show();
                    return false;
                }

                if(oTel_02 == ""){
                    $("#span_usesr_02").text("手机号不能为空").show();
                    return false;
                }
                if(!(/^1(3|4|5|7|8)\d{9}$/.test(oTel_02))){
                    $("#span_usesr_02").text("手机号不正确").show();
                    return false;
                }

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('phoneReservation');?>",
                    data: {"name":oName_02,"phone":oTel_02,"carId":Cid},
                    dataType: "json",
                    success: function(msg){
                        console.log(msg);

                        if(msg && msg.code == 201) {
                            layer.msg("缺少姓名或是手机号码");
                            return false;
                        }else if(msg && msg.code == 200) {

                            layer.msg("预约成功",{time:1000},function () {
                                $(".mask_02").show();
                                $(".bounced_pic").show();
                            });

                        }else{
                            layer.msg(msg.msg);
                            return false;
                        }
                    }
                });
            });

            $(".name_02").keydown(function(){
                $("#span_usesr_02").text("").hide();
            });

            $(".tel_02").keydown(function(){
                $("#span_usesr_02").text("").hide();
            });

            /* 分享 */
            $(".share").click(function(){
                $(".mask_02").show();
                $(".bounced_pic_03").show();
            })
            $(".know").click(function(){
                $(".bounced_pic_03").hide();
                $(".bounced_pic").hide();
                $(".mask_02").hide();
                $('.bounced').hide();
                $('.mask').hide();
            })

        });

        function fnTab( oNav, aCon, sEvent ) {
            var aElem = oNav.children();
            aCon.hide().eq(0).show();

            aElem.each(function (index){

                $(this).on(sEvent, function (){
                    aElem.removeClass('active').addClass('gradient');
                    $(this).removeClass('gradient').addClass('active');
                    aElem.find('a').attr('class', 'triangle_down_gray');
                    $(this).find('a').attr('class', 'triangle_down_red');

                    aCon.hide().eq( index ).show();
                });

            });
        }

        function computer(car_vol,car_pur_price,car_init_rate_com,car_domain_com)
        {
            //保费
            var car_ins = (450 + 950 + 1252 + 500 + (car_pur_price * 1.55) / 100 + (1252+500+car_pur_price*0.01) * 0.2);
            //购置税
            var car_tax = car_vol == 1 ? car_pur_price / (1+0.17) * 0.1 : car_pur_price / (1+0.17) * 0.1 * 0.5;
            //融资总额
            var bit_total_price = (car_pur_price + car_ins + car_tax) * (1 - car_init_rate_com);
            //首付金额
            var init_pay = bit_total_price * car_init_rate_com;
            //年化利率
            var year_interest_rate = 0.185;
            //尾款比例
            var car_tail_rate_com  = 0;
            //保证金比例(20% - 首付比例)
            //var car_credit_rate_com = 0.2 - car_init_rate_com;
            var car_credit_rate_com = 0.05;

            //月供 旧的((融资总额*(1-首付比例-尾款比例))*(年化利率/12)*(1+年化利率/12)^还款期数)/((1+年化利率/12)^还款期数-1)+尾款比例*融资总额*(年化利率/12)
            //  新的  ((融资总额*(1-尾款比例))       *(年化利率/12)*(1+年化利率/12)^还款期数)/((1+年化利率/12)^还款期数-1)+尾款比例*融资总额*(年化利率/12)
            var month_pay = (bit_total_price * (1 - car_tail_rate_com) * (year_interest_rate / 12) *
                Math.pow((1+year_interest_rate / 12),car_domain_com)) /  (Math.pow((1 + (year_interest_rate / 12)),car_domain_com) - 1) +
                car_tail_rate_com * bit_total_price * (year_interest_rate / 12);
            //保证金金额
            var dep_pay = bit_total_price * car_credit_rate_com;

            /* console.log("保费" + car_ins);
             console.log("购置税" + car_tax);
             console.log("融资总额" + bit_total_price);
             console.log("首付金额" + init_pay);
             console.log("保证金比例" + car_credit_rate_com);
             console.log("月供" + month_pay);
             console.log("保证金金额" + dep_pay);*/

            return [Math.ceil(init_pay),Math.ceil(month_pay),Math.ceil(dep_pay)];
        }
    </script>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?da82031f7dd64489c2935b3723ce08cc";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</body>
</html>