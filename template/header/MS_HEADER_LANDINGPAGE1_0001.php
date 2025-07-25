<link rel="stylesheet" href="plugin/animsition/css/animate.css">
<header>
    <script type='application/ld+json'> 
    {
      "@context": "http://www.schema.org",
      "@type": "WebSite",
      "name": "Dịch vụ marketing online tổng thể - kinhdoanhinternet.com.vn",
      "alternateName": "Dịch vụ marketing online tổng thể - kinhdoanhinternet.com.vn",
      "url": "https://kinhdoanhinternet.com.vn"
    }
    </script>
    <script type='application/ld+json'> 
    {
      "@context": "http://www.schema.org",
      "@type": "LocalBusiness",
      "name": "Dịch vụ marketing online tổng thể - cafelink.org",
      "url": "http://cafelink.org/",
      "logo": "https://kinhdoanhinternet.com.vn/images/Artboard%2089%20copypng.png",
      "image": "https://kinhdoanhinternet.com.vn/image/images/gioi-thieu-kinh-doanh-internet.JPG",
      "description": "Chúng tôi là công ty chuyên cung cấp các dịch vụ Digital Marketing Online tổng thể. Tư vấn giải pháp Marketing online giúp tăng hiệu quả kinh doanh internet cho các doanh nghiệp trong thời đại công nghệ 4.0. Với đội ngũ được đào tạo phát triển bài bản, phong cách làm việc chuyên nghiệp, đơn vị chúng tôi được hiểu như Phòng Marketing Online thuê ngoài của nhiều công ty, cá nhân cần kinh doanh online nhưng không đủ tài chính và kỹ thuật để tổ chức và quản lý đội ngũ marketing riêng cho mình. Do vậy Thuê Marketing Online bên ngoài được xem là một giải pháp an toàn về đầu tư, hiệu quả về kỹ thuật, tiết kiệm chi phí và thời gian rất lớn cho các doanh nghiệp. Việc cần làm là hợp đồng, chúng tôi cam kết hiệu quả kinh doanh với bạn.",
      "telephone" : "+84865689886 ",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Văn phòng số 02, Tòa Nhà Star Tower, 283 Khương Trung",
        "addressLocality": "Hà Nội",
        "addressRegion": "Thanh Xuân",
        "postalCode": "100000",
        "addressCountry": "Việt Nam"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "105.8170074",
        "longitude": "20.9970325"
      },
      "hasMap": "https://goo.gl/maps/KycHAn1Rcw6xv7Ub8",
      "openingHours": "Mo, Tu, We, Th, Fr, Sa -",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+84865689886",
        "contactType": "customer service"
      },
      "priceRange" : "VNĐ000 - VNĐ000"
    }
    </script>
    <script type='application/ld+json'> 
    {
      "@context": "http://www.schema.org",
      "@type": "person",
      "name": "Pham Thuy Hang",
      "url": "https://www.facebook.com/hang.itplus.1",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Văn phòng số 02, Tòa Nhà Star Tower, 283 Khương Trung",
        "addressLocality": "Hà Nội",
        "addressRegion": "Thanh Xuân",
        "postalCode": "100000",
        "addressCountry": "Việt Nam"
      },
      "email": "cafelink.org@gmail.com",
      "telephone": "+84973378669",
      "birthDate": "1989-09-11"
    }
    </script>
	<?php include DIR_MENU."MS_MENU_LANDINGPAGE1_0002.php";?>
    <div class="gb-header">
        <!--TOP HEADER-->
        <div class="gb-top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <?php include DIR_CONTACT."MS_CONTACT_LANDINGPAGE1_0001.php";?>
                    </div>
                    <div class="col-md-3">
                        <?php include DIR_SOCIAL."MS_SOCIAL_LANDINGPAGE1_0001.php";?>
                    </div>
                </div>
            </div>
        </div>

        <!--BETWEEN HEADER-->      
        <!-- <div class="gb-between-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h1><a href=""><img src="/images/<?= $rowConfig['web_logo'] ?>" alt="" class="img-responsive"></a></h1>
                    </div>
                </div>
            </div>
        </div> -->

        <!--B0TTOM HEADER-->
        <?php include DIR_MENU."MS_MENU_LANDINGPAGE1_0001.php";?>
    </div>
    
</header>

<script>
    $(document).ready(function(e){
        $('.search-panel .dropdown-menu').find('a').click(function(e) {
            e.preventDefault();
            var param = $(this).attr("href").replace("#","");
            var concept = $(this).text();
            $('.search-panel span#search_concept').text(concept);
            $('.input-group #search_param').val(param);
        });
    });
</script>

