/**
 * Created by wangxiao on 16/11/11.
 */

    (function (){

        $('.shoufu').css('height',$('.shoufu').css('width'));
        var n = $('.money_item').css('width');

        $('.money_item').css('height',n*1);

    })();

    // nav 显示隐藏
    (function (){

        $(".nav_fr").click(function(){

            var n = $(".nav .nav_hide").hasClass("active")
            if( n ){
                $(".nav .nav_hide").removeClass("active")
            }else{
                $(".nav  .nav_hide").addClass("active")
            }

        })
    })();

    /* 提交表单弹出框 */


    (function (){

            $('.appointment').click(function(){

                $("body").attr("overflow","hidden")

                $('.bounced').css("display","block");
                $('.mask').css("display","block")
            })
            $('.delete').click(function(){
                $('.bounced').css("display","none");
                $('.mask').css("display","none")
            })

            /*提交表单*/
            $(".btn").click(function(){

                var oName = $(".name").val();
                var oTel = $(".tel").val();

                if(oName == ""){
                    $("#span_usesr").css("display","block");
                    $("#span_usesr").text("用户名不能为空");
                    return false;
                }

                if(oTel == ""){
                    $("#span_usesr").css("display","block");
                    $("#span_usesr").text("手机号不能为空");
                    return false;
                }
                if(!(/^1(3|4|5|7|8)\d{9}$/.test(oTel))){
                    $("#span_usesr").css("display","block");
                    $("#span_usesr").text("手机号不正确");
                    return false;
                }

                if(oName !== "" && (/^1(3|4|5|7|8)\d{9}$/.test(oTel)) ){
                    $(".mask_02").css("display","block");
                    $(".bounced_pic").css("display","block");
                    $(".bounced").css("display","none");
                }
            })

            $(".name").keydown(function(){
                $("#span_usesr").css("display","none");
                $("#span_usesr").text("");
            });

            $(".tel").keydown(function(){
                $("#span_usesr").css("display","none");
                $("#span_user").text("");
            });

            $('.btn').click(function(){
                $("#inp").val($(this).attr('usertype'));
            })


        $(".know").click(function(){
            $(".bounced_pic").css("display","none");
            $(".mask").css("display","none");
            $(".mask_02").css("display","none");
        })

    })();

    // 显示隐藏
    (function (){

        $(".nav_fr").click(function(){

            var n = $(".nav .nav_hide").hasClass("active")
            if( n ){
                $(".nav .nav_hide").removeClass("active")
            }else{
                $(".nav  .nav_hide").addClass("active")
            }

        })
    })();

    /* 新车详情页面 */

    (function(){

        $(".fenqi_list .top li").click(function(){
            if( $(this).hasClass("active") ){
                $(this).removeClass("active");
            }else{
                $(".fenqi_list .top li").removeClass('active');
                $(this).addClass('active');
            }
        })

        $(".fenqi_list .down li").click(function(){
            if( $(this).hasClass("active") ){
                $(this).removeClass("active");
            }else{
                $(".fenqi_list .down li").removeClass('active');
                $(this).addClass('active');
            }
        })
    })();

    /* 二手车详情页面 tab */

    // options 选项卡切换
    (function (){

        fnTab( $('.tabNav2'), $('.tabCon2'), 'click' );
        fnTab( $('.tabNav3'), $('.tabCon3'), 'click' );
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
    })();


















