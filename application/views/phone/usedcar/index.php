<?php $this->load->view('phone/common/header'); ?>
    <link href="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>css/used_car.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>css/icon_style.css" />
    <div class="container">
        <ul class="clear container_list">
            <?php if(!empty($usedcardata)): ?>
                <?php foreach ($usedcardata as $key => $value):?>
            <li class="<?php echo $key % 2 == 0 ? 'fl con_left' : 'fr con_right'; ?>" style="margin-bottom:2%;"
                onclick="location.href='<?php echo site_url('phoneUsedCarDetail') . '/' . $value['id'];?>'"
            >
                <div class="con_item">
                    <div>
                        <span>最新</span>
                    </div>
                    <img src="<?php echo getImgPathByName($value['picture']['0']);?>" >
                </div>
                <div class="con_item_info">
                    <h2><?php echo isset($value['carBrand']) ? $value['carBrand'] : '' ;?></h2>
                    <p>
                        <?php echo isset($value['firstRegisterTime']) ? date('Y-m-d',strtotime($value['firstRegisterTime'])) : '' ;?>／
                        <?php echo isset($value['drivenDistance']) ? round(intval($value['drivenDistance']) / 10000,2): 0 ;?>万公里
                    </p>
                    <ul class="clear">
                        <li class="fl">
                            <span class="new_price">
                                <?php echo isset($value['carGuidancePrice']) ? intval($value['carGuidancePrice']) / 10000 : 0 ;?>
                            </span>
                            万
                        </li>
                        <li class="fr">
                            <span class="old_price">
                                <?php echo isset($value['carMarketPrice']) ? intval($value['carMarketPrice']) / 10000 : 0 ;?>
                            </span>
                            万
                        </li>
                    </ul>
                    <ul class="clear list-service">
                        <li class="fl">三天包退</li>
                        <li class="fl">七天包换</li>
                        <li class="fl">
                            <span>6</span>
                            万公里质保
                        </li>
                    </ul>
                </div>
            </li>
                <?php endforeach;?>
            <?php endif;?>
        </ul>
    </div>
    <script>
        $(function () {
            $(window).resize(function(){

                if($(window).width() > 640)
                {
                    window.location.href = "<?php echo site_url('usedcar') ;?>";
                }
                else
                {
                    window.location.reload();
                }

            });
        })
    </script>
<?php $this->load->view('phone/common/footer'); ?>