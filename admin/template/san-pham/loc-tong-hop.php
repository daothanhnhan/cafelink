<?php 
	$list_id_dang = array();
	$list_id_linh = array();
	$limit = 20;

	function getListIdDang ($parent) {
		global $conn_vn;
		global $list_id_dang;
		array_push($list_id_dang, $parent);
		$sql = "SELECT * FROM productcat WHERE productcat_parent = $parent";
		$result = mysqli_query($conn_vn, $sql);
		$rows = array();
		$num = mysqli_num_rows($result);
		if ($num > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				// array_push($list_id, $row['productcat_id']);
				getListIdDang($row['productcat_id']);
			}
		}
	}

	if ($_GET['dang'] != 0) { 
		getListIdDang($_GET['dang']);
	}
	$list_id_dang = array_unique($list_id_dang);

	function getListIdLinh ($parent) {
		global $conn_vn;
		global $list_id_linh;
		array_push($list_id_linh, $parent);
		$sql = "SELECT * FROM linh_vuc WHERE productcat_parent = $parent";
		$result = mysqli_query($conn_vn, $sql);
		$rows = array();
		$num = mysqli_num_rows($result);
		if ($num > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				// array_push($list_id, $row['productcat_id']);
				getListIdLinh($row['productcat_id']);
			}
		}
	}

	if ($_GET['linh'] != 0) { 
		getListIdLinh($_GET['linh']);
	}
	
	$list_id_linh = array_unique($list_id_linh);

	function getProduct ($limit, $trang) {
		global $conn_vn;
		global $list_id_dang;
		global $list_id_linh;

		$dang = $_GET['dang'];
		$linh = $_GET['linh'];
		$loai = $_GET['loai'];
		$hoan = $_GET['hoan'];

		$where = "1=1";

		if ($dang != 0) {
			$where .= " AND (1=0 ";
			foreach ($list_id_dang as $item) {
				$where .= " OR productcat_ar like '%$item%'";
			}
			$where .= ")";
		}

		if ($linh != 0) {
			$where .= " AND (1=0 ";
			foreach ($list_id_linh as $item) {
				$where .= " OR linh_vuc_arr like '%$item%'";
			}
			$where .= ")";
		}

		if ($loai != 0) {
			$where .= " AND loai_web_id = $loai";
		}

		if ($hoan != 0) {
			$where .= " AND hoan_thien_web_id = $hoan";
		}
		
		$sql = "SELECT * FROM product WHERE $where";//echo $sql;
		$result = mysqli_query($conn_vn, $sql);
		$total_record = mysqli_num_rows($result);
		$config = array(

            'current_page'=> $trang != "" ? $trang : 1,

            'total_record'=> $total_record,

            'limit' => $limit,

            // 'link_full'=> $slug != '' ? $slug.'/{trang}' : 'index.php?page='.$page.$cond.'&trang={trang}',

            // 'link_first'=> $slug != '' ? $slug : 'index.php?page='.$page.$cond,

            'link_full'=> 'index.php?page=loc-tong-hop&dang='.$dang.'&linh='.$linh.'&loai='.$loai.'&hoan='.$hoan.'&trang={trang}',

            'link_first'=> 'index.php?page=loc-tong-hop&dang='.$dang.'&linh='.$linh.'&loai='.$loai.'&hoan='.$hoan,

            'range'=> 5

        );

        $paging = new Pagination();

        $paging->init($config);

        $start = $paging->_config['start'];

        $limit = $paging->_config['limit'];

        $sql = "SELECT * from product where $where order by hoan_thien_web_id asc limit $start, $limit";//echo $sql;
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
	$rows = getProduct($limit, $trang);
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