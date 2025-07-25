
<link rel="stylesheet" href="./plugin/owl-carouse/owl.carousel.min.css">
<link rel="stylesheet" href="./plugin/owl-carouse/owl.theme.default.min.css">
<?php
    $action_service_relative = new action_service();
    $list_service_relative = $action_service_relative->getListserviceRelate_byIdCat_hasLimit($row['servicecat_id'], 6);
?>
<div class="gb-tintuc-lienquan">
    <!--HEADER PRODUICT TOP-->
    <div class="gb-product-top">
        <div class="gb-tintuc-lienquan-title">Dịch vụ liên quan</div>
    </div>
    <!--SHOW PRODUCT ITEM-->
    <div class="gb-product-show">
        <div class="gb-tintuc-lienquan-three-item owl-carousel owl-theme">
            <?php
                foreach ($list_service_relative as $item) {
            ?>
            <div class="item">
                <div class="gb-tintuc-item">
                    <div class="item-img">
                        <a href="/<?= $item['friendly_url'] ?>">
                            <img src="/images/<?= $item['service_img'] ?>" alt="" class="img-responsive">
                        </a>
                    </div>
                    <div class="item-text">
                        <h2><a href="/<?= $item['friendly_url'] ?>"><?= $item['service_name'] ?></a></h2>
                        <p>
                            <?= $item['service_des'] ?>
                        </p>
                        <time> <i class="fa fa-calendar-plus-o" aria-hidden="true"></i> <?= date('d-m-Y', strtotime($item['service_create_date']) ) ?></time>
                        <div class="btn-doctiep">
                            <a href="/<?= $item['friendly_url'] ?>">Đọc tiếp</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<script src="./plugin/owl-carouse/owl.carousel.min.js"></script>
<script>
    $(document).ready(function () {
        $('.gb-tintuc-lienquan-three-item').owlCarousel({
            loop:true,
            autoplay: true,
            responsiveClass:true,
            nav:true,
            navText:[],
            dots:false,
            margin:30,
            responsive:{
                0:{
                    items:1
                },
                768:{
                    items:3
                }
            }
        });
    });
</script>