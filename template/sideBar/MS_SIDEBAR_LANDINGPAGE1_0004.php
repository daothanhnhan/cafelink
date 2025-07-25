<link rel="stylesheet" href="./plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="./plugin/owl-carouse/owl.theme.default.min.css">

<div class="gb-sanpham-khuyenmai">
    <aside class="widget">
        <h3 class="widget-title">sản phẩm khuyến mại</h3>
        <div class="widget-content">
            <div class="list_product_slide list_product owl-carousel owl-theme">
                <div class="item">
                    <div class="product-item">
                        <?php include DIR_PRODUCT."MS_PRODUCT_AROMACAR_0003.php";?>
                        <div class="item-img">
                            <a href=""><img src="images/product/a1.jpg" alt="" class="img-responsive"></a>
                        </div>
                        <div class="item-text">
                            <h3><a href="">Sữa Meiji số 4.</a></h3>
                            <!--GIÁ-->
                            <?php include DIR_PRODUCT."MS_PRODUCT_AROMACAR_0002.php";?>
                            <!--GIỎ HÀNG-->
                            <?php include DIR_CART."MS_CART_AROMACAR_0003.php";?>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="product-item">
                        <?php include DIR_PRODUCT."MS_PRODUCT_AROMACAR_0003.php";?>
                        <div class="item-img">
                            <a href=""><img src="images/product/a2.jpg" alt="" class="img-responsive"></a>
                        </div>
                        <div class="item-text">
                            <h3><a href="">Sữa Meiji số 4.</a></h3>
                            <!--GIÁ-->
                            <?php include DIR_PRODUCT."MS_PRODUCT_AROMACAR_0002.php";?>
                            <!--GIỎ HÀNG-->
                            <?php include DIR_CART."MS_CART_AROMACAR_0003.php";?>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="product-item">
                        <?php include DIR_PRODUCT."MS_PRODUCT_AROMACAR_0003.php";?>
                        <div class="item-img">
                            <a href=""><img src="images/product/a3.jpg" alt="" class="img-responsive"></a>
                        </div>
                        <div class="item-text">
                            <h3><a href="">Sữa Meiji số 4.</a></h3>
                            <!--GIÁ-->
                            <?php include DIR_PRODUCT."MS_PRODUCT_AROMACAR_0002.php";?>
                            <!--GIỎ HÀNG-->
                            <?php include DIR_CART."MS_CART_AROMACAR_0003.php";?>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="product-item">
                        <?php include DIR_PRODUCT."MS_PRODUCT_AROMACAR_0003.php";?>
                        <div class="item-img">
                            <a href=""><img src="images/product/a4.jpg" alt="" class="img-responsive"></a>
                        </div>
                        <div class="item-text">
                            <h3><a href="">Sữa Meiji số 4.</a></h3>
                            <!--GIÁ-->
                            <?php include DIR_PRODUCT."MS_PRODUCT_AROMACAR_0002.php";?>
                            <!--GIỎ HÀNG-->
                            <?php include DIR_CART."MS_CART_AROMACAR_0003.php";?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</div>

<script src="./plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function () {
        $('.list_product_slide').owlCarousel({
            loop:true,
            responsiveClass:true,
            nav:false,
            navText:[],
            dots:true,
            responsive:{
                0:{
                    items:1
                }
            }
        });
    });
</script>