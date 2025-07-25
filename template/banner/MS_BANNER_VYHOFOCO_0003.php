<?php
	$tai_sao_ba = $action_page->getPageDetail_byId(39, $lang);
?>
<div class="gb-banner-3_vyhofoco">
    <div class="slideSub1_vyhofoco">
        <p class="titleSlide_vyhofoco">Dược liệu Tây Bắc</p>
        <p class="noneSlide_vyhofoco"><?= $tai_sao_ba['page_name'] ?></p>
        <a href="/<?= $tai_sao_ba['friendly_url'] ?>" title="name">Chi Tiết</a>
    </div>
</div>
<style type="text/css" media="screen">
	.gb-banner-3_vyhofoco {
		background: url(/images/<?= $tai_sao_ba['page_img'] ?>);
	}
</style>