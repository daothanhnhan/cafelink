<?php
	$tai_sao_mot = $action_page->getPageDetail_byId(37, $lang);
?>
<div class="gb-banner-1_vyhofoco">
    <div class="slideSub1_vyhofoco">
        <p class="titleSlide_vyhofoco">Dược liệu Tây Bắc</p>
        <p class="noneSlide_vyhofoco"><?= $tai_sao_mot['page_name'] ?></p>
        <a href="/<?= $tai_sao_mot['friendly_url'] ?>" title="name">Chi Tiết</a>
    </div>
</div>
<style type="text/css" media="screen">
	.gb-banner-1_vyhofoco {
		background: url(/images/<?= $tai_sao_mot['page_img'] ?>);
	}
</style>