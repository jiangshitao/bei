<div class="footer_nav">
    <div class="footer_nav_link">
        <a href="<?php echo site_url('phoneNewCar'); ?>">新车</a>
        <a href="<?php echo site_url('phoneUsedCar'); ?>">二手车</a>
        <a href="#product"> 金融方案</a>
        <!--<a href="#"> 创业加盟</a>
        <a href="#"> 智慧选车</a>-->
    </div>
    <div class="bottom clear">
        <div class="bottom_left fl">
            <span>服务热线  4008-310-130</span>
            <p>上海市闵行区申虹路663号虹桥协心中心2号搂503室</p>
            <p>沪ICP备16008654号-1 上海闪闪互联网金融信息服务有限公司 版权所有</p>
        </div>
        <div class="bottom_right fr">
            <img src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/code.png">
        </div>
        <div class="mask_03"></div>
        <div class="bottom_right_hidden" >
            <img src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/delete_02.png" class="bottom_right_hidden_pic01">
            <img src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/code_02.jpg">
        </div>
    </div>

</div>

<!-- 预约加盟 -->
<div class="mask"></div>
<div class="bounced">
    <form class="form_01" id="form_01" action=""  method="" onsubmit="return false">
        <h2>您的联系方式</h2>
        <img src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/delete.jpg" class="delete">
        <span id="span_usesr"></span>
        <input placeholder="您的姓名"  class="name">
        <input placeholder="您的电话"  class="tel">
        <input value="立即预约" type="submit" class="btn">
    </form>
</div>

<!-- 预约成功 -->
<div class="mask_02"></div>
<div class="bounced_pic">
    <img src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/mask_02.png">
    <img src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/know.png" class="know" >
</div>
<div class="bounced_pic_03">
    <img src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/mask_03.png">
    <img src="<?php echo rtrim(site_url('static/phone'),'/') . '/' ;?>images/know.png" class="know" >
</div>
<script>
    $(function(){

        /* 动态定义遮罩层的高度 */
        $(".mask").css("height",$(document).height());

        <!-- nav 导航隐藏显示 -->
        $(".nav_fr").click(function(){

            var n = $(".nav .nav_hide").hasClass("active");

            if( n ){
                $(".nav .nav_hide").removeClass("active")
            }else{
                $(".nav  .nav_hide").addClass("active")
            }

        });

        /* 底部二维码 */
        $(".bottom_right").click(function(){
            $(".mask_03").show();
            $(".bottom_right_hidden").show();
        });

        $(".bottom_right_hidden_pic01").click(function(){
            $(".mask_03").hide();
            $(".bottom_right_hidden").hide();
        });

        $('.appointment').click(function(){

            $("body").attr("overflow","hidden");

            $('.bounced').show();
            $('.mask').show();
        });

        $('.delete').click(function(){
            $('.bounced').hide();
            $('.mask').hide();
        });

        /*提交表单*/
        $(".btn").click(function(){

            var oName = $(".name").val();
            var oTel = $(".tel").val();

            if(oName == ""){
                $("#span_usesr").text("用户名不能为空").show();
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

            if(oName !== "" && (/^1(3|4|5|7|8)\d{9}$/.test(oTel)) ){
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('phoneReservation');?>",
                    data: {"name":oName,"phone":oTel},
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
            }
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


    })
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