<?php 
$rows = $action->getList('newsletter','','','id','desc',$trang,20,'newsletter');//var_dump($rows_lien_he);die();
?>
<div class="container">
  <h2>Bảng đăng ký nhận tin.</h2>            
  <table class="table">
    <thead>
      <tr>
        <th>Email</th>
        <th>Phone</th>
        <th>Note</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($rows['data'] as $item) { ?>
      <tr>
        <td><?php echo $item['email'];?></td>
        <td><?php echo $item['phone'];?></td>
        <td><?php echo $item['note'];?></td>
        <td style="float: none;"><a href="index.php?page=xoa-newsletter&id=<?= $item['id'] ?>" style="float: none;" onclick="return confirm('Bạn có chắc muốn xóa.')">Xóa</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
<?php
    echo $rows['paging'];
?>  
</div>
