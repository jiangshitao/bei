<?php $this->load->view('common/header');?>
    <link rel="stylesheet" href="<?php echo rtrim(site_url('static'),'/') . '/' ;?>css/details.css">
    <div class="details_container">

        <div class="details_main_wrap clear">
            <div class="main_left fl">
                <div class="figure_big">
                    <?php if( ! empty($car_data['picture'])): ?>
                        <?php foreach ($car_data['picture'] as $k => $val): ?>
                            <?php if($k < 4):?>
                                <img src="<?php echo getImgPathByName($val);?>" <?php if($k == 0):?>class="active"<?php endif ;?>>
                            <?php endif;?>
                        <?php endforeach; ?>
                    <?php endif;?>

                </div>
                <div class="figure_small clear">
                    <?php if( ! empty($car_data['picture'])): ?>
                        <?php foreach ($car_data['picture'] as $k => $val): ?>
                            <?php if($k < 4):?>
                                <img src="<?php echo getImgPathByName($val);?>" <?php if($k == 0):?>class="active"<?php endif ;?>>
                            <?php endif;?>
                        <?php endforeach; ?>
                    <?php endif;?>
                </div>
            </div>
            <div class="main_right fl">
                <h2><?php echo isset($car_data['carBrand']) ? $car_data['carBrand'] : '' ;?></h2>
                <p><?php echo isset($car_data['addTime']) ? $car_data['addTime'] . '发布' : '' ;?></p>
                <ul class="main_right_info01 main_right_info clear">
                    <li class="first">
                        <div>
                            <span class="active_price">
                                ¥<?php echo isset($car_data['carGuidancePrice']) ? floatval($car_data['carGuidancePrice']) / 10000 : 0 ;?>
                            </span>
                            <p class="active_text">售价(万)</p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <span>车辆原价</span>
                            <p>
                                ¥<?php echo isset($car_data['carMarketPrice']) ? floatval($car_data['carMarketPrice']) / 10000 : 0 ;?>万
                            </p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <span>行驶里程</span>
                            <p>
                                <?php echo isset($car_data['drivenDistance']) ? round(intval($car_data['drivenDistance']) / 10000,2) : 0 ;?>
                                万公里
                            </p>
                        </div>

                    </li>
                    <li class="last">
                        <div>
                            <span>初登日期</span>
                            <p>
                                <?php echo isset($car_data['firstRegisterTime']) ?  date('Y-m-d',strtotime($car_data['firstRegisterTime'])) : '' ;?>
                            </p>
                        </div>

                    </li>
                </ul>
                <ul class="main_right_info02 main_right_info clear">
                    <li>
                        <div>
                            <span>所在地</span>
                            <p><?php echo isset($car_data['carLocation']) ?  $car_data['carLocation'] : '' ;?></p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <span>变速器</span>
                            <p><?php echo isset($car_data['transmission']) ?  $car_data['transmission'] : '' ;?></p>
                        </div>

                    </li>
                    <li>
                        <div>
                            <span>排放标准</span>
                            <p><?php echo isset($car_data['emissionStandards']) ?  $car_data['emissionStandards'] : '' ;?></p>
                        </div>

                    </li>
                    <li class="last">
                        <div>
                            <span>汽车排量</span>
                            <p><?php echo isset($car_data['carDisplacement']) ?  $car_data['carDisplacement'] : '' ;?></p>
                        </div>

                    </li>
                </ul>
                <div class="main_right_btn clear order">
                    <form class="fl first">
                        <input type="button" value="咨询底价" class="appointment" data-id="<?php echo isset($car_data['id']) ?  $car_data['id'] : '' ;?>">
                    </form>
                    <!--<div class="fl second">
                        <span>分期付款</span>
                    </div>
                    <div class="fl third">
                        <p>分期购车：首付最低仅需0万</p>
                    </div>-->
                </div>
                <div class="main_right_last clear">
                    <p>
                        <i></i>
                        售后服务</p>
                    <p>
                        <i></i>
                        七天包换，三天包退</p>
                    <p>
                        <i></i>
                        1个月 / 2000公里质保</p>
                </div>
            </div>
        </div>

        <div class="details_main_info">
            <div class="item01 item clear">
                <h2>车辆说明</h2>

                <div class="item_link_wrap clear">
                    <dl class="item_link item_link_first fl">
                        <!--<dd>年检到期：<span>2017-6</span></dd>

                        <dd>过户次数：<span>1次（以车辆登记证为准）</span></dd>

                        <dd>发动机：<span>1.8L &nbsp 143马力 &nbsp L4</span></dd>-->
                        <dd>燃油标号：<span><?php echo isset($car_data['fuelLabel']) ?  $car_data['fuelLabel'] : '' ; ?></span></dd>

                        <dd>质保到期：<span>
                                <?php echo isset($car_data['warrantyExpireTime']) ?  date('Y-m-d',strtotime($car_data['warrantyExpireTime'])) : '' ; ?>
                            </span>
                        </dd>

                    </dl>
                    <!--<dl class="item_link fl">
                       <dd>保险到期：<span>2016-8</span></dd>

                        <dd>用途：<span>家用</span></dd>

                        <dd>维修保养：<span>-</span></dd>
                       <dd>驱动方式：<span>前置前驱</span></dd>
                    </dl>-->
                    <dl class="item_link fl">
                        <dd>颜色：<span><?php echo isset($car_data['carColor']) ?  $car_data['carColor'] : '' ; ?></span></dd>
                        <dd>变速器：<span><?php echo isset($car_data['transmission']) ?  $car_data['transmission'] : '' ; ?></span></dd>
                    </dl>
                    <dl class="item_link fl">
                        <dd>车辆级别：<span><?php echo isset($car_data['carType']) ?  $car_data['carType'] : '' ; ?></span></dd>
                        <dd>排放标准：
                            <span>
                                <?php echo isset($car_data['emissionStandards']) ?  $car_data['emissionStandards'] : '' ; ?>
                            </span>
                        </dd>
                    </dl>
                </div>

            </div>
            <div class="item02 item">
                <h2>车辆说明</h2>
                <p><?php echo isset($car_data['carExplanation']) ?  $car_data['carExplanation'] : '' ; ?></p>
            </div>
            <div class="item03 item">
                <h2>车辆图片</h2>
                <?php if(!empty($car_data['picture'])) :?>
                    <div class="pic_list01 pic_list clear">
                        <?php foreach ($car_data['picture'] as $key => $val) : ?>
                            <div class="imgbox fl">
                                <img src="<?php echo getImgPathByName($val) ;?>" width="100%" height="400" />
                            </div>
                        <?php endforeach;?>
                    </div>
                <?php endif;?>
                <div class="pic_list03 pic_list">
                    <img src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>images/details_pic.jpg">
                </div>
            </div>
        </div>
    </div>
    <script>

        function changewidth(){

            if(document.body.clientWidth<1000){
                document.getElementById("main").style.width="1000px";
            }
            if(document.body.clientWidth>1000){

                document.getElementById("main").style.width="100%";
            }
        }

        $(window).resize(function(){

            if($(window).width() < 640)
            {
                window.location.href = "<?php echo site_url('phoneUsedCarDetail') . '/' . $car_data['id'] ;?>";
            }
            else
            {
                //window.location.reload();
            }

        });

        if($(window).width() < 1200)
        {
            $(".nav_con").width($(window).width());
        }

        /*/!* 图片切换 *!/
        $(".figure_small img").click(function(){
            $(".figure_big img").hide();

            var n=$('.figure_small img').index($(this));
            $('.figure_big img').eq(n).show();
        });
        */
        /*图片切换*/
        $(".figure_small img").click(function(){

            $(this).addClass("active").siblings().removeClass("active")
            $('.figure_big img').eq($('.figure_small img').index($(this))).show().siblings().hide();

        });
    </script>
<?php $this->load->view('common/footer');?>