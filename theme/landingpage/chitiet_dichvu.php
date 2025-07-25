<?php 
    $action_service = new action_service(); 
    $slug = isset($_GET['slug']) ? $_GET['slug'] : '';

    $rowLang = $action_service->getserviceLangDetail_byUrl($slug,$lang);
    $row = $action_service->getserviceDetail_byId($rowLang['service_id'],$lang);
    $_SESSION['sidebar'] = 'serviceDetail';
    $service_breadcrumb = $action_service->getserviceCatLangDetail_byId($row['servicecat_id'], $lang);
    $breadcrumb_url = $service_breadcrumb['friendly_url'];
    $breadcrumb_name = $service_breadcrumb['lang_servicecat_name'];
    $use_breadcrumb = true;
?>
<div class="gb-chitiet-tintuc">
    <div class="container">

         <?php include_once DIR_BREADCRUMBS."MS_BREADCRUMS_LANDINGPAGE1_0001.php";?>

        <div class="row">
            <div class="col-md-3">

                <?php include_once DIR_SIDEBAR."MS_SIDEBAR_LANDINGPAGE1_0002.php"; ?>
                <?php include_once DIR_SIDEBAR."MS_SIDEBAR_LANDINGPAGE1_0003.php"; ?>
                <?php include_once DIR_SIDEBAR."MS_SIDEBAR_LANDINGPAGE1_0005.php"; ?>
                <?php include_once DIR_SIDEBAR."MS_SIDEBAR_LANDINGPAGE1_0006.php"; ?>

            </div>
            <div class="col-md-9">
                <?php include_once DIR_SERVICE."MS_SERVICE_LANDINGPAGE1_0006.php";?>

                <!--comment-->
                <?php include_once DIR_EMAIL."MS_EMAIL_LANDINGPAGE1_0003.php";?>

                <!--TIN TỨC LIÊN QUAN-->
                <?php include_once DIR_SERVICE."MS_SERVICE_LANDINGPAGE1_0005.php";?>
            </div>
        </div>
    </div>
</div>