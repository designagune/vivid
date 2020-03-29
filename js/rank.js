$(document).ready(function(){

    let woman = [
                    {"name":"hypnotic","link":"http://www.hypnotic.co.kr"},
                    {"name":"66girls","link":"http://www.66girls.co.kr"},
                    {"name":"attrangs","link":"https://www.attrangs.co.kr/"},
                    {"name":"secretlabel","link":"http://www.secretlabel.co.kr"},
                    {"name":"merong","link":"https://www.merongshop.com"},
                    {"name":"shehj","link":"https://shehj.com"},
                    {"name":"blla","link":"https://www.blla.co.kr"},
                    {"name":"D&B","link":"http://www.dabagirl.co.kr"},
                    {"name":"bullang","link":"http://www.bullang.com"},
                    {"name":"icecream12","link":"https://icecream12.com"}
                ];

    let man   = [
                    {"name":"tomonari","link":"http://www.tomonari.co.kr/"},
                    {"name":"aboki","link":"http://www.aboki.net/"},
                    {"name":"jogun","link":"http://www.jogunshop.com/"},
                    {"name":"gerio","link":"http://gerio.co.kr/"},
                    {"name":"byslim","link":"https://www.byslim.com/"},
                    {"name":"mr-s","link":"http://mr-s.co.kr/"},
                    {"name":"boom-style","link":"http://www.boom-style.com/"},
                    {"name":"styleman","link":"https://www.styleman.kr/"},
                    {"name":"okkane","link":"http://www.okkane.co.kr/"},
                    {"name":"flyday","link":"http://www.flyday.co.kr/"}
                ];
                
    let unisex= [
                    {"name":"rohol","link":"https://www.rohol.co.kr/"},
                    {"name":"shebeach","link":"http://shebeach.co.kr/"},
                    {"name":"crewbi","link":"https://www.crewbi.com/"},
                    {"name":"thexxxy","link":"https://thexxxy.com/"},
                    {"name":"nomcore","link":"http://www.nomcore.kr/"},
                    {"name":"sn-sn","link":"http://sn-sn.co.kr/"},
                    {"name":"amella","link":"http://www.amellabeach.com/"},
                    {"name":"nomaldaddy","link":"http://normaldaddy.com/"},
                    {"name":"2vray","link":"https://2vray.com/"},
                    {"name":"bnb","link":"http://www.bonnyandbunny.com/"}
                ];
   
    //console.log(woman);
    //console.log(man);

    $(".genderlist>div").click(function(){
        $(".genderlist>div").removeClass("active");
        $(".swiper-slide").removeClass("")
        $(this).addClass("active");
        $(".genderlist>ul>li:nth-child("+($(this).index()+1)+")").fadeIn()
                                                                 .siblings().hide();
        var arrName = $(this).text();
        $("#contPlus .grid7 .cont_text h1").text(arrName);
        if ( arrName == "woman")
        {
            
            arrName = woman;
        }
        else if( arrName == "man")
        {
            arrName = man;
        }
        else
        {
            arrName = unisex;
        }
        //console.log(arrName);
        for( var i = 0; i < arrName.length; i++ )
        {
            //console.log(i);
            $(".swiper-slide[data-swiper-slide-index='"+i+"']").css("background","url(../images/"+arrName[i].name+".jpg)")
                                                               .attr("href",arrName[i].link);
        }
    });
});