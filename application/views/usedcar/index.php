<?php $this->load->view('common/header');?>
    <link rel="stylesheet" href="<?php echo rtrim(site_url('static'),'/') . '/' ;?>css/used_car.css">
    <style>
        /* 分页样式 */
        *{ margin:0; padding:0; list-style:none;}
        a{ text-decoration:none;}
        a:hover{ text-decoration:none;}
        .tcdPageCode{padding: 15px 20px;text-align: left;color: #ccc;text-align:center;}
        .tcdPageCode a{display: inline-block;color: #428bca;display: inline-block;height: 25px;	line-height: 25px;	padding: 0 10px;border: 1px solid #ddd;	margin: 0 2px;vertical-align: middle;}
        .tcdPageCode a:hover{text-decoration: none;border: 1px solid #428bca;}
        .tcdPageCode span.current{display: inline-block;height: 25px;line-height: 25px;padding: 0 10px;margin: 0 2px;color: #fff;background-color: #388ded;	border: 1px solid #e3e3e3;vertical-align: middle;}
        .tcdPageCode span.disabled{	display: inline-block;height: 25px;line-height: 25px;padding: 0 10px;margin: 0 2px;	color: #bfbfbf;background: #f2f2f2;border: 1px solid #bfbfbf;vertical-align: middle;}
        .bounced{display: none;}
    </style>

    <div class="container">
        <?php

            $arr1 = [];
            $arr2 = [];
            $arr3 = [];

            if(isset($usedcardata['0']))
            {
                $arr1[] = $usedcardata['0'];
            }

            if(isset($usedcardata['1']))
            {
                $arr1[] = $usedcardata['1'];
            }

            if(isset($usedcardata['2']))
            {
                $arr1[] = $usedcardata['2'];
            }

            if(isset($usedcardata['3']))
            {
                $arr2[] = $usedcardata['3'];
            }

            if(isset($usedcardata['4']))
            {
                $arr2[] = $usedcardata['4'];
            }

            if(isset($usedcardata['5']))
            {
                $arr2[] = $usedcardata['5'];
            }

            if(isset($usedcardata['6']))
            {
                $arr3[] = $usedcardata['6'];
            }

            if(isset($usedcardata['7']))
            {
                $arr3[] = $usedcardata['7'];
            }

            if(isset($usedcardata['8']))
            {
                $arr3[] = $usedcardata['8'];
            }

        ?>

        <?php if( ! empty($usedcardata)): ?>
        <div class="item clear">
            <?php foreach ($arr1 as $key => $value): ?>
            <div class="brick-item fl" onclick="window.location.href='<?php echo site_url('usedcarDetail') . '/' . $value['id'];?>'">
                <div class="figure">
                    <div class="figure_big figure_big01">
                        <a href="<?php echo site_url('usedcarDetail') . '/' . $value['id'];?>" title="查看详细" >
                            <?php if( ! empty($value['picture'])): ?>
                                <?php foreach ($value['picture'] as $k => $val): ?>
                                    <?php if($k < 4): ?>
                                        <img src="<?php echo getImgPathByName($val)?>" <?php if($k == 0):?>class="active"<?php endif ;?> height="220" />
                                    <?php endif;?>
                                <?php endforeach; ?>
                            <?php endif;?>
                        </a>
                    </div>
                    <div class="figure_small figure_small01 clear">
                        <?php if( ! empty($value['picture'])): ?>
                            <?php foreach ($value['picture'] as $k => $val): ?>
                                <?php if($k < 4): ?>
                                    <img src="<?php echo getImgPathByName($val);?>" <?php if($k == 0):?>class="active"<?php endif ;?> height="50" />
                                <?php endif;?>
                            <?php endforeach; ?>
                        <?php endif;?>
                    </div>
                </div>

                <a href="<?php echo site_url('usedcarDetail') . '/' . $value['id'];?>" title="查看详细">
                    <p class="name"><?php echo isset($value['carBrand']) ?  $value['carBrand'] : '' ;?></p>
                </a>
                <div class="price clear">
                    <p class="new_price fl">
                        <?php echo isset($value['carGuidancePrice']) ?  floatval($value['carGuidancePrice']) / 10000 : 0 ;?><span>万</span>
                    </p>
                    <p class="old_price fr">
                        <?php echo isset($value['carMarketPrice']) ?  floatval($value['carMarketPrice']) / 10000 : 0 ;?><span>万</span>
                    </p>
                </div>
                <p class="info">
                    <?php echo isset($value['transmission']) ?  $value['transmission'] : '' ;?>
                    ／
                    <?php echo isset($value['carDisplacement']) ?  $value['carDisplacement'] : '' ;?>
                    ／
                    <?php echo isset($value['carLocation']) ?  $value['carLocation'] : '' ;?>
                </p>
                <ul class="detailed_info clear">
                    <li>
                        <p>行驶里程</p>
                        <p><?php echo isset($value['drivenDistance']) ?  round(intval($value['drivenDistance']) / 10000,2) : '' ;?>万公里</p>
                    </li>
                    <li>
                        <p>初登日期</p>
                        <p><?php echo isset($value['firstRegisterTime']) ?  date('Y-m-d',strtotime($value['firstRegisterTime'])) : '' ;?></p>
                    </li>
                    <li>
                        <p>汽车车型</p>
                        <p><?php echo isset($value['carType']) ?  $value['carType'] : '' ;?></p>
                    </li>
                </ul>

            </div oncl>
            <?php endforeach; ?>
        </div>
        <?php endif;?>
        <?php if( ! empty($arr2)): ?>
            <div class="item clear">
                <?php foreach ($arr2 as $key => $value): ?>
                    <div class="brick-item fl" onclick="window.location.href='<?php echo site_url('usedcarDetail') . '/' . $value['id'];?>'">
                        <div class="figure">
                            <div class="figure_big figure_big01">
                                <a href="<?php echo site_url('usedcarDetail') . '/' . $value['id'];?>" title="查看详细" >
                                    <?php if( ! empty($value['picture'])): ?>
                                        <?php foreach ($value['picture'] as $k => $val): ?>
                                            <?php if($k < 4): ?>
                                                <img src="<?php echo getImgPathByName($val)?>" <?php if($k == 0):?>class="active"<?php endif ;?> height="220" />
                                            <?php endif;?>
                                        <?php endforeach; ?>
                                    <?php endif;?>
                                </a>
                            </div>
                            <div class="figure_small figure_small01 clear">
                                <?php if( ! empty($value['picture'])): ?>
                                    <?php foreach ($value['picture'] as $k => $val): ?>
                                        <?php if($k < 4): ?>
                                            <img src="<?php echo getImgPathByName($val)?>" <?php if($k == 0):?>class="active"<?php endif ;?> height="50" />
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                <?php endif;?>
                            </div>
                        </div>

                        <a href="<?php echo site_url('usedcarDetail') . '/' . $value['id'];?>" title="查看详细">
                            <p class="name"><?php echo isset($value['carBrand']) ?  $value['carBrand'] : '' ;?></p>
                        </a>
                        <div class="price clear">
                            <p class="new_price fl">
                                <?php echo isset($value['carGuidancePrice']) ?  floatval($value['carGuidancePrice']) / 10000 : 0 ;?><span>万</span>
                            </p>
                            <p class="old_price fr">
                                <?php echo isset($value['carMarketPrice']) ?  floatval($value['carMarketPrice']) / 10000 : 0 ;?><span>万</span>
                            </p>
                        </div>
                        <p class="info">
                            <?php echo isset($value['transmission']) ?  $value['transmission'] : '' ;?>
                            ／
                            <?php echo isset($value['carDisplacement']) ?  $value['carDisplacement'] : '' ;?>
                            ／
                            <?php echo isset($value['carLocation']) ?  $value['carLocation'] : '' ;?>
                        </p>
                        <ul class="detailed_info clear">
                            <li>
                                <p>行驶里程</p>
                                <p><?php echo isset($value['drivenDistance']) ? round(intval($value['drivenDistance']) / 10000,2) : 0 ;?>万公里</p>
                            </li>
                            <li>
                                <p>初登日期</p>
                                <p><?php echo isset($value['firstRegisterTime']) ?  date('Y-m-d',strtotime($value['firstRegisterTime'])) : '' ;?></p>
                            </li>
                            <li>
                                <p>汽车车型</p>
                                <p><?php echo isset($value['carType']) ?  $value['carType'] : '' ;?></p>
                            </li>
                        </ul>

                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif;?>
        <?php if( ! empty($arr3)): ?>
            <div class="item clear">
                <?php foreach ($arr3 as $key => $value): ?>
                    <div class="brick-item fl" onclick="window.location.href='<?php echo site_url('usedcarDetail') . '/' . $value['id'];?>'">
                        <div class="figure">
                            <div class="figure_big figure_big01">
                                <a href="<?php echo site_url('usedcarDetail') . '/' . $value['id'];?>" title="查看详细" >
                                    <?php if( ! empty($value['picture'])): ?>
                                        <?php foreach ($value['picture'] as $k => $val): ?>
                                            <?php if($k < 4): ?>
                                                <img src="<?php echo getImgPathByName($val)?>" <?php if($k == 0):?>class="active"<?php endif ;?> height="220" />
                                            <?php endif;?>
                                        <?php endforeach; ?>
                                    <?php endif;?>
                                </a>
                            </div>
                            <div class="figure_small figure_small01 clear">
                                <?php if( ! empty($value['picture'])): ?>
                                    <?php foreach ($value['picture'] as $k => $val): ?>
                                        <?php if($k < 4): ?>
                                            <img src="<?php echo getImgPathByName($val)?>" <?php if($k == 0):?>class="active"<?php endif ;?> height="50" />
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                <?php endif;?>
                            </div>
                        </div>

                        <a href="<?php echo site_url('usedcarDetail') . '/' . $value['id'];?>" title="查看详细">
                            <p class="name"><?php echo isset($value['carBrand']) ?  $value['carBrand'] : '' ;?></p>
                        </a>
                        <div class="price clear">
                            <p class="new_price fl">
                                <?php echo isset($value['carGuidancePrice']) ?  floatval($value['carGuidancePrice']) / 10000 : 0 ;?><span>万</span>
                            </p>
                            <p class="old_price fr">
                                <?php echo isset($value['carMarketPrice']) ?  floatval($value['carMarketPrice']) / 10000 : 0 ;?><span>万</span>
                            </p>
                        </div>
                        <p class="info">
                            <?php echo isset($value['transmission']) ?  $value['transmission'] : '' ;?>
                            ／
                            <?php echo isset($value['carDisplacement']) ?  $value['carDisplacement'] : '' ;?>
                            ／
                            <?php echo isset($value['carLocation']) ?  $value['carLocation'] : '' ;?>
                        </p>
                        <ul class="detailed_info clear">
                            <li>
                                <p>行驶里程</p>
                                <p><?php echo isset($value['drivenDistance']) ? round(intval($value['drivenDistance']) / 10000,2) : 0 ;?>万公里</p>
                            </li>
                            <li>
                                <p>初登日期</p>
                                <p><?php echo isset($value['firstRegisterTime']) ?  date('Y-m-d',strtotime($value['firstRegisterTime'])) : '' ;?></p>
                            </li>
                            <li>
                                <p>汽车车型</p>
                                <p><?php echo isset($value['carType']) ?  $value['carType'] : '' ;?></p>
                            </li>
                        </ul>

                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif;?>
        <!--分页-->
        <div class="tcdPageCode"></div>
    </div>
    <!-- 分页 -->
    <script src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>js/jquery.page.js"></script>
    <script>

        $(function(){

            $(window).resize(function(){

                if($(window).width() < 640)
                {
                    window.location.href = "<?php echo site_url('phoneUsedCar');?>";
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

            $(".tcdPageCode").createPage({
                pageCount:<?php echo ceil(intval($total) / $pageSize); ?>,
                current:<?php echo isset($pageNumber) ? intval($pageNumber) : 1 ; ?>,
                backFn:function(p){
                    window.location.href = "<?php echo site_url("usedcar") ;?>" + "?page=" + p;
                }
            });

            $(".figure_small img").mouseover(function () {
                $(this).parent().prev(".figure_big").find("img:eq("+ $(this).index()+")").addClass("active").siblings().removeClass("active");
            });
        })

    </script>

<?php $this->load->view('common/footer');?>