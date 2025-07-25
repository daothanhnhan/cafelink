

<?php 
	$linh_vuc = $action->getList('linh_vuc', 'productcat_parent', '0', 'productcat_id', 'desc', '', '', '');
?>
<div class="container">
	<?php foreach ($linh_vuc as $item) { ?>
	<a href="/<?= $item['friendly_url'] ?>" class="linkCate_PWeb" ><img src="/images/<?= $item['productcat_img'] ?>" class="linkImage_PWeb" alt=""><span><?= $item['productcat_name'] ?></span></a>
	<?php } ?>
</div>