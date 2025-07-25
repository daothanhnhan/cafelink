<?php 
    if (!isset($use_breadcrumb)) {
        $use_breadcrumb = '';
    }
?>
<div class="gb-breadcrum">
    <?php if ($use_breadcrumb) { ?>
        <!-- Breadcrumbs -->
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="/<?= $breadcrumb_url ?>"><?= $breadcrumb_name ?></a></li>
            <li><a href="#"><?= $title ?></a></li>
        </ul>
        <!-- End breadcrumbs -->
        <?php } else { ?>
        <!-- Breadcrumbs -->
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i></a></li>
            <li><a href="#">
                <?php
                    if($_GET['page'] == "products"){
                        echo "All product";
                    }else if($_GET['page'] == "san-pham"){
                        echo "Tất cả sản phẩm";
                    }else if($_GET['page'] == "contact"){
                        echo "Contact";
                    }else if($_GET['page'] == "lien-he"){
                        echo "Liên hệ";
                    }else if($_GET['page'] == "cart"){
                        echo "Shopping Cart";
                    }else if($_GET['page'] == "gioi-thieu-en"){
                        echo "About Us";
                    }else if($_GET['page'] == "tin-tuc"){
                        echo "Tin tức";
                    }else if($_GET['page'] == "en-chuyen-giao-cong-nghe"){
                        echo "Technology Transfer";
                    }else{
                        echo $title;
                    }
                ?>
            </a></li>
        </ul>
        <!-- End breadcrumbs -->
        <?php } ?>
</div>