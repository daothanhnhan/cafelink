<script src="js/jquery.validate.min.js" type="text/javascript" charset="utf-8" ></script>
<style type="text/css">
.numbers {
    width: 55px;
    text-align: center; 
    font-family: Arial; 
    font-size: 40px;
    font-weight: bold;    /* options are normal, bold, bolder, lighter */
    font-style: normal;   /* options are normal or italic */
    color: #00aeef;       /* change color using the hexadecimal color codes for HTML */
}
.title-time {        /* the styles below will affect the title under the numbers, i.e., "Days", "Hours", etc. */
    width: 55px;
    text-align: center; 
    font-family: Arial; 
    font-size: 15px;
    //font-weight: bold;    /* options are normal, bold, bolder, lighter */
    color: #00aeef;       /* change color using the hexadecimal color codes for HTML */
}
#table {
    width: 400px;
    height: 48px;
    border-style: none;
    background-color: transparent;
    margin: 0px auto;
    position: relative;   /* leave as "relative" to keep timer centered on your page, or change to "absolute" then change the values of the "top" and "left" properties to position the timer */
    top: 0px;             /* change to position the timer */
    left: 0px;            /* change to position the timer; delete this property and it's value to keep timer centered on page */
}
</style>

<script type="text/javascript">

/*
Count down until any date script-
By JavaScript Kit (www.javascriptkit.com)
Over 200+ free scripts here!
Modified by Robert M. Kuhnhenn, D.O. 
on 5/30/2006 to count down to a specific date AND time,
on 10/20/2007 to a new format, and 1/10/2010 to include
time zone offset.
*/

/*  Change the items noted in light blue below to create your countdown target date and announcement once the target date and time are reached.  */
var current="Winter is here!";  //-->enter what you want the script to display when the target date and time are reached, limit to 20 characters
var year=2010;      //-->Enter the count down target date YEAR
var month=12;        //-->Enter the count down target date MONTH
var day=21;         //-->Enter the count down target date DAY
var hour=18;        //-->Enter the count down target date HOUR (24 hour clock)
var minute=38;      //-->Enter the count down target date MINUTE
var tz=-5;          //-->Offset for your timezone in hours from UTC (see http://wwp.greenwichmeantime.com/index.htm to find the timezone offset for your location)

//-->    DO NOT CHANGE THE CODE BELOW!    <--
var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

