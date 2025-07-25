<?php 
    function uploadPicture($src, $img_name, $img_temp){

        $src = $src.$img_name;//echo $src;

        if (!@getimagesize($src)){

            if (move_uploaded_file($img_temp, $src)) {

                return true;

            }

        }

    }

    if (isset($_POST['del_video'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM loai_web WHERE id = $id";
        $result = mysqli_query($conn_vn, $sql);
        header('location: index.php?page=loai-web');
    }

    function editVideo ($id) {
        global $conn_vn;
        if (isset($_POST['edit_video'])) {
            $src= "../images/";
            $image = '';
            // var_dump($_POST);
            if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

                uploadPicture($src, $_FILES['image']['name'], $_FILES['image']['tmp_name']);
                $image = $_FILES['image']['name'];

            }
            // var_dump($_FILES);
            $name = $_POST['name'];
            $des = $_POST['des'];
            $content = $_POST['content'];
            $title = $_POST['title'];
            $meta_des = $_POST['meta_des'];
            $meta_key = $_POST['meta_key'];
            $url = $_POST['url'];

            if ($image == '') {
                $sql = "UPDATE loai_web SET name = '$name', des = ?, content = ?, title = '$title', meta_des = '$meta_des', meta_key = '$meta_key', url = '$url' WHERE id = $id";
            } else {
                $sql = "UPDATE loai_web SET name = '$name', des = ?, content = ?, title = '$title', meta_des = '$meta_des', meta_key = '$meta_key', url = '$url', image = '$image' WHERE id = $id";
            }
            // echo $sql;
            $stmt = $conn_vn->prepare($sql);
            $stmt->bind_param("ss", $des, $content);
            $stmt->execute();
            echo '<script>alert(\'Bạn đã sửa loại web thành công.\')</script>';
        }
    }
    editVideo($_GET['id']);

    function getVideo ($id) {
        global $conn_vn;
        $sql = "SELECT * FROM loai_web WHERE id = $id";
        $result = mysqli_query($conn_vn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    $video = getVideo($_GET['id']);
?>

<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <button class="btnAddTop" type="submit" name="edit_video" style="position: fixed;top: 0;right: 220px;z-index: 9">Lưu</button>
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Nội dung trang</span>
            <p class="subLeftNCP">Nhập tiêu đề và nội dung cho trang</p>      
            <p class="titleRightNCP">Chọn ảnh</p>
            <div id="wrapper">
                <input id="fileUpload" type="file" name="image"/>
                <br />
                <div id="image-holder">
                    <?php 
                        if ($video['image'] != '') {
                        ?>
                            <img src="../images/<?= $video['image']?>" class="img-responsive" alt="Image">
                            <!-- <input type="hidden" name="image" value="<?= $row['image']?>"> -->
                        <?php
                        }
                    ?>
                </div>
            </div> 
        </div>
        <div class="boxNodeContentPage">
            <p class="titleRightNCP">Tiêu đề</p>
            <input type="text" class="txtNCP1" id="title" onchange="ChangeToSlug()" name="name" value="<?= $video['name'] ?>" required />
            
            <p class="titleRightNCP">Mô tả</p>
            <p style="width:100%;margin-top:5px;"><textarea class="longtxtNCP1 ckeditor1" id="editor1" name="des"><?= $video['des'] ?></textarea></p>
            <p class="titleRightNCP">Chi tiết</p>
            <p style="width:100%;margin-top:5px;"><textarea class="longtxtNCP1 ckeditor1" id="editor2" name="content" ><?= $video['content'] ?></textarea></p>
            
        </div>
    </div><!--end rowNodeContentPage-->
    <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Tối ưu SEO</span>
            <p class="subLeftNCP">Thiết lập thẻ tiêu đề, thẻ mô tả, đường dẫn. Những thông tin này xác định cách danh mục xuất hiện trên công cụ tìm kiếm.</p>                
        </div>
        <div class="boxNodeContentPage">
            <div>
                <p class="titleRightNCP">Tiêu đề trang</p>
                <p class="subRightNCP"> <strong class="text-character">0</strong>/70 ký tự</p>
                <input type="text" class="txtNCP1" placeholder="Điều khoản dịch vụ" name="title" id="title_seo" value="<?= $video['title'] ?>" onkeyup="countChar(this)"/>
            </div>
            <div>
                <p class="titleRightNCP">Thẻ mô tả</p>
                <p class="subRightNCP"><strong class="text-character">0</strong>/160 ký tự</p>
                <textarea class="longtxtNCP2" name="meta_des" onkeyup="countChar(this)"><?= $video['meta_des'] ?></textarea>
            </div>
            <p class="titleRightNCP">Keyword</p>
            <input type="text" class="txtNCP1" value="<?= $video['meta_key'] ?>" name="meta_key"/>
            <p class="titleRightNCP">Đường dẫn</p>
            <div class="coverLinkNCP">
                <div id="slug">
                    <input type="text" id="slug1" class="txtLinkNCP" value="<?= $video['url'] ?>" name="url"/> 
                </div>    
            </div>
            <!-- <p class="titleRightNCP">Sort</p>
            <input type="text" class="txtNCP1"  name="productcat_sort_order" /> -->
        </div>
    </div><!--end rowNodeContentPage-->
    <!-- <div class="rowNodeContentPage">
        <div class="leftNCP">
            <span class="titLeftNCP">Trạng thái</span>
            <p class="subLeftNCP">Thiết lập chế độ hiển thị cho trang nội dung</p>                
        </div>
        <div class="boxNodeContentPage">
            <label class="selectCate">
                <input type="checkbox" value="1" name="state" checked>
                Hoạt động
            </label>
        </div>
    </div> --><!--end rowNodeContentPage-->
    <button type="submit" class="btn btnSave" name="edit_video">Lưu</button>
    <button type="submit" class="btn btnDelete" name="del_video">Xóa</button>

</form>


