<link rel="stylesheet" href="./plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="./plugin/owl-carouse/owl.theme.default.min.css">
<div class="gb-customer-say_vyhofoco">
    <div class="cms-box-heading">
            <span class="cms-heading-inner">Nhận xét của khách hàng</span>
        </div>

        <div class="gb-customer-say_vyhofoco-slide owl-carousel owl-theme">
            <div class="item">
                <div class="gb-customer-say_vyhofoco-item">
                    <div class="peoplesay-block">
                        <div class="test-image">
                            <img src="/images/custommer/img.png" alt="" class="img-ressponsive">
                        </div>
                        <div class="test-content">
                            <div class="testi-details">
                            <a href="#">Phạm Ngọc Hưng</a>
                            <span class="designation">- Khách hàng tiềm năng</span>
                            <a href="" class="btn-xemvideo">Xem chi tiết</a>
                        </div>
                            <div class="test-desc">
                                <p>Sản phẩm đa dạng, chất lượng tốt, không pha tạp, được nhiều người dùng tin tưởng và sử dụng</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="gb-customer-say_vyhofoco-item">
                    <div class="peoplesay-block">
                        <div class="test-image">
                            <img src="/images/custommer/img2.png" alt="" class="img-ressponsive">
                        </div>
                        <div class="test-content">
                            <div class="testi-details">
                                <a href="#">Nguyễn Hải Lan Anh</a>
                            <span class="designation">- Khách hàng tiềm năng</span>
                            <a href="" class="btn-xemvideo">Xem chi tiết</a>
                        </div>
                            <div class="test-desc">
                                <p>Sản phẩm đa dạng, chất lượng tốt, không pha tạp, được nhiều người dùng tin tưởng và sử dụng</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


<script src="./plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function () {
        $('.gb-customer-say_vyhofoco-slide').owlCarousel({
            loop:true,
            responsiveClass:true,
            autoplay:true,
            nav:false,
            margin:30,
            navText:[],
            dots:false,
            responsive:{
                0:{
                    items:1
                }
            }
        });
    });
</script>
