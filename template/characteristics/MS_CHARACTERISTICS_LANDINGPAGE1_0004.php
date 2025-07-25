<link rel="stylesheet" href="./plugin/lightgallery/lightgallery.css">
<div class="gb-chungchi">
    <div class="title-center">
        <h2>Chứng chỉ</h2>
        <div class="under-line2"></div>
    </div>
    <div class="container-fluid">
        <div class="row" id="lightgallery">
            <div class="col-md-2" data-src="images/c1.jpg">
                <div class="gb-chungchi-item">
                    <img src="images/c1.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-md-2"  data-src="images/c2.jpg">
                <div class="gb-chungchi-item">
                    <img src="images/c2.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-md-2"  data-src="images/c3.jpg">
                <div class="gb-chungchi-item">
                    <img src="images/c3.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-md-2"  data-src="images/c4.jpg">
                <div class="gb-chungchi-item">
                    <img src="images/c4.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-md-2"  data-src="images/c5.jpg">
                <div class="gb-chungchi-item">
                    <img src="images/c5.jpg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-md-2"  data-src="images/c6.jpg">
                <div class="gb-chungchi-item">
                    <img src="images/c6.jpg" alt="" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./plugin/lightgallery/picturefill.min.js"></script>
<script src="./plugin/lightgallery/lightgallery.js"></script>
<script src="./plugin/lightgallery/lg-pager.js"></script>
<script src="./plugin/lightgallery/lg-autoplay.js"></script>
<script src="./plugin/lightgallery/lg-fullscreen.js"></script>
<script src="./plugin/lightgallery/lg-zoom.js"></script>
<script src="./plugin/lightgallery/lg-hash.js"></script>
<script src="./plugin/lightgallery/lg-share.js"></script>

<script>
    $(document).ready(function () {
        lightGallery(document.getElementById('lightgallery'));
    });
</script>