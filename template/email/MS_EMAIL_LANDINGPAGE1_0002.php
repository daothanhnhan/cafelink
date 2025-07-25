<?php
    // $email = new action_email();
    // $send_email = $email->lien_he();
?>
<div class="gb-form-lienhe">
    <h3>Thông tin liên hệ</h3>
    <form action="" method="post" id="lienhe">
        <div class="form-group">
            <label>Họ và tên</label>
            <input type="text" name="reservation_name" class="form-control" required="">
        </div>
         <div class="form-group">
            <label>Số điện thoại</label>
            <input type="phone" name="reservation_phone" class="form-control" required="">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="reservation_email" class="form-control" required="">
        </div>
        <div class="form-group">
            <label>Nội dung</label>
            <textarea class="input-xlarge form-control" name="form_message" rows="6"></textarea>
        </div>

        <button class="btn btn-gui" name="lien_he">Gửi liên hệ</button>
    </form>
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