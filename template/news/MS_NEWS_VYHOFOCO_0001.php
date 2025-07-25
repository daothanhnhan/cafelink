<?php
    $list_service_tk = $action->getList('service', '', '', 'service_id', 'desc', '', '', '');
?>
<div class="gb-tinthoitrang_vyhofoco">
    <div class="container">
        <div class="gb-tinthoitrang-title_vyhofoco">
            <h4>DỊCH VỤ KHÁC CỦA CHÚNG TÔI</h4>
            <p>Hệ thống dịch vụ đa dạng về Marketing Online. Giúp khách hàng phát triển tổng thể Marketing</p>
        </div>
        <div class="gb-tinthoitrang-body_vyhofoco">
            <div class="row">
                <?php
                    foreach ($list_service_tk as $item) {
                        $rowLang = $action_service->getServiceLangDetail_byId($item['service_id'],$lang);
                        $row1 = $action_service->getServiceDetail_byId($item['service_id'],$lang);
                ?>
                <div class="col-md-6">
                    <div class="gb-tinthoitrang_vyhofoco-item">
                        <div class="gb-tinthoitrang_vyhofoco-img">
                            <a href="/<?= $rowLang['friendly_url'] ?>">
                                <img src="/images/<?= $row1['service_img']?>" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="gb-tinthoitrang_vyhofoco-text">
                            <h3><a href="/<?= $rowLang['friendly_url'] ?>"><?= $rowLang['lang_service_name'] ?></a></h3>
                            <div class="time_vyhofoco"> 
                            </div>
                            <div class="des_vyhofoco">
                                <?= $rowLang['lang_service_des'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>