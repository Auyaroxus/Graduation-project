$(document).ready(function(){
    $(".menu-icon").click(function(){
        $("nav ul").toggleClass("showing");
    });

    $(window).scroll(function(){
        if($(window).scrollTop()) {
            $("nav").addClass("black");
        }
        else {
            $("nav").removeClass("black");
        }
    });

    $(".register").hide();
    $('.login_li').addClass("active");

    $(".register_li").click(function(){
        $(this).addClass("active");
        $(".login_li").removeClass("active");
        $(".register").show();
        $(".login").hide();
    });

    $(".login_li").click(function(){
        $(this).addClass("active");
        $(".register_li").removeClass("active");
        $(".register").hide();
        $(".login").show();
    });

    
    $(".cal-but").click(function(){
        $(".calculator").toggle(1000);
    });

    $(".cal-off").click(function(){
        $(".calculator").toggle(1000);
    });

    $(".exa-btn").click(function(){
        $(".example-postup").toggle(1000);
    });
    
});

