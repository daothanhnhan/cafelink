<div class="gb-nhanxet">
    <!-- <div class="fb-comments" data-href="" data-width="100%" data-numposts="5"></div> -->
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c64dd37dd697aab"></script>
    <div class="addthis_inline_share_toolbox"></div>
</div>

<div class="fb-like" data-href="<?= $action->curPageURL1() ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>

<div class="fb-share-button" data-href="<?= $action->curPageURL1() ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= $action->curPageURL1() ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>

<div class="gb-nhan-xet-baiviet">

    <!--NHẬN XÉT HEADER-->
    <div class="gb-nhan-xet-baiviet-header">
        <h3>NHẬN XÉT VỀ BÀI VIẾT</h3>
        <div class="gb-form-nhan-xet">
            <div class="fb-comments" data-href="<?= $action->curPageURL() ?>" data-width="100%" data-numposts="1"></div>
        </div>
    </div>
</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=176177179839531&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>