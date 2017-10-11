<?php $this->load->view('common/header');?>
<link rel="stylesheet" type="text/css" href="<?php echo rtrim(site_url('static'),'/') . '/' ;?>css/index.css" />
<div id="fullpage">

	<!--第一个页面-->
	<div class="section first swiper-container">
		<div class="section-focus-pic" id="section-focus-pic">
			<div class="pages" data-scro="list" log-type="toppic">
				<ul>
					<?php if( ! empty($list)):?>
						<?php foreach ($list as $key => $value):?>
							<?php if($value['extended'] == '1'):?>
								<li class="item" <?php echo $key == 0 ? 'style="left: 0px;"' : '' ; ?>>
									<a <?php echo empty($value['url']) ? ' href="javascript:void(0);" class="appointment" ': ' href="'.$value['url'].'"' ?> title="<?php echo $value['title'];?>">
										<img src="<?php echo getImgPathByName($value['carSource']['filename']);?>">
									</a>
								</li>
							<?php endif;?>
						<?php endforeach;?>
					<?php endif;?>
				</ul>
			</div>
			<div class="controler" data-scro="controler">
				<b class="down">1</b><b>2</b><b>3</b>
			</div>


			<div class="controler2" data-scro="controler2">
				<a href="javascript:void(0);" class="prev"><img src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>images/star_05.png"></a>
				<a href="javascript:void(0);" class="next"><img src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>images/star_06.png"></a>
			</div>


			<div class="banner clear">

				<?php if( ! empty($list)):?>
					<?php foreach ($list as $key => $value):?>
						<?php if($value['extended'] == '2'):?>
							<div>
								<a <?php echo empty($value['url']) ? ' href="javascript:void(0);" class="appointment" ': ' href="'.$value['url'].'"' ?> title="<?php echo $value['title'];?>">
									<img src="<?php echo getImgPathByName($value['carSource']['filename']);?>" class="banner_pic01" >
								</a>
							</div>
						<?php endif;?>
					<?php endforeach;?>
				<?php endif;?>
			</div>
			<!--<div class="line"></div>-->

		</div>
	</div>

	<!--第二个页面-->
	<div class="section second">
		<div class="second_list">

			<div class="title">
				<h2>主推车型</h2>
				<!--<p>只需在线下单后，我方客服人员联系您时确定您所需的车型、金融方案，并提交您的资料 最快30分钟即可出具合同，签约完成后最快当天即可提车</p>-->
			</div>

			<div class="options">
				<ul class="nav tabNav2 clear">
					<?php if(!empty($carBrand)): ?>
						<?php foreach ($carBrand as $key => $val): ?>
							<li class="<?php echo $key == 0 ? 'active' : 'gradient' ;?> fl">
								<?php echo $val['name'];?>
							</li>
						<?php endforeach;?>
					<?php endif; ?>
				</ul>
				<div class="con">
					<?php if(!empty($newcar)):?>
						<?php foreach ($newcar as $key => $val): ?>
							<div class="tabCon2">
								<h2><?php echo isset($val['carBrand']) ? $val['carBrand'] : '' ;?></h2>
								<p><?php echo isset($val['description']) ? $val['description'] : '' ;?></p>
								<a class="appointment" data-id="<?php echo $val['id']; ?>">立即预约</a>
								<img src="<?php echo getImgPathByName($val['picture']['0'])?>">
							</div>
						<?php endforeach;?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<!--第三个页面-->
	<div class="section third" >
		<div class="title third_title">
			<h2>金融产品</h2>
			<p>只需在线下单后，我方客服人员联系您时确定您所需的车型、金融方案，并提交您的资料，最快30分钟即可出具合同，签约完成后最快当天即可提车</p>
		</div>
		<div class="item clear">
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
				<p class="info_01">购置税、首年保险可分期</p>
				<p class="info_01">部分车型享最长36期免息优惠</p>
				<!--<a class="appointment">立即预约</a>-->
			</div>
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
				<p class="info_01">最长8年车龄标准 </p>
				<p class="info_01">两证即可贷（身份证/驾驶证）</p>
				<!--<a class="appointment">立即预约</a>-->
			</div>
			<div class="money_item fl">
				<h4>网约车方案</h4>
				<p class="card">贷款额度3-50万</p>
				<div class="shoufu clear">
					<div class="shoufu_info">
						<p class="shoufu_info_01">首付</p>
						<p class="shoufu_info_02">
							<span>0</span>
						</p>
						<p class="shoufu_info_03">%起</p>
					</div>
					<!--<img src="images/index_third01.png">-->
				</div>
				<p class="info_01">提供沪牌</p>
				<p class="info_01">包办网约车新政所需资质</p>
				<!--<a class="appointment">立即预约</a>-->
			</div>
		</div>
		<div class="footer01">
			<div class="footer_container clear">
				<div class="footer_container_left fl">
					<p>
						<a>南京即刻启程</a>
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
							<a href="http://wpa.qq.com/msgrd?v=3&uin=383213654&site=qq&menu=yes"  class="ask fr">在线咨询</a>
							<!--<a href="http://wpa.qq.com/msgrd?v=3&uin=383213654&site=qq&menu=yes" class="join ">加盟我们</a>-->
						</div>
					</div>
					<div class="code fl">
						<img src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>images/code.png">
						<p class="">最新活动关注</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="mask"></div>
