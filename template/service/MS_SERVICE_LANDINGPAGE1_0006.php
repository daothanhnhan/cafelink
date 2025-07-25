<?php 
    $action_lang = new action_lang();
    $url_lang = $action_lang->get_url_lang_serviceDetail($slug, $lang);
?>

<input type="hidden" name="lang_current" id="lang_current" value="<?php echo $lang;?>">
<input type="hidden" name="url_lang" value="<?php echo $url_lang;?>" id="url_lang">
<div class="gb-chitiet-tintuc-content">
    <h1 style="margin: 0"><?= $rowLang['lang_service_name'] ?></h1>
    <div class="gb-author-time">
        <ul>
            <li class="time"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <?= date('Y-m-d', strtotime($row['service_create_date']))  ?></li>
            <li class="author"><i class="fa fa-user-o" aria-hidden="true"></i> admin</li>
        </ul>
    </div>
    <div class="gb-chitiet-tintuc-body">
         <?= $rowLang['lang_service_content'] ?>
    </div>
</div>