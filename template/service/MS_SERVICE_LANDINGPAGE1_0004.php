<?php 
    $action = new action();
    $action_service = new action_service();     
    if (isset($_GET['slug']) && $_GET['slug'] != '') {
        $slug = $_GET['slug'];//echo 'tuan';die;                    
        $rowCatLang = $action_service->getserviceCatLangDetail_byUrl($slug,$lang);
        $rowCat = $action_service->getserviceCatDetail_byId($rowCatLang['servicecat_id'],$lang);
        if (serviceCatPageHasSub) {
            $rows = $action_service->getserviceList_byMultiLevel_orderserviceId($rowCat[$nameColId_serviceCat],'asc',$trang,6,$slug);
        } else {
            $rows = $action_service->getserviceCat_byserviceCatIdParentHighest($rowCat[$nameColId_serviceCat],'asc');//var_dump($rows);die;
        }        
    }
    else $rows = $action->getList($nameTable_service,'','',$nameColId_service,'asc',$trang,6,'service-cat'); 
?>

<?php if(serviceCatPageHasSub){?>
    <input type="hidden" name="lang_current" id="lang_current" value="<?php echo $lang;?>">
    <input type="hidden" name="url_lang" value="<?php echo $url_lang;?>" id="url_lang"> 

    <div class="gb-tintuc-right">
        <?php 
            $d = 0;
            foreach ($rows['data'] as $item) { 
                $d++;
                $action_service1 = new action_service(); 
                $rowLang1 = $action_service1->getserviceLangDetail_byId($item['service_id'],$lang);
                $row1 = $action_service1->getserviceDetail_byId($item['service_id'],$lang);
        ?>
        <div class="gb-tintuc-item">
            <div class="row">
                <div class="col-md-5 col-sm-5">
                    <div class="item-img">
                        <a href="/<?= $rowLang1['friendly_url'] ?>">
                            <img src="/images/<?= $row1['service_img'] ?>" alt="" class="img-responsive">
                        </a>
                    </div>
                </div>
                <div class="col-md-7  col-sm-7">
                    <div class="item-text">
                        <h2><a href="/<?= $rowLang1['friendly_url'] ?>"><?= $rowLang1['lang_service_name'] ?></a></h2>
                        <p>
                            <?= $rowLang1['lang_service_des'] ?>
                        </p>
                        <time> <i class="fa fa-calendar-plus-o" aria-hidden="true"></i> <?= date('M d, Y', strtotime($row1['service_created_date']))  ?></time>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php include DIR_PAGINATION."MS_PAGINATION_LANDINGPAGE1_0001.php"; ?>
    </div>
<?php }else{?>
    <div class="gb-tintuc-right">
        <?php 
            $d = 0;
            foreach ($rows['data'] as $item) { 
                $d++;
                $action_service1 = new action_service(); 
                $rowLang1 = $action_service1->getserviceLangDetail_byId($item['service_id'],$lang);
                $row1 = $action_service1->getserviceDetail_byId($item['service_id'],$lang);
        ?>
        <div class="gb-tintuc-item">
            <div class="row">
                <div class="col-md-5 col-sm-5">
                    <div class="item-img">
                        <a href="/<?= $rowLang1['friendly_url'] ?>">
                            <img src="/images/<?= $row1['service_img'] ?>" alt="" class="img-responsive">
                        </a>
                    </div>
                </div>
                <div class="col-md-7  col-sm-7">
                    <div class="item-text">
                        <h2><a href="/<?= $rowLang1['friendly_url'] ?>"><?= $rowLang1['lang_service_name'] ?></a></h2>
                        <p>
                            <?= $rowLang1['lang_service_des'] ?>
                        </p>
                        <time> <i class="fa fa-calendar-plus-o" aria-hidden="true"></i><?= date('M d, Y', strtotime($row1['service_created_date']))  ?></time>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php include DIR_PAGINATION."MS_PAGINATION_LANDINGPAGE1_0001.php"; ?>
    </div>
<?php } ?>