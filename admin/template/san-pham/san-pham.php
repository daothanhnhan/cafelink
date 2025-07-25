<?php
    if (isset($_GET['search']) && $_GET['search'] != '') {
        $rows = $action->getSearchAdmin('product',array('product_name','product_code'), $_GET['search'],$trang,20,$_GET['page']);
    }else{
        if (isset($_GET['linh_vuc_web_id'])) {
            $rows = $action->getList('product','linh_vuc_web_id',$_GET['linh_vuc_web_id'],'hoan_thien_web_id','asc',$trang,20,'san-pham');
        } elseif (isset($_GET['loai_web_id'])) {
            $rows = $action->getList('product','loai_web_id',$_GET['loai_web_id'],'hoan_thien_web_id','asc',$trang,20,'san-pham');
        } elseif (isset($_GET['hoan_thien_web_id'])) {
            $rows = $action->getList('product','hoan_thien_web_id',$_GET['hoan_thien_web_id'],'hoan_thien_web_id','asc',$trang,20,'san-pham');
        } elseif (isset($_GET['productcat_ar'])) {
            $rows = $action->getListProCat('product','productcat_ar',$_GET['productcat_ar'],'hoan_thien_web_id','asc',$trang,20,'san-pham');
        } else {
            $rows = $action->getList('product','','','hoan_thien_web_id','asc',$trang,20,'san-pham');
        }
        
    }
?>	
<div class="boxPageNews">
	<div class="searchBox">
        <form action="">
            <input type="hidden" name="page" value="san-pham">
            <button type="submit" class="btnSearchBox" name="">Tìm kiếm</button>
            <input type="text" class="txtSearchBox" name="search" />                                  
        </form>
    </div>
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>Tên</th>
                <th>link web</th>
                <th>Dạng web</th>
                <th>Lĩnh vực web</th>
                <th>Loại web</th>
                <th>Mức độ hoàn thiện</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($rows['data'] as $key => $row) {
                ?>
                    <tr>
                        <td><a href="index.php?page=sua-san-pham&id=<?= $row['product_id']; ?>" title=""><?= $row['product_name']; ?></a></td>
                        <td><?= $row['product_code'] ?></td>
                        <td>
                            <?php 
                                $action1 = new action_page('VN');
                                $arr_id = $row['productcat_ar'];
                                $arr_id = explode(',', $arr_id);
                                $productcat_id = (int)$arr_id[0];
                                echo $action1->getDetail('productcat','productcat_id',$productcat_id)['productcat_name'];
                            ?>
                        </td>
                        <td>
                            <?php 
                                $action1 = new action_page('VN');
                                $arr_id = $row['linh_vuc_arr'];
                                $arr_id = explode(',', $arr_id);
                                $linhvuc_id = (int)$arr_id[0];
                                echo $action1->getDetail('linh_vuc','productcat_id',$linhvuc_id)['productcat_name'];
                            ?>  
                        </td>
                        <td><?= $action->getDetail('loai_web', 'id', $row['loai_web_id'])['name'] ?></td>
                        <td><?= $action->getDetail('hoan_thien_web', 'id', $row['hoan_thien_web_id'])['name'] ?></td>
                    </tr>
                <?php
                }
            ?>
        </tbody>
    </table>
	
    <div class="paging">             
    	<?= $rows['paging'] ?>
	</div>
</div>
<?php  ?>
