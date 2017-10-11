<?php $this->load->view('phone/common/header'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>css/swiper.min.css" />
    <link href="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>css/index.css" rel="stylesheet" />
    <script type="text/javascript" src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>js/swiper.min.js"></script>
    <script src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>js/TouchSlide.1.1.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>css/icon_style.css" />
    <style type="text/css">
        /* tab  CSS开始 */
        .tabBox .hd{ height:40px; line-height:40px; padding:0 10px 10px; font-size:20px; margin-bottom: 30px;border-bottom:1px solid #e5e5e5;}
        .tabBox .hd ul{ overflow:hidden;  }
        /*.tabBox .hd ul li{ float:left; margin:0 2.5%; color:#515151;font-size:0.8em;  }*/
        .tabBox .hd ul li{ float:left;
            width:20%; color:#515151;font-size:0.8em;  }
        .tabBox .hd ul .on{ border-bottom:2px solid #e66923; color:#e66923; font-size:0.8em; }
        .tabBox .hd ul .on a{ display:block; /* 修复Android 4.0.x 默认浏览器当前样色无效果bug */  }
        .tabBox .bd ul{ padding:10px 0 10px 10px;  }
        .tabBox .bd li{ height:33px; line-height:33px;  }
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
            width: 60%;
            -height: 300px;
            box-shadow: #c7c6c6 0px 0px 10px;
            text-align: center;
            padding:5% 10%;
        }

        /* 第三部分结束 */

    </style>
    <!--banner-->
    <div class="swiper-container swiper-container1 swiper-container-horizontal">
        <div class="swiper-wrapper swiper-slide1" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
            <?php if( ! empty($list)):?>
                <?php foreach ($list as $key => $value):?>
                    <?php if($value['extended'] == '1'):?>
                        <div class="swiper-slide swiper-slide1">
                            <a href="<?php echo empty($value['url']) ? '#': $value['url'] ; ?>" title="<?php echo $value['title'];?>">
                                <img src="<?php echo getImgPathByName($value['carSource']['filename']);?>" />
                            </a>
                        </div>
                    <?php endif;?>
                <?php endforeach;?>
            <?php endif;?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination  swiper-pagination1 swiper-pagination-clickable swiper-pagination-bullets">
            <?php if( ! empty($list)):?>
                <?php foreach ($list as $key => $value):?>
                    <?php if($value['extended'] == '1'):?>
                        <span class="swiper-pagination-bullet"></span>
                    <?php endif;?>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>

    <!-- item 开始 -->

    <div id="content">
        <!-- 本例主要代码 Start ================================ -->
        <div id="leftTabBox" class="tabBox item_con">
            <div class="hd">
                <ul class="item_title clear">
                    <?php if(!empty($carBrand)): ?>
                        <?php foreach ($carBrand as $key => $val): ?>
                            <li><?php echo $val['name'];?></li>
                        <?php endforeach;?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="bd item_con">
                <?php if(!empty($newcar)):?>
                    <?php foreach ($newcar as $key => $val): ?>
                        <ul class="item_con_list active">
                            <h2><?php echo isset($val['carBrand']) ? $val['carBrand'] : '' ;?></h2>
                            <p><?php echo isset($val['description']) ? $val['description'] : '' ;?></p>
                            <div class="menu-icon">
                                <a class="appointment_01 appointment" data-id="<?php echo $val['id']; ?>">
                                    <i class="icon-time"></i>
                                    立即预约
                                </a>
                            </div>
                            <img src="<?php echo getImgPathByName($val['picture']['0'])?>" />
                        </ul>
                    <?php endforeach;?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- money -->
    <div class="section third" id="product">
        <div class="title third_title">
            <h2>金融产品</h2>
            <p>只需在线下单后，我方客服人员联系您时确定您所需的车型、金融方案，并提交您的资料，最快30分钟即可出具合同，签约完成后最快当天即可提车</p>
        </div>
        <div class="swiper-container swiper-container2">
            <div class="swiper-wrapper item clear">
                <div class="swiper-slide swiper-slide2">
                    <div class="money_item fl">
                        <h4>新车方案</h4>
                        <p class="card">贷款额度3-50万</p>
                        <div class="shoufu clear">
                            <div class="shoufu_info">
                                <p class="shoufu_info_01">首付</p>
                                <p class="shoufu_info_02">
                                    <span>0</span>
                                </p>
                                <p class="shoufu_info_03">起</p>
                            </div>
                            <!--<img src="images/index_third01.png">-->
                        </div>
                        <p class="info_01 info_02">购置税、首年保险可分期 </p>
                        <p class="info_01">部分车型享最长36期免息优惠</p>
                        <!--<a class="appointment">立即预约</a>-->
                    </div>
                </div>
                <div class="swiper-slide swiper-slide2">
                    <div class="money_item fl">
                        <h4>二手车方案</h4>
                        <p class="card">贷款额度3-50万</p>
                        <div class="shoufu clear">
                            <div class="shoufu_info">
                                <p class="shoufu_info_01">首付</p>
                                <p class="shoufu_info_02">
                                    <span>20</span>
                                </p>
                                <p class="shoufu_info_03">%起</p>
                            </div>
                            <!--<img src="images/index_third01.png">-->
                        </div>
                        <p class="info_01 info_02">最长8年车龄标准</p>
                        <p class="info_01">两证即可贷（身份证/驾驶证）</p>
                        <!--<a class="appointment">立即预约</a>-->
                    </div>
                </div>
                <div class="swiper-slide swiper-slide2" >
                    <div class="money_item fl">
                        <h4>网约车方案</h4>
                        <p class="card">贷款额度3-50万</p>
                        <div class="shoufu clear">
                            <div class="shoufu_info">
                                <p class="shoufu_info_01">首付</p>
                                <p class="shoufu_info_02">
                                    <span>20</span>
                                </p>
                                <p class="shoufu_info_03">%起</p>
                            </div>
                            <!--<img src="images/index_third01.png">-->
                        </div>
                        <p class="info_01 info_02">提供沪牌</p>
                        <p class="info_01">包办网约车新政所需资质</p>
                        <!--<a class="appointment">立即预约</a>-->
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->

        </div>
    </div>

    <script>

        var swiper1 = new Swiper('.swiper-container1', {
            pagination: '.swiper-pagination1',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            paginationClickable: true,
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: 2500,
            autoplayDisableOnInteraction: false
        });

        var swiper = new Swiper('.swiper-container2', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflow: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows : true
            }
        });

        $(document).ready(function () {

            $(window).resize(function(){

                if($(window).width() > 640)
                {
                    window.location.href = "<?php echo site_url('/') ;?>";
                }
                else
                {
                    window.location.reload();
                }

            });

            TouchSlide({ slideCell:"#leftTabBox" });

            $(".money_item").click(function(){

                var x = $(".money_item").index(this);

                var m = $(".money_item .shoufu").eq(x);

                $(".money_item .shoufu").removeClass("active");
                m.addClass("active")

            });

            $('.shoufu').css('height',$('.shoufu').css('width'));
            var n = $('.money_item').css('width');

            $('.money_item').css('height',n*1);

        })
    </script>

<?php $this->load->view('phone/common/footer'); ?>