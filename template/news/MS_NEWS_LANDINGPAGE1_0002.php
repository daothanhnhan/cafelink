<?php 
    $action = new action();
    $action_news = new action_news();     
    if (isset($_GET['slug']) && $_GET['slug'] != '') {
        $slug = $_GET['slug'];//echo 'tuan';die;                    
        $rowCatLang = $action_news->getNewsCatLangDetail_byUrl($slug,$lang);
        $rowCat = $action_news->getNewsCatDetail_byId($rowCatLang[$nameColIdNewsCat_newsCatLanguage],$lang);
        if (newsCatPageHasSub) {
            $rows = $action_news->getNewsList_byMultiLevel_orderNewsId($rowCat[$nameColId_newsCat],'desc',$trang,6,$slug);
        } else {
            $rows = $action_news->getNewsCat_byNewsCatIdParentHighest($rowCat[$nameColId_newsCat],'asc');//var_dump($rows);die;
        }        
    }
    else $rows = $action->getList($nameTable_news,'','',$nameColId_news,'asc',$trang,6,'news-cat'); 
?>

<?php if(newsCatPageHasSub){?>
    <input type="hidden" name="lang_current" id="lang_current" value="<?php echo $lang;?>">
    <input type="hidden" name="url_lang" value="<?php echo $url_lang;?>" id="url_lang"> 

    <div class="gb-tintuc-right">
        <?php 
            $d = 0;
            foreach ($rows['data'] as $item) { 
                $d++;
                $action_news1 = new action_news(); 
                $rowLang1 = $action_news1->getNewsLangDetail_byId($item['news_id'],$lang);
                $row1 = $action_news1->getNewsDetail_byId($item['news_id'],$lang);
        ?>
        <div class="gb-tintuc-item">
            <div class="row">
                <div class="col-md-5 col-sm-5">
                    <div class="item-img">
                        <a href="/<?= $rowLang1['friendly_url'] ?>">
                            <img src="/images/<?= $row1['news_img'] ?>" alt="" class="img-responsive">
                        </a>
                    </div>
                </div>
                <div class="col-md-7  col-sm-7">
                    <div class="item-text">
                        <h2><a href="/<?= $rowLang1['friendly_url'] ?>"><?= $rowLang1['lang_news_name'] ?></a></h2>
                        <p>
                            <?= $rowLang1['lang_news_des'] ?>
                        </p>
                        <time> <i class="fa fa-calendar-plus-o" aria-hidden="true"></i> <?= date('d-m-Y', strtotime($row1['news_created_date']))  ?></time>
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
                $action_news1 = new action_news(); 
                $rowLang1 = $action_news1->getNewsLangDetail_byId($item['news_id'],$lang);
                $row1 = $action_news1->getNewsDetail_byId($item['news_id'],$lang);
        ?>
        <div class="gb-tintuc-item">
            <div class="row">
                <div class="col-md-5 col-sm-5">
                    <div class="item-img">
                        <a href="/<?= $rowLang1['friendly_url'] ?>">
                            <img src="/images/<?= $row1['news_img'] ?>" alt="" class="img-responsive">
                        </a>
                    </div>
                </div>
                <div class="col-md-7  col-sm-7">
                    <div class="item-text">
                        <h2><a href="/<?= $rowLang1['friendly_url'] ?>"><?= $rowLang1['lang_news_name'] ?></a></h2>
                        <p>
                            <?= $rowLang1['lang_news_des'] ?>
                        </p>
                        <time> <i class="fa fa-calendar-plus-o" aria-hidden="true"></i><?= date('d-m-Y', strtotime($row1['friendly_url']))  ?></time>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php include DIR_PAGINATION."MS_PAGINATION_LANDINGPAGE1_0001.php"; ?>
    </div>
<?php } ?>