function countdown(yr,m,d,hr,min){
    theyear=yr;themonth=m;theday=d;thehour=hr;theminute=min;
    var today=new Date();
    var todayy=today.getYear();
    if (todayy < 1000) {todayy+=1900;}
    var todaym=today.getMonth();
    var todayd=today.getDate();
    var todayh=today.getHours();
    var todaymin=today.getMinutes();
    var todaysec=today.getSeconds();
    var todaystring1=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec;
    var todaystring=Date.parse(todaystring1)+(tz*1000*60*60);
    var futurestring1=(montharray[m-1]+" "+d+", "+yr+" "+hr+":"+min);
    var futurestring=Date.parse(futurestring1)-(today.getTimezoneOffset()*(1000*60));
    var dd=futurestring-todaystring;
    var dday=Math.floor(dd/(60*60*1000*24)*1);
    var dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1);
    var dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);
    var dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);
    if(dday<=0&&dhour<=0&&dmin<=0&&dsec<=0){
        document.getElementById('count2').innerHTML=current;
        document.getElementById('count2').style.display="inline";
        document.getElementById('count2').style.width="390px";
        document.getElementById('dday').style.display="none";
        document.getElementById('dhour').style.display="none";
        document.getElementById('dmin').style.display="none";
        document.getElementById('dsec').style.display="none";
        document.getElementById('days').style.display="none";
        document.getElementById('hours').style.display="none";
        document.getElementById('minutes').style.display="none";
        document.getElementById('seconds').style.display="none";
        document.getElementById('spacer1').style.display="none";
        document.getElementById('spacer2').style.display="none";
        return;
    }
    else {
        document.getElementById('count2').style.display="none";
        document.getElementById('dday').innerHTML=dday;
        document.getElementById('dhour').innerHTML=dhour;
        document.getElementById('dmin').innerHTML=dmin;
        document.getElementById('dsec').innerHTML=dsec;
        setTimeout("countdown(theyear,themonth,theday,thehour,theminute)",1000);
    }
}
</script>
<div id="Timer">
    <div class="Center-Width">
        <div class="Infor-Width">
            <div class="countdown">
                <!-- <div class="header-box">
                    <p class="title1"><em>Để Lại Thông Tin Để Được Hỗ Trợ Chi Tiết</em></p>
                </div>
                <div class="colLeft">
                	<a href="tel:1900066898" ><img src="image/call.png"  style="width:100%;"/></a>
                </div> -->
                <div class="colRight">
                    <div class="box-count">
                        <!-- <p class="titleSaleCount">Thời gian còn lại</p> -->

                        <table id="table" border="0" style="float:none;">
                            <tr>
                                <td align="left" colspan="6"><div class="numbers" id="count2" style="padding: 10px; "></div></td>
                            </tr>
                            <tr id="spacer1" style="float:left;">
                                <td align="center" ><div class="numbers" id="dday"></div></td>
                                <td align="center" ><div class="numbers" id="">:</div></td>
                                <td align="center" ><div class="numbers" id="dhour"></div></td>
                                <td align="center" ><div class="numbers" id="">:</div></td>
                                <td align="center" ><div class="numbers" id="dmin"></div></td>
                                <td align="center" ><div class="numbers" id="">:</div></td>
                                <td align="center" ><div class="numbers" id="dsec"></div></td>
                            </tr>
                            <tr id="spacer2" style="float:left;">
                                <td align="center" ><div class="title-time" id="days">Ngày</div></td>
                                <td><div class="title-time"></div></td>
                                <td align="center" ><div class="title-time" id="hours">Giờ</div></td>
                                <td><div class="title-time"></div></td>
                                <td align="center" ><div class="title-time" id="minutes">Phút</div></td>
                                <td><div class="title-time"></div></td>
                                <td align="center" ><div class="title-time" id="seconds">Giây</div></td>
                            </tr>

                        </table>
                    </div>
                    <!-- <div class="form-infor">
                        <form action=""  role="form" id="sendContact">
                            <input type="hidden" name="action" value="sendContact">
                            <div class="row10" style="text-align: center">
                                <div class="form-group">
                                    <input type="text" class="form-control inp" id="" name="name" placeholder="Họ tên">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control inp" id="" name="type" placeholder="Lĩnh vực">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control inp" id="" name="phone" placeholder="Điện thoại">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control inp" id="" name="email" placeholder="Email">
                                </div>

                                <div class="form-group" style="width: 100%;margin-bottom: 20px">
                                    <textarea id="input" class="form-control inp-large" name="note" rows="6" placeholder="Ghi chú"></textarea>
                                </div>
                            
                                <button type="submit" class="btn btn-primary btn-form">Đăng ký ngay</button>
                            </div>
                        </form>
                        <p class="titleEndForm" style="width:100%; text-align:center; float:left; color:#fff; font-size:17px; margin-top:10px;">Chuyên viên của chúng tôi sẽ gọi lại sau <strong style="color:#DCA601;">5 phút</strong></p>
                    </div> --> 
                </div>
            </div>
        </div>
    </div>
