<?php
    $service = new action_service();
    $list_service_new = $service->getListServiceNew_hasLimit(5);
?>
<div class="gb-sidebar-baivietmoinhat">
    <aside class="widget1">
        <h3 class="widget-title"> dịch vụ mới nhất</h3>
        <div class="widget-content">
            <ul>
                <?php
                    foreach ($list_service_new as $item) {
                ?>
                    <li>
                        <div class="item">
                            <div class="item-img">
                                <a href="/<?= $item['friendly_url']  ?>">
                                    <img src="/images/<?= $item['service_img'] ?>" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="item-text">
                                <h2><a href="/<?= $item['friendly_url']  ?>"><?= $item['service_name'] ?></a></h2>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </aside>
</div>