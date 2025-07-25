<?php
	$tai_sao_hai = $action_page->getPageDetail_byId(38, $lang);
?>
<div class="gb-banner-2_vyhofoco">
    <div class="slideSub1_vyhofoco">
        <p class="titleSlide_vyhofoco">Dược liệu Tây Bắc</p>
        <p class="noneSlide_vyhofoco"><?= $tai_sao_hai['page_name'] ?></p>
        <a href="/<?= $tai_sao_hai['friendly_url'] ?>" title="name">Chi Tiết</a>
    </div>
</div>
<style type="text/css" media="screen">
	.gb-banner-2_vyhofoco {
		background: url(/images/<?= $tai_sao_hai['page_img'] ?>);
	}
</style>