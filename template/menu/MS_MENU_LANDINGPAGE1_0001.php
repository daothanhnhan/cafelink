<!-- <div class="menu-mobile-nav">
    <span class="icon-bar"><i class="fa fa-bars" aria-hidden="true"></i></span>
</div> -->

<div class="gb-bottom-header sticky-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-3 border-line">
                <div class="gb-bottom-header-hotline">
                    <a href="/"><img src="/images/<?= $rowConfig['web_logo'] ?>" alt="" class="img-responsive" style="width: 65%;"></a>
                    <!-- <i class="fa fa-phone" aria-hidden="true"></i> Hotline: <span><?= $rowConfig['content_home5'] ?></span> -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="gb-bottom-header-text gb-main-menu">
                    <div class="main-navigation uni-menu-text">
                        <div class="cssmenu">
                            <?php
                                $list_menu = $menu->getListMainMenu_byOrderASC();
                                $menu->showMenu_byMultiLevel_mainMenuLDP($list_menu,0,$lang,0);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        //-----------------Sticky memu-----------------
        $(".sticky-menu").sticky({topSpacing:0});

        //-----------------scroll-------------------------------------
        var headerHeight = $('.gb-bottom-header').outerHeight();

        $('.slide-section').click(function (e) {
            var linkHref = $(this).attr('href');
            $('html, body').animate({
                scrollTop: $(linkHref).offset().top - headerHeight
            }, 1000);
        });

        $('.menu-mobile-nav').click(function () {
            $('.gb-bottom-header').slideToggle();
        });
    });
</script>