</div>
<style>

    label.error{
        color: #fff;
        font-size: 13px;
    }


    #Timer{
        /*background-color: #f1f1f1;*/
        width: 100%;
        float: left;
        padding: 0px 0 30px 0px;
    }

    .countdown{
        background-color: #3b3b3b;
        width: 80%;
    }

    .header-box{
        width: 100%;
        float: left;
        margin-bottom: 30px;
    }
    
    .colLeft{
        width: 45%;
        float: left; 
        padding-right: 30px;
    }

    .colRight{
        width: 125%;
        float: left;
		margin-top:20px;
    }

    .box-count{
        background-color: #fff;
        padding: 10px 0;
        position: relative;
    }

    .box-count:after{
        content: '';
        border-bottom: 1px solid #cacaca;
        position: absolute;
        bottom: 2px;
        width: 100%;
        height: 2px;
    }

    .titleSaleCount{
        width: 100%;
        text-align: center;
        font-size: 20px;
        margin-bottom: 10px;
        font-family: "Open sans";
    }
        
    .loading-cover{
        background-image: url('../image/default.gif');
        background-color: rgba(255,255,255,0.7);
        background-position: center;
        background-repeat: no-repeat;
    }

    .form-infor{
        background-color: #000;
        padding: 15px;
		float:left;
		width:100%;
        border: 1px solid #055cb3;
        
    }


    .title1{
        font-size: 33px;
        line-height: 42px;
        width: 100%;
        text-align: center;
        color: #8F0E0E;
        font-weight: bold;
    }

    .old-price{
        color: #f6a8aa;
        font-size: 36px;
        font-weight: bold;
        width: 100%;
        text-decoration: line-through;
    }

    .new-price{
        font-size: 61px;
        font-weight: bold;
        color: #fff;
        line-height: 45px;
    }

    .caption{
        color: #fff;
        font-size: 22px;
        margin-top: 30px;
    }

    /*.form-group{
        width: 50%;
        padding: 10px;
        float: left;
    }*/

    /*.form-group:nth-child(odd){
        clear: both;
    }*/

    .row10{
        margin-right: -10px;
        margin-left: -10px;
    }

    .inp{
        height: 40px;
        font-size: 16px;
        line-height: 40px;
        border: 2px solid #fff;
        border-radius: 5px;
        color: #fff;
        padding: 0 10px;
        width: 100%;
        background-color: transparent;
    }

    .inp-large{
        font-size: 16px;
        border: 2px solid #fff;
        border-radius: 5px;
        color: #fff;
        padding: 5px 10px;
        width: 100%;
        background-color: transparent;
    }

    .btn-form{
        float: none;
        display: inherit;
        color: #fff;
        font-weight: bold;
        font-size: 24px;
        background-color: #00aeef;
        padding: 6px 30px; 
        text-align: center;
        border: 0;
        border-radius: 5px;
        margin-top: 20px;
        cursor: pointer;
    }

    .btn-form:hover{
        background-color: #37C1F5;
    }

    .end-box{
        width: 100%;
        float: left;
        padding: 0 10%;
        margin-top: 30px;
    }
    
    .end-text{
        color: #fff;
        font-size: 16px;
        text-align: center;
        width: 100%;
    }

    @media all and (max-width: 920px){
        .colLeft{
            width: 100%;
            height: initial;
            padding-bottom: 20px;
        }

        .colRight{
            width: 100%;
        }
    }

    @media all and (max-width: 640px){
        .countdown{
            width: 100%;
            padding: 0 10px;
        }
    }
    
    @media all and (max-width: 480px){
        .form-group{
            width: 100%;
        }

        .form-infor{
            height: inherit;
        }
    }

</style>