<div class="bounced">
	<h2>立即预约</h2>
	<img src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>images/delete.jpg" class="delete">
	<div id="span_usesr"></div>
	<input type="text" placeholder="请输入您的姓名" class="name">
	<input type="text" placeholder="请输入您的电话" class="tel">
	<input type="hidden" name="car-id" value="" />
	<input type="button" value="确定" class="btn">
	<p>*我们将在1小时内联系您</p>
</div>
</div>
<!--<div class="sus">
	<ul class="izl-rmenu">
		<li><a href="#" class="consult"></a><span class="span01">在线客服</span></li>
		<li><a href="#" class="phone"><span class="span02">客服电话</span></a></li>
		<li><a href="#" class="weixin"></a><span class="span03">官方微信</span></li>
		<li onclick="myScroll()" class="btn_top"><a href="#"></a></li>
	</ul>
</div>-->
<script type="text/javascript" src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>js/jquery.fullPage.js"></script>
<script type="text/javascript" src="<?php echo rtrim(site_url('static'),'/') . '/' ;?>js/5icool.org.js"></script>
<script>

	var idInterval;

	$(document).ready(function() {

        var n = $(".tabNav2 li").length;
        $(".tabNav2").width( 92*n + 17*(n-1));

        // options 选项卡切换
		fnTab( $('.tabNav2'), $('.tabCon2'), 'click' );
		fnTab( $('.tabNav3'), $('.tabCon3'), 'click' );

		$('#fullpage').fullpage({
			sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', '#f90'],
			'navigation': true,
		});

		$(window).resize(function(){
			window.location.reload();
		});

		$('.appointment').click(function(){
			$("input[name='car-id']").val($(this).attr("data-id"));
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

			$("#inp").val($(this).attr('usertype'));

			var oName = $(".name").val();
			var oTel = $(".tel").val();
			var carId = $("input[name='car-id']").val();

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

			$.ajax({
				type: "POST",
				url: "<?php echo site_url('reservation');?>",
				data: {
					"name":oName,"phone":oTel,"carId":carId
				},
				dataType: "json",
				success: function(msg){

					if(msg && msg.code == 201) {
						layer.msg("缺少姓名或是手机号码");
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
			$("#span_usesr").text("").hide();
		});

		$(".tel").focus(function(){
			$("#span_usesr").text("").hide();
		});

		$('.banner').css('width',$('.section-focus-pic').css('width'));
		$('.first .line').css('width',$('.section-focus-pic').css('width'));

		var ww = $(".section-focus-pic").width();
		$('.section-focus-pic').height(ww/1.77);
		//$('.section-focus-pic').height($(window).height());

		$('.shoufu').css('height',$('.shoufu').css('width'));
		var n = $('.money_item').css('width');

		$('.money_item').css('height',n*1);
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

	function checkWidthAndHeight() {

		if($(window).height() > 200)
		{
			if($(window).width() < 980)
			{
				return false;
			}
		}
		else
		{
			return false;
		}

		return true;
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

