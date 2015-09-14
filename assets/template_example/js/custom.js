/**
 * Created by Furkan on 4.8.2015.
 */

$(function(){
    $(".mobile-nav a").click(function(){
        $("div.navigasyon ul").toggle("slideUp");
        return false;
    });

    //$(window).resize(function () {
    //    var genislik = $("ul.navigasyon").width();
    //    if($("body").width()<991)
    //    {
    //        $("ul.navigasyon").width($("body").width());
    //    }else {
    //        $("ul.navigasyon").width($("body").width(genislik));
    //    }
    //})

});
