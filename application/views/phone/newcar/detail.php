<?php $this->load->view('phone/common/header'); ?>
    <link href="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>css/new_car_details.css" rel="stylesheet" />
    <link href="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>css/icon_style.css" rel="stylesheet" />
    <link href="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>css/common.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>css/swiper.min.css" />
    <!--banner-->
<div style="margin-top:50px;">
    <div class="swiper-container swiper-container1 swiper-container-horizontal">
        <div class="swiper-wrapper swiper-slide1" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
            <?php if(isset($car_data['picture']) && !empty($car_data['picture'])) : ?>
                <?php foreach ($car_data['picture'] as $val) :?>
                    <div class="swiper-slide swiper-slide1">
                        <img src="<?php echo getThumbnailImgPathByName($val,640,480);?>" />
                    </div>
                <?php endforeach;?>
            <?php endif ; ?>
            <?php if(!empty($car_data['carVideo'])):?>
                <?php if(strpos($car_data['carVideo'],'iframe') === false): ?>
                    <div class="swiper-slide">
                        <img src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/banner_0.jpg"  id="video_pic" width="100%" />
                        <div class="svideo" style=" width: 100%; -margin-top: 25%;" data-video=''>
                            <video id="video" class="abc" style="width:100%;" controls="controls" src="<?php echo $car_data['carVideo']; ?>"></video>
                        </div>
                    </div>
                <?php endif;?>
            <?php endif;?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination  swiper-pagination1 swiper-pagination-clickable swiper-pagination-bullets">

            <?php if(!empty($car_data['carVideo'])):?>
                <span class="swiper-pagination-bullet"></span>
            <?php endif ; ?>

            <?php if(isset($car_data['picture']) && !empty($car_data['picture'])) : ?>
                <?php foreach ($car_data['picture'] as $val) :?>
                    <span class="swiper-pagination-bullet"></span>
                <?php endforeach;?>
            <?php endif ; ?>

        </div>
    </div>
</div>
<!--  info -->
<div class="con_info clear">
    <div class="details_info_left fl">
        <div class="title">
            <h2><?php echo isset($car_name['name']) ? $car_name['name'] : '' ; ?></h2>
            <p>指导价&nbsp<span>¥<?php echo isset($car_data['carMarketPrice']) ? number_format($car_data['carMarketPrice']) : 0 ; ?></span></p>
        </div>
        <p><?php echo isset($car_data['description']) ? $car_data['description'] : '' ; ?></p>
        <ul class="clear list-service">
            <?php if(!empty($car_data['service'])):?>
                <?php foreach (explode(',',$car_data['service']) as $val):?>
                    <li class="fl"><?php echo $val;?></li>
                <?php endforeach;?>
            <?php endif;?>
        </ul>
    </div>
    <a href="javascript:void(0);"   class="fr details_info_right share" >
        <i class="icon-share"></i>
        <p>分享抢红包</p>
    </a>
</div>
    <!--  info -->
    <!--<div class="con_info">
        <div class="title">
            <h2><?php /*echo isset($car_data['car_type']) ? $car_data['car_type'] : '' ; */?></h2>
            <p>指导价<span>¥<?php /*echo isset($car_data['guide_price']) ? number_format($car_data['guide_price']) : 0 ; */?></span></p>
        </div>
        <p><?php /*echo isset($car_data['description']) ? $car_data['description'] : '' ; */?></p>

    </div>-->
<div class="car_info clear">
   <!-- <ul>
        <li>
            <p>车长</p>
            <span><?php /*echo isset($car_data['carBrand']['carBodyObj']['lenght']) ? $car_data['carBrand']['carBodyObj']['lenght'] . 'mm' : '' ; */?></span>
        </li>
        <li>
            <p>车高</p>
            <span><?php /*echo isset($car_data['carBrand']['carBodyObj']['height']) ? $car_data['carBrand']['carBodyObj']['height'] . 'mm' : '' ; */?></span>
        </li>
    </ul>-->
    <ul>
        <li>
            <p>变速箱</p>
            <span>
                <?php echo isset($car_data['carBrand']['carGearboxObj']['abbreviation']) ? $car_data['carBrand']['carGearboxObj']['abbreviation'] : '' ; ?></span>
        </li>
        <li>
            <p>轴　距</p>
            <span><?php echo isset($car_data['wheelBase']) ? $car_data['wheelBase'] : '' ; ?></span>
        </li>
    </ul>
    <ul>
        <li>
            <p>最大功率</p>
            <span><?php echo isset($car_data['maxPower']) ? $car_data['maxPower'] : '' ; ?></span>
        </li>
        <li>
            <p>最大扭矩</p>
            <span><?php echo isset($car_data['maxTorque']) ? $car_data['maxTorque'] : '' ; ?></span>
        </li>
    </ul>
