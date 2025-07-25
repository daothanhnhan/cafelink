<?php
    // $send_email = new action_email();
    // $send_email->newsletter_1();
?>
<div class="gb-news-letter_vyhofoco">
    <div class="container">
        <div class="uni-footer-newletter_vyhofoco">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h4 class="titleFormMailPW">Quý khách vui lòng để lại thông tin để được tư vấn</h4>
                    <p class="noteFormMailPW">Mọi thông tin của quý khách đều được bảo mật và đảm bảo quyền riêng tư</p>
                    <p class="endFormMailPW">Cảm ơn quý khách hàng để tin tưởng và đồng hành cùng <br><b>Cafe Link Việt Nam</b></p>
                </div>
                <div class="col-md-6 col-sm-12">
                    <form action="" method="post" accept-charset="utf-8" id="newsletter2">
                        
                        <div class="input-group" style="width: 100%;margin-bottom: 10px;">
                            <input type="email" class="form-control" placeholder="Để lại mail để được thông tin ưu đãi sớm nhất" name="email" required>
                        </div>
                        <div class="input-group" style="width: 100%;margin-bottom: 10px;">
                            <input type="tel" class="form-control" placeholder="Để lại Số điện thoại" name="phone" required>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Để lại Ghi chú" name="note" >
                            <span class="input-group-btn">
                                <button class="btn btn-theme" type="submit" name="send_newsletter_1">ĐĂNG KÝ</button>
                            </span>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#newsletter2").submit(function(e) {

    e.preventDefault(); 

    var form = $(this);
    var url = "/functions/ajax/newsletter1.php";

    $("#cafe-loading").show();

    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
           },
           complete: function(){
            $("#cafe-loading").hide();
          }
         });

});
</script>
<img src="/images/cafelink-loading.gif" alt="" id="cafe-loading" style="display: none;">
<style type="text/css" media="screen">
    #cafe-loading {
        position: fixed;
        width: 500px;
        height: 500px;
        top: 50%;
        left: 50%;
        margin-top: -100px; /* Negative half of height. */
        margin-left: -250px; /* Negative half of width. */
        z-index: 99999;
    }
</style>