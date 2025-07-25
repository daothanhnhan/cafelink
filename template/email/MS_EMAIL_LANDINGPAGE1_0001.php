<?php
    // $email = new action_email();
    // $send_email = $email->lien_he();
?>
<div class="gb-content-home-banner-left">
    <div class="gb-form-register-course">
        <h3>Đăng ký tư vấn miễn phí</h3>
        <?php
            // include_once 'timer.php';
        ?>
        <form id="lienhe" name="" class="reservation-form" method="post" action="">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <input placeholder="Họ và tên" type="text" id="reservation_name" name="reservation_name" class="form-control" aria-required="true" required="">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input placeholder="Email" type="text" id="reservation_email" name="reservation_email" class="form-control" required="" aria-required="true">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input placeholder="Điện thoại" type="text" id="reservation_phone" name="reservation_phone" class="form-control" required="" aria-required="true">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <textarea placeholder="Ghi chú" rows="3" class="form-control required" name="form_message" id="form_message" aria-required="true"></textarea>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group mb-0 mt-10">
                        <input name="form_botcheck" class="form-control" type="hidden" value="">
                        <button type="submit" class="btn btn-colored btn-theme-color-2 text-white btn-lg btn-block btn-submit-course" data-loading-text="Please wait..." name="lien_he">Đăng ký</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $("#lienhe").submit(function(e) {

    e.preventDefault(); 

    var form = $(this);
    var url = "/functions/ajax/lienhe.php";

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