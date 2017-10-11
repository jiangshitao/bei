/* ��վ�������� http://www.5icool.org */
/**
 **		���ù������� 
 **     ֧�ֶ�ʱ�Զ��ֲ���ǰ���ֲ�����������ֲ�
 **/
(function($){

	/* 添加 开始 */
	var h = $(window).height();
	var w = $(window).width();

	/* 浏览器宽度小于1000  或者高度小于800 的情况 */
	if(w < 1200 || h < 820 ){
		$(".section-focus-pic").css("width","1200px");
		$(".section-focus-pic ul li img").css("width","1200px")

		$(".section-focus-pic").css("height","675px");
		$(".section-focus-pic ul li img").css("height","675px");


		$(".banner").css("bottom","0");
		$(".first .line").css("bottom","0");

	}
	/* 浏览器宽度大于1200 的情况 */
	if(window.innerWidth>1200 ){
		$(".section-focus-pic").css("width","100%");
		$(".section-focus-pic ul li img").css("width","100%")

		var ww = $(".section-focus-pic").width();
		$(".section-focus-pic ul img").height(ww/1.77);

	}

	var ww = $(".section-focus-pic").width();

	$(".section-focus-pic ul img").height(ww/1.76);

	var hh = $(".section-focus-pic ul img").height();


	/* 浏览器宽度大于1000  或者高度大于800 的情况 */
	if( w>1200 && h>820 ){
		if( hh > h ){
			var cc = hh - h ;	//图片的高度 - 浏览器可视区的高度值

			if( ww = w ){
				$(".banner").css("bottom",cc -17 );
				$(".first .line").css("bottom",cc - 17  );
			}else{
				$(".banner").css("bottom",cc -50 );
				$(".first .line").css("bottom",cc -50 );

			}
		}else if(hh < h){
			$(".banner").css("bottom",0 );
			$(".first .line").css("bottom",0);
		}
	}



	if(w<1200){
		var ww = $(".nav_con").css("width");

		ww = w ;
	}

	/* 添加 结束 */




	$("div[data-scro='controler'] b,div[data-scro='controler2'] a").click(function(){
		var T = $(this);
		if(T.attr("class")=="down") return false;
		J2ROLLING_ANIMATION.st({
			findObject : T,	//��ǰ������� Ĭ��д
			main : T.parent().parent().find("div[data-scro='list']"),	//����Ŀ���������ڶ���
			pagSource : T.parent().parent().find("div[data-scro='controler'] b"),	//�л���ť����
			className : "down",		//ѡ�е���ʽ
			duration : "slow",		//�����ٶ� ��jquery�ٶ�һ��
			on : $(this)[0].tagName=="A" ? true : false		//�����ж��Ƿ������޹��� or �����л�
		});
		return false;
	});
	var J2SETTIME="", J2Time=true,J2ROLLING_ANIMATION = {
		init : function(){
			this.start();
			this.time();	
		},
		st : function(o){
			if(J2Time){
				this.animate(o.findObject,o.main,o.className,o.duration,o.pagSource,o.on);
				J2Time = false;
			}
		},
		animate : function(T,M,C,S,P,O){
				var _prevDown = O ? P.parent().find("*[class='"+C+"']") : T.parent().find(T[0].tagName+"[class='"+C+"']"),
					_prevIndex = _prevDown.index(),
					_thisIndex = O ? (T.attr("class")=="next" ? _prevIndex+1 : _prevIndex-1) : T.index(),
					_list = M.find(".item"),
					p2n = 1;
				_prevDown.removeClass(C);
				if(O){
					if(_thisIndex==-1) _thisIndex=_list.size()-1;
					if(_thisIndex==_list.size()) _thisIndex=0;
					P.eq(_thisIndex).addClass(C);
				}else{
					T.addClass(C);
				}
				if(T.attr("class")=="prev" || _thisIndex<_prevIndex) p2n = false;
				if((T.attr("class")=="next" || _thisIndex>_prevIndex)&&T.attr("class")!="prev") p2n = true;
				
				!p2n ? _list.eq(_thisIndex).css("left",-M.width()) : '';
				_list.eq(_prevIndex).animate({left:p2n ? -M.width() : M.width()},S,function(){
					$(this).removeAttr("style");	
					J2Time = true;
				});
				_list.eq(_thisIndex).animate({left:"0px"},S);
		},
		start : function(){
			$("#section-focus-pic div[data-scro='controler'] b,#section-focus-pic div[data-scro='controler2'] a").mouseover(function(){
				window.clearInterval(J2SETTIME);																			   
			}).mouseout(function(){
				J2ROLLING_ANIMATION.time();
			});
		},
		time : function(){
			J2SETTIME = window.setInterval(function(){
				var num = $("#section-focus-pic div[data-scro='controler'] b[class='down']").index(),
					_list = $("#section-focus-pic div[data-scro='list'] li");
				_list.eq(num).animate({"left":-$("#section-focus-pic div[data-scro='list']").width()},"slow",function(){
					$(this).removeAttr("style");	
					$("#section-focus-pic div[data-scro='controler'] b").removeClass("down").eq(num).addClass("down");
				});	
				num++;
				if(num==_list.size()){
					num=0;
				}
				_list.eq(num).animate({"left":"0px"},"slow");		
			},4000);
		}
	};
	$("a").click(function(){
		$(this).blur();				  
	});
	
	J2ROLLING_ANIMATION.init();	//�Ƿ����Զ��ֲ�
})(this.jQuery || this.baidu);