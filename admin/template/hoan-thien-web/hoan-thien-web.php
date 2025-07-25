<?php
    if (isset($_GET['search']) && $_GET['search'] != '') {
        $rows = $action->getSearchAdmin('hoan_thien_web',array('name'), $_GET['search'],$trang,20,$_GET['page']);
        // $rows = $rows['data'];
    }else{
       $rows = $action->getList('hoan_thien_web','','','id','desc',$trang,20,'hoan-thien-web');//var_dump($rows);
        //$rows = $showCategoriesTable
    }
?>
    <div class="boxPageContent">
        <div>
            <h1><a href="index.php?page=them-hoan-thien-web" title="">Thêm</a></h1>
        </div>
        <div class="searchBox">
            <form action="">
                <input type="hidden" name="page" value="video">
                <button type="submit" class="btnSearchBox" >Tìm kiếm</button>
                <input type="text" class="txtSearchBox" name="search" />                                    
            </form>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Người tạo</th>
                    <!-- <th>Ngày cập nhật</th> -->
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php $action->showCategoriesTable($rows['data'], 'productcat_parent', 0, 'sua-hoan-thien-web', 'id', 'name', 'state', 0) ?>
            </tbody>
        </table>

        <div class="paging"><?= $rows['paging']?></div>
    </div>
    <p class="footerWeb">Cảm ơn quý khách hàng đã tin dùng dịch vụ của chúng tôi<br />Sản phẩm thuộc Công ty TNHH Truyền Thông Và Công Nghệ GoldBridge Việt Nam</p>