<script type="text/javascript">

    /*
    Count down until any date script-
    By JavaScript Kit (www.javascriptkit.com)
    Over 200+ free scripts here!
    Modified by Robert M. Kuhnhenn, D.O. 
    on 5/30/2006 to count down to a specific date AND time,
    and on 1/10/2010 to include time zone offset.
    */

    /*  Change the items below to create your countdown target date and announcement once the target date and time are reached.  */
    var current="Winter is here!";        //—>enter what you want the script to display when the target date and time are reached, limit to 20 characters
    var year=new Date().getFullYear();      //—>Enter the count down target date YEAR
    //var month=(<?php //Print($month);?>);          //—>Enter the count down target date MONTH
    //var day=(<?php //Print($day);?>);           //—>Enter the count down target date DAY
    //var hour=(<?php //Print($hours);?>);          //—>Enter the count down target date HOUR (24 hour clock)
    var month = 5;
    var day = 12; 
    var hour = 2; 
    var minute=38;         //—>Enter the count down target date MINUTE
    var tz=-5;            //—>Offset for your timezone in hours from UTC (see http://wwp.greenwichmeantime.com/index.htm to find the timezone offset for your location)

    //—>    DO NOT CHANGE THE CODE BELOW!    <—
    var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

    function countdown(yr,m,d,hr,min){
    theyear=yr;themonth=m;theday=d;thehour=hr;theminute=min;
    var today=new Date();
    var todayy=today.getYear();
    if (todayy < 1000) {
    todayy+=1900; }
    var todaym=today.getMonth();
    var todayd=today.getDate();
    var todayh=today.getHours();
    var todaymin=today.getMinutes();
    var todaysec=today.getSeconds();
    var todaystring1=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec;
    var todaystring=Date.parse(todaystring1)+(tz*1000*60*60);
    var futurestring1=(montharray[m-1]+" "+d+", "+yr+" "+hr+":"+min);
    var futurestring=Date.parse(futurestring1)-(today.getTimezoneOffset()*(1000*60));
    var dd=futurestring-todaystring;
    var dday=Math.floor(dd/(60*60*1000*24)*1);
    var dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1);
    var dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);
    var dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);
    if(dday<=0&&dhour<=0&&dmin<=0&&dsec<=0){
    document.getElementById('count2').innerHTML=current;
    document.getElementById('count2').style.display="block";
    document.getElementById('count2').style.width="390px";
    document.getElementById('dday').style.display="none";
    document.getElementById('dhour').style.display="none";
    document.getElementById('dmin').style.display="none";
    document.getElementById('dsec').style.display="none";
    document.getElementById('days').style.display="none";
    document.getElementById('hours').style.display="none";
    document.getElementById('minutes').style.display="none";
    document.getElementById('seconds').style.display="none";
    document.getElementById('spacer1').style.display="none";
    document.getElementById('spacer2').style.display="none";
    return;
    }
    else {
    document.getElementById('count2').style.display="none";
    document.getElementById('dday').innerHTML=dday;
    document.getElementById('dhour').innerHTML=dhour;
    document.getElementById('dmin').innerHTML=dmin;
    document.getElementById('dsec').innerHTML=dsec;
    setTimeout("countdown(theyear,themonth,theday,thehour,theminute)",1000);
    }
    }

    countdown(year,month,day,hour,minute);

</script>

<script>
    $(function(){
        $('#sendContact').validate({ // initialize the plugin

            rules: {
                name: "required",
                type: "required",
                phone: {
                    required: true,
                    number: true
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                name: "Mời nhập họ tên",
                type: "Mời nhập lĩnh vực",
                phone: {
                    required: "Mời nhập số điện thoại",
                    number: "Số điện thoại không đúng định dạng"
                },
                email: {
                    required: "Mời nhập email",
                    email: "Email không đúng định dạng"
                }
             
            },
            submitHandler: function (form, e) {
                e.preventDefault();
                var formData = $(form).serialize();
                //$('.form-infor').css({'background-image','url(..image/loading.gif)'}); 
                $('.form-infor').addClass('loading-cover');
                $(form).find('button').prop('disabled',true);
                $.ajax({
                    url: 'ajax.php',
                    data: formData,
                    dataType: 'json',
                    type: 'post',
                    success:function(json){
                        if (json['success']) {
                            alert(json['success']);
                            location.reload();
                        }
                        if (json['error']) {
                            alert(json['error']);
                            $(form).find('button').removeAttr('disabled');
                        }
                    }
                })
            }
        });
        // $('#sendContact').on('submit',function(e){
        //     e.preventDefault();
        //     var formData = $(this).serialize();
        //     $.ajax({
        //         url: 'ajax.php',
        //         data: formData,
        //         dataType: 'json',
        //         type: 'post',
        //         success:function(json){
        //             if (json['success']) {
        //                 alert(json['success']);
        //             }
        //             if (json['error']) {
        //                 alert(json['error']);
        //             }
        //         }
        //     })
        // })
    })
</script>