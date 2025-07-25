<?php 
    $home_product = $action->getList('product', '', '', 'product_id', 'desc', '', 12, '');
?>
<div class="gb-product-thietkweb">
    <div class="container">
        <div class="gb-product-thietkweb-title">
            <h2>KHO GIAO DIỆN WEBSITE</h2>
        </div>
        <div class="row">
            <?php foreach ($home_product as $item) { ?>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <div class="gb-product-thietkweb-item">
                    <div class="gb-product-thietkweb-item-img"  data-duration="1000">
                        <a href="<?= $item['product_code'] ?>" target="_blank" ><img src="/images/<?= $item['product_img'] ?>" alt="<?= $item['product_name'] ?>" class="img-responsive"></a>
                    </div>
                    <div class="gb-product-thietkweb-item-text">
                        <h2><a href="<?= $item['product_code'] ?>" target="_blank" class="txtLinkNamePW"><?= $item['product_name'] ?></a></h2>
                        <a href="<?= $item['product_code'] ?>" class="buttonLinkNamePW">XEM DEMO</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="xemtatca">
            <a href="/san-pham">Xem tất cả</a>
        </div>
    </div>
</div>

<!-- <script src="/plugin/imagescroll/jquery-image-scroll.js"></script> -->
<script type="text/javascript">
(function( $ ){
    $.fn.scrollImage = function(){

        var imageScrollGetHeight = function( $this ){
          var imageh = $this.find( 'img' ).height(),
              screenh = $this.height();
          return parseInt( screenh - imageh );
        };

        var onHover = function(){

            // Don't scroll the image if image's height is smaller that screen's height
            if( imageScrollGetHeight( $( this ) ) > 0 )
                return;

            $ele = $( this ).find( 'img' );
            $ele.stop();

            var duration = $( this ).attr( 'data-duration' );

            if( ! duration ){
                duration = 5000;
            }

            $ele.animate({
                bottom: 0
            },parseInt( duration ) );
        };

        var onRelease = function(){

            $ele.stop();
            $ele.animate({
                bottom: imageScrollGetHeight( $( this ) )
            },500);
        };

        var setImagePosition = function( $this ){
            $this.find( 'img' ).css({
                bottom: imageScrollGetHeight( $this )
             });
        }

        this.hover( onHover, onRelease );

        var that = this;

        $( window ).resize( function(){

            that.each( function(){
                setImagePosition( $( this ) );
            });
        });

        return this.each(function() {
            setImagePosition( $( this ) );
           
        });
    };
})( jQuery );

    $( window ).on( 'load', function(){
        $( '.gb-product-thietkweb-item-img' ).scrollImage();
    })
</script>
