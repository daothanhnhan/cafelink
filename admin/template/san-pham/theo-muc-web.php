<?php 
$rows_dang_web = $action->getList('productcat','','','productcat_id','desc','','','');
$rows_linhvuc_web = $action->getList('linh_vuc','','','productcat_id','desc','','','');
$rows_linh_vuc = $action->getList('linh_vuc_web','','','id','desc','','','');
$rows_loai = $action->getList('loai_web','','','id','desc','','','');
$rows_hoan_thien = $action->getList('hoan_thien_web','','','id','desc','','','');

function listProCat ($parent_id, $count) {
  global $conn_vn;
  $sql = "SELECT * FROM productcat WHERE productcat_parent = $parent_id";
  $result = mysqli_query($conn_vn, $sql);
  $rows = array();
  $num = mysqli_num_rows($result);
  $str = str_repeat("----", $count);
  if ($num > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      // echo $row['productcat_name'];echo '<br>';
      echo '<tr>
        <td><a href="index.php?page=list-dang-web&id='.$row['productcat_id'].'">'.$str.$row['productcat_name'].'</a></td>
      </tr>';
      listProCat($row['productcat_id'], $count + 1);
    }
  }
}

function listLinhVuc ($parent_id, $count) {
  global $conn_vn;
  $sql = "SELECT * FROM linh_vuc WHERE productcat_parent = $parent_id";
  $result = mysqli_query($conn_vn, $sql);
  $rows = array();
  $num = mysqli_num_rows($result);
  $str = str_repeat("----", $count);
  if ($num > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      // echo $row['productcat_name'];echo '<br>';
      echo '<tr>
        <td><a href="index.php?page=list-linh-vuc-web&id='.$row['productcat_id'].'">'.$str.$row['productcat_name'].'</a></td>
      </tr>';
      listLinhVuc($row['productcat_id'], $count + 1);
    }
  }
}

?>
<div class="container">
  <form action="index.php" method="get">
    <input type="hidden" name="page" value="loc-tong-hop">
  <div class="row">
    <div class="col-sm-2">
      <div class="form-group">
        <label for="sel1">Dạng web:</label>
        <select class="form-control" id="sel1" name="dang">
          <option value="0">Chọn</option>
          <?php foreach ($rows_dang_web as $item) { ?>
          <option value="<?= $item['productcat_id'] ?>"><?= $item['productcat_name'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form-group">
        <label for="sel1">Lĩnh vực web:</label>
        <select class="form-control" id="sel1" name="linh">
          <option value="0">Chọn</option>
          <?php foreach ($rows_linhvuc_web as $item) { ?>
          <option value="<?= $item['productcat_id'] ?>"><?= $item['productcat_name'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form-group">
        <label for="sel1">Loại web:</label>
        <select class="form-control" id="sel1" name="loai">
          <option value="0">Chọn</option>
          <?php foreach ($rows_loai as $item) { ?>
          <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="form-group">
        <label for="sel1">Độ hoàn thiện:</label>
        <select class="form-control" id="sel1" name="hoan">
          <option value="0">Chọn</option>
          <?php foreach ($rows_hoan_thien as $item) { ?>
          <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="col-sm-4">
      <button type="submit" class="btn btn-default">Lọc</button>
    </div>
  </div>
  </form>
</div>
<div class="container">
  <h2>Danh sách dạng web.</h2>            
  <table class="table">
    <thead>
      <tr>
      	<th>Name</th>
      </tr>
    </thead>
    <tbody>
    <!-- <?php foreach ($rows_dang_web as $item) { ?>
      <tr>
        <td><a href="index.php?page=san-pham&productcat_ar=<?= $item['productcat_id'] ?>"><?php echo $item['productcat_name'];?></a></td>
      </tr>
      <?php } ?> -->
      <?php listProCat(0, 0);  ?>
    </tbody>
  </table>
</div>

<div class="container">
  <h2>Danh sách lĩnh vực web.</h2>            
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
    <!-- <?php foreach ($rows_linh_vuc as $item) { ?>
      <tr>
        <td><a href="index.php?page=san-pham&linh_vuc_web_id=<?= $item['id'] ?>"><?php echo $item['name'];?></a></td>
      </tr>
      <?php } ?> -->
      <?php listLinhVuc(0, 0);  ?>
    </tbody>
  </table>
</div>

<div class="container">
  <h2>Danh sách loại web.</h2>            
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($rows_loai as $item) { ?>
      <tr>
        <td><a href="index.php?page=san-pham&loai_web_id=<?= $item['id'] ?>"><?php echo $item['name'];?></a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<div class="container">
  <h2>Danh sách mức độ hoàn thiện web.</h2>            
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($rows_hoan_thien as $item) { ?>
      <tr>
        <td><a href="index.php?page=san-pham&hoan_thien_web_id=<?= $item['id'] ?>"><?php echo $item['name'];?></a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>