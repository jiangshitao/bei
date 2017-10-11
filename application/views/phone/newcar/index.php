<?php $this->load->view('phone/common/header'); ?>
    <link href="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>css/new_car.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>css/icon_style.css" />
    <!-- 内容区 -->
    <div class="container">
        <?php if(!empty($car_data)): ?>
            <?php foreach ($car_data as $key => $value): ?>
                <div class="con_item <?php echo $key % 2 == 0 ? 'con_item_gray' : '' ;?>">
                    <div class="item_list">
                        <h2><?php echo isset($value['carBrand']) ? $value['carBrand'] : '' ;?></h2>
                        <p><?php echo isset($value['description']) ? $value['description'] : '' ;?></p>
                        <a href="<?php echo site_url('phoneNewCarDetail') . '/' . $value['id'];?>"><i class="icon-check"></i>查看详情</a>
                        <div onclick="window.location.href='<?php echo site_url('phoneNewCarDetail') . '/' . $value['id'];?>'">
                            <img src="<?php echo getImgPathByName($value['picture']['0']) ;?>"/>
                        </div>
                    </div>
                    <div class="item_list_ri">
                        <span><?php echo isset($value['oilwearKilometers']) ? $value['oilwearKilometers'] . ' L' : '' ;?></span>
                        <p>油耗</p>
                    </div>
                </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <script>
        $(function () {

            $(window).resize(function(){

                if($(window).width() > 640)
                {
                    window.location.href = "<?php echo site_url('newcar') ;?>";
                }
                else
                {
                    //window.location.reload();
                }

            });
        })
    </script>
<?php $this->load->view('phone/common/footer'); ?>