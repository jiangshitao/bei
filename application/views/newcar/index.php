<?php $this->load->view('common/header');?>
    <link rel="stylesheet" href="<?php echo rtrim(site_url('static'),'/') . '/' ;?>css/new_car.css">
    <!--banner-->
    <div class="banner">
        <img src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>images/newcar-banner.jpg">
    </div>
    <div class="container">
        <?php if(!empty($new_car_data)):?>
            <?php foreach($new_car_data as $key => $value) :?>
            <div class="item_add">
                <div class="item clear">
                    <div class="item_left fl">
                        <div class="options">
                            <ul class="nav tabNav2 clear">
                                <li class="active fl">
                                    查看图片
                                </li>
                                <li class="gradient fl">
                                    查看视频
                                </li>
                            </ul>
                            <div class="con">
                                <div class="tabCon2">
                                    <div class="figure_big">
                                        <?php foreach ($value['picture'] as $k=>$val): ?>
                                            <?php if($k < 5):?>
                                                <div class="big_img_list <?php if($k == 0):?>active<?php endif ;?>">
                                                    <img src="<?php echo getImgPathByName($val);?>"/>
                                                </div>
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </div>
                                    <div class="figure_small clear">
                                        <?php foreach ($value['picture'] as $k=>$val): ?>
                                            <?php if($k < 5):?>
                                                <img src="<?php echo getImgPathByName($val);?>"
                                                    <?php if($k == 0):?>class="active"<?php endif ;?>
                                                />
                                            <?php endif;?>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <div class="tabCon2" style="display:none;">
                                    <div  class="svideo" style="margin-top:10%;" data-video='<?php echo $value['carVideo']; ?>'>
                                        <?php if(strpos($value['carVideo'],'iframe') === false){ ?>
                                            <video controls="controls" preload="none" src="<?php echo $value['carVideo'];?>">
                                        <?php }else{ ?>
                                            <?php echo $value['carVideo'];?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item_right fl">
                        <div class="info clear">
                            <div class="info_left fl">
                                <h2><?php echo isset($value['carBrand']) ? $value['carBrand'] : '' ; ?></h2>
                                <p><?php echo isset($value['description']) ? $value['description'] : '' ; ?></p>
                            </div>
                            <div class="info_right fr">
                                <!-- 新添加的 -->
                                <div>
                                    <p class="fl">指导价</p>
                                    <span class="fr">&nbsp;￥&nbsp;<?php echo round(intval($value['carMarketPrice']) / 10000,2) ; ?>万</span>
                                </div>
                            </div>

                        </div>
                        <div class="fenqi_list clear"
                             data-car-vol="<?php echo floatval($value['carDisplacement']) > 1.6 ? 1 : 2;?>"
                             data-car-real-price="<?php echo floatval($value['carGuidancePrice']); ?>"
                        >
                            <ul class="fl top">
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
                            <ul class="fl down">
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
                        <ul class="pay clear">
                            <li>
                                <p>首付</p>
                                <span>562568</span>
                            </li>
                            <li>
                                <p>月付</p>
                                <span>0</span>
                            </li>
                            <li>
                                <p class="baozhengjin" style="cursor: pointer;">保证金</p>
                                <span>0</span>
                                <img src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>images/new_mask.png" style=" margin-left:10%; margin-top: -20%;display: none;" class="baozhengjin_pic">
                            </li>
                        </ul>
                        <div class="car_info clear">
                            <p class="pro">*以上价格已含购置税和首年保费</p>
                            <!--<ul class="fl">
                                <li class="clear">
                                    <p class="fl">车长</p>
                                    <span class="fl">2600mm</span>
                                </li>
                                <li class="clear">
                                    <p class="fl">车高</p>
                                    <span class="fl">1505mm</span>
                                </li>
                            </ul>-->
                            <ul class="fl">
                                <li class="clear">
                                    <p class="fl">变速箱</p>
                                    <span class="fl"><?php echo isset($value['gearType']) ? $value['gearType'] : '' ; ?></span>
                                </li>
                                <li class="clear">
                                    <p class="fl">轴　距</p>
                                    <span class="fl"><?php echo isset($value['wheelbase']) ? intval($value['wheelbase']) : '' ; ?></span>
                                </li>
                            </ul>
                            <ul class="fl">
                                <li class="clear">
                                    <p class="fl">最大功率</p>
                                    <span class="fl"><?php echo isset($value['maxPower']) ? $value['maxPower'] : '' ; ?></span>
                                </li>
                                <li class="clear">
                                    <p class="fl">最大扭矩</p>
                                    <span class="fl"><?php echo isset($value['maxTorque']) ? intval($value['maxTorque']) : '' ; ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="order">
                            <a href="javascript:void(0);" class="fr">
                                <input type="button" value="立即下单" data-id="<?php echo isset($value['id']) ? $value['id'] : '' ; ?>" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        <?php endif ;?>
    </div>
<script>

    var car_pur_price = 150000 ; //裸车价
    var car_vol = 1 ; //排量 1为1.6以及1.6以上,2为1.6以下,3为新能源车

    $(function(){

        $(".item_add:odd").css("background","#f5f7fa");

        $(window).resize(function(){

            if($(window).width() < 640)
            {
                window.location.href = "<?php echo site_url('phoneNewCar');?>";
            }
            else
            {
                window.location.reload();
            }

        });

        if($(window).width() < 1200)
        {
            $(".nav_con").width($(window).width());
        }


        $(".baozhengjin").click(function(){
            $(".baozhengjin_pic").css("display","block");

            setTimeout(function(){$(".baozhengjin_pic").fadeOut();},5000);
        });

        //视频图片切换
        $(".tabNav2 li").on('click',function () {

            //如果切换到图片，则要关闭视频
            if($(this).index() == 0)
            {
                if($(this).parent().parent().find(".tabCon2").eq(1).find("video").length == 1)
                {
                    $(this).parent().parent().find(".tabCon2").eq(1).find("video").get(0).pause();
                }
                else
                {
                    $(this).parent().parent().find(".tabCon2").eq(1).find(".svideo").html("");
                }
            }
            else
            {
                //切换到视频，要关闭或是暂停其他的视频

                $(".svideo").find("video").each(function () {
                    $(this).get(0).pause();
                });

                $(".svideo").find("iframe").each(function () {
                    $(this).remove();
                });

                if($(this).parent().parent().find(".tabCon2").eq(1).find("video").length == 1)
                {
                    $(this).parent().parent().find(".tabCon2").eq(1).find("video").get(0).play();
                }
                else
                {
                    var iframe = $(this).parent().parent().find(".tabCon2").eq(1).find(".svideo").attr("data-video");
                    $(this).parent().parent().find(".tabCon2").eq(1).find(".svideo").html(iframe);
                }

                $(".tabNav2").each(function () {
                    $(this).find("li").eq(0).addClass("active").siblings().removeClass("active");
                });

                $(".con").each(function () {
                    $(this).find(".tabCon2").eq(0).show().siblings().hide();
                });
            }

            $(this).addClass("active").siblings().removeClass("active");
            $(this).parent().parent().find(".tabCon2").eq($(this).index()).show().siblings().hide();

        });

        //计算首付、月供和保证金
        $(".fenqi_list").each(function () {

            var firstpayInit = Number(parseInt($(this).find(".top .active").attr("data-firstpay")) / 100 );
            var periodInit   = $(this).find(".down .active").attr("data-period");
            var carVolInit   = $(this).attr("data-car-vol");
            var realPriceInit= Number($(this).attr("data-car-real-price"));
            var dataArrInit  = computer(carVolInit,realPriceInit,firstpayInit,periodInit);

            $(this).parent().find(".pay span:eq(0)").text(Math.ceil(dataArrInit[0]));
            $(this).parent().find(".pay span:eq(1)").text(Math.ceil(dataArrInit[1]));
            $(this).parent().find(".pay span:eq(2)").text(Math.ceil(dataArrInit[2]));
        });


        //图片切换
        $(".figure_small img").mouseover(function(){
            $(this).parent().prev(".figure_big").find(".big_img_list").eq($(this).index()).show().siblings().hide();
        });

        //首付选择
        $(".fenqi_list .top li").click(function(){

            $(this).addClass("active").siblings().removeClass("active");

            var firstPay = Number(parseInt($(this).attr("data-firstpay")) / 100);
            var periods = $(this).parent().parent().find(".down .active").attr("data-period");
            var carVol  = $(this).parent().parent().attr("data-car-vol");
            var realPrice  = Number($(this).parent().parent().attr("data-car-real-price"));
            var dataArr = computer(carVol,realPrice,firstPay,periods);

            $(this).parent().parent().parent().find(".pay span:eq(0)").text(Math.ceil(dataArr[0]));
            $(this).parent().parent().parent().find(".pay span:eq(1)").text(Math.ceil(dataArr[1]));
            $(this).parent().parent().parent().find(".pay span:eq(2)").text(Math.ceil(dataArr[2]));

        });

        //分期选择
        $(".fenqi_list .down li").click(function(){

            $(this).addClass("active").siblings().removeClass("active");

            var firstPay   = Number(parseInt($(this).parent().parent().find(".top .active").attr("data-firstpay")) / 100);
            var periods    = $(this).attr("data-period");
            var carVol     = $(this).parent().parent().attr("data-car-vol");
            var realPrice  = Number($(this).parent().parent().attr("data-car-real-price"));
            var dataArr    = computer(carVol,realPrice,firstPay,periods);

            $(this).parent().parent().parent().find(".pay span:eq(0)").text(Math.ceil(dataArr[0]));
            $(this).parent().parent().parent().find(".pay span:eq(1)").text(Math.ceil(dataArr[1]));
            $(this).parent().parent().parent().find(".pay span:eq(2)").text(Math.ceil(dataArr[2]));

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

    function changewidth()
    {
        if(document.body.clientWidth<1000){
            document.getElementById("main").style.width="1000px";
        }
        if(document.body.clientWidth>1000){

            document.getElementById("main").style.width="100%";
        }
    }

</script>

<?php $this->load->view('common/footer');?>