</div>
    <!--  calculator -->
    <div class="calculator">
        <h2 >贷款计算器</h2>
        <div class="fenqi_list clear"
             data-car-vol="<?php echo floatval($car_data['carDisplacement']) > 1.6 ? 1 : 2;?>"
             data-car-real-price="<?php echo floatval($car_data['carGuidancePrice']); ?>"
        >
            <ul class="top clear">
                <li class="active" data-firstpay="0">
                    <a>0首付</a>
                </li>
                <li data-firstpay="10">
                    <a>10%首付</a>
                </li>
                <li data-firstpay="20">
                    <a>20%首付</a>
                </li>
            </ul>
            <ul class="down clear">
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

    <!-- order -->
    <div class="order">
        <a href="javascript:void(0);" class="appointment" data-id="<?php echo $car_data['id'];?>">立即下单</a>
    </div>
    <!-- 立即下单 -->
    <div class="mask"></div>
    <div class="bounced">
        <form class="form_01">
            <h2>您的联系方式</h2>
            <img src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/delete.jpg" class="delete">
            <span id="span_usesr"></span>
            <input type="text" placeholder="您的姓名"  class="name">
            <input type="text" placeholder="您的电话"  class="tel">
            <input type="hidden" name="car-id" value="" />
            <input value="立即预约" type="button" class="btn">
        </form>
    </div>

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
    <script src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>js/swiper.min.js"></script>
    <script>

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

        /* 视频 */

        var Media = document.getElementById("video");

        if(Media != null)
        {
            var oVideo_pic = document.getElementById("video_pic");

            oVideo_pic.onclick=function(){
                oVideo_pic.style.display="none";
                Media.play();
            };

            //开始播放
            Media.addEventListener("play",function () {
                //console.log((new Date()).getTime() + " 开始播放");

            });

            //暂停或是播放
            Media.addEventListener("pause",function () {
                //console.log((new Date()).getTime() + " 暂停或是播放");
                oVideo_pic.style.display="block";
            });

            //播放结束
            Media.addEventListener("ended",function () {
                //console.log((new Date()).getTime() + " 播放结束");
            });
        }


        $(document).ready(function () {

            $(window).resize(function(){

                if($(window).width() > 640)
                {
                    window.location.href = "<?php echo site_url('newcar') ;?>";
                }
            });

            $(".mask").css("height",$(document).height());

            $(".nav_fr").click(function(){

                var n = $(".nav .nav_hide").hasClass("active");
                if( n ){
                    $(".nav .nav_hide").removeClass("active");
                }else{
                    $(".nav  .nav_hide").addClass("active");
                }

            });

            //默认计算
            var Arr = computer(
                $(".fenqi_list").attr("data-car-vol"),
                Number($(".fenqi_list").attr("data-car-real-price")),
                Number(parseInt($(".fenqi_list").find(".top .active").attr("data-firstpay")) / 100),
                $(".fenqi_list").parent().parent().find(".down .active").attr("data-period")
            );

            for (var i=0;i<3;i++)
            {
                //$(".bounced_02").find(".pay span:eq("+i+")").text(Arr[i]);
                $(".pay span:eq("+i+")").text(Arr[i]);
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


            $('.appointment').click(function(){

                $("body").attr("overflow","hidden");
                $("input[name='car-id']").val($(this).attr("data-id"));
                $('.bounced').show();
                $('.mask').show();
            });

            $('.delete').click(function(){
                $("input[name='car-id']").val('');
                $('.bounced').hide();
                $('.mask').hide();
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
                                $(".bounced_pic").show();
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

            /* 分享 */
            $(".share").click(function(){
                $(".mask_02").show();
                $(".bounced_pic_03").show();
            });

            $(".know").click(function(){
                $(".bounced_pic_03").hide();
                $(".bounced_pic").hide();
                $(".mask_02").hide();
                $('.bounced').hide();
                $('.mask').hide();
            });
        });

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
            var car_credit_rate_com = 0.2 - car_init_rate_com;
            car_credit_rate_com = car_credit_rate_com == 0 ? 0.1 : car_credit_rate_com;

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