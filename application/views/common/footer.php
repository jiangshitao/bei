<div class="footer">
    <div class="footer_container clear">
        <div class="footer_container_left fl">
            <p>
                <a>南京即刻启程</a>
               <!-- <a>南京即刻启程</a>
                <a>南京即刻启程</a>-->
            </p>
            <p>白菜汽车是有上海闪闪互联网金融信息服务有限公司所运营，专注提供互联网汽车金融服务的品牌</p>
            <p>沪ICP备16008654号-1 上海闪闪互联网金融信息服务有限公司 版权所有</p>
            <p>上海市闵行区申虹路663号虹桥协心中心2号搂503室</p>
        </div>
        <div class="footer-links clear fr">
            <div class="col-contact fl col-contact_phone">
                <p class="phone">4008-310-130</p>
                <p class="J_serviceTime-normal">周一至周日 9:00-18:00(仅收市话费)</p>
                <div>
                    <a href="http://wpa.qq.com/msgrd?v=3&uin=383213654&site=qq&menu=yes" target="_blank" class="ask fr">在线咨询</a>
                    <!--<a href="http://wpa.qq.com/msgrd?v=3&uin=383213654&site=qq&menu=yes" target="_blank" class="join ">加盟我们</a>-->
                </div>
            </div>
            <div class="code fl">
                <img src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>images/code.png">
                <p class="">最新活动关注</p>
            </div>
        </div>
    </div>
</div>

    <div class="mask"></div>
    <div class="bounced">
        <h2>立即预约</h2>
        <img src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>images/delete.jpg" class="delete">
        <span id="span_usesr"></span>
        <input type="text" placeholder="请输入您的姓名" class="name">
        <input type="text" placeholder="请输入您的电话" class="tel">
        <input type="hidden" value="" name="car-id" />
        <input type="button" value="确定" class="btn">
        <p>*我们将在1小时内联系您</p>
    </div>
    <div class="sus">
        <ul class="izl-rmenu">
            <li><a href="http://wpa.qq.com/msgrd?v=3&uin=383213654&site=qq&menu=yes" target="_blank" class="consult"></a><span class="span01">在线客服</span></li>

            <!--<li><a href="#" class="phone"><span class="span02">客服电话</span></a></li>-->

            <li><a href="#" class="weixin"></a><span class="span03">官方微信</span></li>
            <div class="izl-rmenu_code" >
                <img src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>images/code.png">
            </div>

            <li onclick="myScroll()" class="btn_top"><a href="#"></a></li>
        </ul>
    </div>
</div>
<script>

    function myScroll()
    {
//前边是获取chrome等一般浏览器 如果获取不到就是ie了 就用ie的办法获取

        var x=$(window).scrollTop();
        var timer=setInterval(function(){
            x=x-100;
            if(x<100)
            {				x=0;
                window.scrollTo(x,x);
                clearInterval(timer);
            }else{
                window.scrollTo(x,x);
            }

        },"20");

    }

    $(function(){

        /*  弹出框 */
        $('.order input').click(function(){

            var carId = $(this).attr("data-id");
            if(carId.length == 0) return false;

            $("input[name='car-id']").val(carId);

            $('.bounced').show();
            $('.mask').show();
        });

        $('.delete').click(function(){
            $("input[name='car-id']").val('');
            $('.bounced').hide();
            $('.mask').hide();
        });

        $('.list').click(function(){
            $('.list').removeClass('active');
            $(this).addClass('active');
        });

        /*提交表单*/
        $(".btn").click(function(){

            var oName = $(".name").val();
            var oTel  = $(".tel").val();
            var carId = $("input[name='car-id']").val();

            if(oName == ""){
                $("#span_usesr").show(500);
                $("#span_usesr").text("用户名不能为空");
                return false;
            }

            if(oTel == ""){
                $("#span_usesr").show(500);
                $("#span_usesr").text("手机号不能为空");
                return false;
            }

            if(!(/^1(3|4|5|7|8)\d{9}$/.test(oTel))){
                $("#span_usesr").show(500);
                $("#span_usesr").text("手机号不正确");
                return false;
            }

            if(carId.length == 0){
                $("#span_usesr").show(500);
                $("#span_usesr").text("参数错误");
                return false;
            }


            $.ajax({
                type: "POST",
                url: "<?php echo site_url('reservation');?>",
                data: {"name":oName,"phone":oTel,"carId":carId},
                dataType: "json",
                success: function(msg){
                    console.log(msg);

                    if(msg && msg.code == 201) {

                        layer.msg("缺少参数");
                        return false;

                    }else if(msg && msg.code == 200) {

                        layer.msg("预约成功",{time:1000},function () {
                            window.location.reload();
                        });

                    }else{
                        layer.msg(msg.msg);
                        return false;
                    }
                }
            });
        });

        $(".name").focus(function(){
            $("#span_usesr").hide(1000);
            $("#span_usesr").text("");
        });

        $(".tel").focus(function(){
            $("#span_usesr").hide(1000);
            $("#span_user").text("");
        });


        $(".weixin").mouseover(function(){
            $(".izl-rmenu_code").css("display","block")
        }).mouseout(function(){
            $(".izl-rmenu_code").css("display","none")
        })


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
