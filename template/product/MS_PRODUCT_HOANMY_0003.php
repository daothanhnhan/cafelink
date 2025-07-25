<?php                                                                        
    // if (isset($_GET['slug']) && $_GET['slug'] != '') {
    //     $slug = $_GET['slug'];

    //     $rowCatLang = $action_product->getProductCatLangDetail_byUrl($slug,$lang);
    //     $rowCat = $action_product->getProductCatDetail_byId($rowCatLang['productcat_id'],$lang);
    //     $rows = $action_product->getProductList_byMultiLevel_orderProductId($rowCat['productcat_id'],'desc',$trang,12,$slug);//var_dump($rows);
    // }else{
    //     $rows = $action->getList('product','','','product_id','desc',$trang,12,'san-pham');
    // }
    
    // $_SESSION['sidebar'] = 'productCat';
?>
<?php 
    $list_id = array();
    $limit = 12;

    function getListId ($parent) {
        global $conn_vn;
        global $list_id;
        array_push($list_id, $parent);
        $sql = "SELECT * FROM linh_vuc WHERE productcat_parent = $parent";
        $result = mysqli_query($conn_vn, $sql);
        $rows = array();
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // array_push($list_id, $row['productcat_id']);
                getListId($row['productcat_id']);
            }
        }
    }

    function getListId_link ($link) {
        global $conn_vn;
        global $list_id;
        // array_push($list_id, $parent);
        $sql = "SELECT * FROM linh_vuc WHERE friendly_url = '$link'";//echo $sql;
        $result = mysqli_query($conn_vn, $sql);
        $rows = array();
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // array_push($list_id, $row['productcat_id']);
                getListId($row['productcat_id']);
            }
        }
    }

    getListId_link($_GET['page']);

    $list_id = array_unique($list_id);
    // var_dump($list_id);

    function getProduct ($limit = 10, $trang = 1, $page = '') {
        global $conn_vn;
        global $list_id;
        $where = "1=0";
        foreach ($list_id as $item) {
            $where .= " OR linh_vuc_arr like '%$item%'";
        }
        $sql = "SELECT * FROM product";//echo $sql;
        $result = mysqli_query($conn_vn, $sql);
        $total_record = mysqli_num_rows($result);
        $config = array(

            'current_page'=> $trang != "" ? $trang : 1,

            'total_record'=> $total_record,

            'limit' => $limit,

            // 'link_full'=> $slug != '' ? $slug.'/{trang}' : 'index.php?page='.$page.$cond.'&trang={trang}',

            // 'link_first'=> $slug != '' ? $slug : 'index.php?page='.$page.$cond,

            'link_full'=> '/'.$page.'/{trang}',

            'link_first'=> '/'.$page,

            'range'=> 5

        );

        $paging = new Pagination();

        $paging->init($config);

        $start = $paging->_config['start'];

        $limit = $paging->_config['limit'];

        $sql = "SELECT * from product where $where order by hoan_thien_web_id asc limit $start, $limit";
        $sql = "SELECT * from product limit $start, $limit";
        $result = mysqli_query($conn_vn, $sql);
        $rows = array();
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
        }
        $p = $paging->htmlPaging();
        $return = array(
            'data' => $rows,
            'paging' => $p
        );
        return $return;
    }
    if ($_GET['page'] == 'san-pham') {
        $slug = $_GET['slug'];

        $rowCatLang = $action_product->getProductCatLangDetail_byUrl($slug,$lang);
        $rowCat = $action_product->getProductCatDetail_byId($rowCatLang['productcat_id'],$lang);
        $rows = $action_product->getProductList_byMultiLevel_orderProductId($rowCat['productcat_id'],'desc',$trang,12,$slug);//var_dump($rows);
    } else {
        $rows = getProduct($limit, $trang, $_GET['page']);
    }
    
?>
<div class="gb-product-thietkweb gb-page-product-thietkeweb">

    <div class="container">
        <div class="gb-product-thietkweb-title">
            <!-- <h2> Những dự án của chúng tôi </h3> -->
        </div>
        <div class="row">
            <?php 
            $d = 0;
            foreach ($rows['data'] as $item) {
                $d++;
                $row = $item;
                $rowLang = $action_product->getProductLangDetail_byId($row['product_id'],$lang);
            ?>
            <div class="col-sm-3">
                <div class="gb-product-thietkweb-item">
                    <div class="gb-product-thietkweb-item-img"  data-duration="1000">
                        <a href="<?= $item['product_code'] ?>" target="_blank"><img src="/images/<?= $item['product_img'] ?>" alt="<?= $item['product_name'] ?>" class="img-responsive"></a>
                    </div>
                    <div class="gb-product-thietkweb-item-text">
                        <h2><a href="<?= $item['product_code'] ?>" target="_blank"><?= $item['product_name'] ?></a></h2>
                    </div>
                </div>
            </div>
            <?php
                if ($d%4==0) {
                    echo '<hr style="width:100%;border:0;" />';
                }
            }
            ?>
        </div>
        <div style="text-align: center;"><?= $rows['paging'] ?></div>
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
