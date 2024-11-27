<?php include './views/layout/header.php' ?>

<!-- Navbar -->
<?php include './views/layout/nav.php' ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/slidebar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-11">
          <h1>Sửa thông tin sản phẩm: <?= $SanPham['ten_san_pham'] ?></h1>
        </div>
        <div class="col-sm-1">
          <a href="<?= BASE_URL_ADMIN . '?act=product' ?>">Cancel</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Thông tin sản phẩm</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="<?= BASE_URL_ADMIN . '?act=edit-san-pham&id=' . $SanPham['id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <input type="hidden" name="san_pham_id" value="<?= $SanPham['id'] ?>">
                <label for="ten_san_pham">Tên sản phẩm</label>
                <input type="text" name="ten_san_pham" id="ten_san_pham" class="form-control" value="<?= $SanPham['ten_san_pham'] ?>">
                <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                  <span class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></span>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="gia_san_pham">Giá sản phẩm</label>
                <input type="number" name="gia_san_pham" id="gia_san_pham" class="form-control" value="<?= $SanPham['gia_san_pham'] ?>">
                <?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>
                  <span class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></span>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="gia_khuyen_mai">Giá khuyến mãi sản phẩm</label>
                <input type="number" name="gia_khuyen_mai" id="gia_khuyen_mai" class="form-control" value="<?= $SanPham['gia_khuyen_mai'] ?>">
                <?php if (isset($_SESSION['error']['gia_khuyen_mai'])) { ?>
                  <span class="text-danger"><?= $_SESSION['error']['gia_khuyen_mai'] ?></span>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="hinh_anh">Hình ảnh sản phẩm</label>
                <input type="file" name="hinh_anh" id="hinh_anh" class="form-control" onchange="previewImage(event)">
                <input type="hidden" name="hinh_anh_cu" value="<?= $SanPham['hinh_anh'] ?>">
              </div>

              <div class="form-group">
                <img id="preview" src="./uploads/<?= $SanPham['hinh_anh'] ?>" alt="Ảnh xem trước" style="width: 100%; max-height: 200px; object-fit: contain; margin-top: 10px;">
              </div>

              <div class="form-group">
                <label for="so_luong">Số Lượng sản phẩm</label>
                <input type="number" name="so_luong" id="so_luong" class="form-control" value="<?= $SanPham['so_luong'] ?>">
                <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                  <span class="text-danger"><?= $_SESSION['error']['so_luong'] ?></span>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="ngay_nhap">Ngày Nhập</label>
                <input type="date" name="ngay_nhap" id="ngay_nhap" class="form-control" value="<?= $SanPham['ngay_nhap'] ?>">
                <?php if (isset($_SESSION['error']['ngay_nhap'])) { ?>
                  <span class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></span>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="inputStatus">Danh mục sản phẩm</label>
                <select name="danh_muc_id" id="inputStatus" class="form-control custom-select">
                  <?php foreach ($listDanhMuc as $danhMuc): ?>
                    <option <?= $danhMuc['id'] == $SanPham['trang_thai'] ? 'selected' : '' ?> value="<?= $danhMuc['id']; ?>">
                      <?= $danhMuc['ten_danh_muc'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                  <span class="text-danger"><?= $_SESSION['error']['so_luong'] ?></span>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="mo_ta">Mô tả sản phẩm</label>
                <textarea name="mo_ta" id="mo_ta" class="form-control"><?= $SanPham['mo_ta'] ?></textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Trạng thái sản phẩm</label>
                <select name="trang_thai" id="inputStatus" class="form-control custom-select">
                  <option <?= $SanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn Hàng</option>
                  <option <?= $SanPham['trang_thai'] == 0 ? 'selected' : '' ?> value="2">Hết Hàng</option>
                </select>
                <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                  <span class="text-danger"><?= $_SESSION['error']['so_luong'] ?></span>
                <?php } ?>
              </div>
            </div>
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-primary">Save Du Lieu</button>
            </div>
          </form>

          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-6">
        <!-- Phần khác mà bạn muốn thêm vào -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Album ảnh sản phẩm</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <!-- <h4 class="card-title text-center">Add and remove row in table using jquery</h4> -->
            <!-- <hr> -->
            <form action="<?= BASE_URL_ADMIN . '?act=edit-album-san-pham&id=' . $SanPham['id'] ?>" method="POST" enctype="multipart/form-data">
              <div class="table-responsive">
                <table id="faqs" class="table table-hover">
                  <thead>
                    <tr>
                      <th>Ảnh</th>
                      <th>File</th>
                      <th>
                        <div class="text-center"><button type="button" onclick="addfaqs();" class="badge badge-success"><i class="fa fa-plus"></i> Thêm</button></div>
                      </th>
                      <!-- <th>Status</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <input type="hidden" name="san_pham_id" value="<?= $SanPham['id'] ?>">
                    <input type="hidden" name="img_delete" id="img_delete">
                    <?php foreach ($listAnhSanPham as $key => $value): ?>
                      <tr id="faqs-row<?= $key ?>">
                        <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">
                        <td><img src="<?= BASE_URL . $value['link_hinh_anh'] ?>" style="width: 50px; height: 50px;" alt=""></td>
                        <td><input type="file" name="img_array[]" placeholder="Product name" class="form-control"></td>
                        <!-- <td class="text-warning mt-10"> 18.76% <i class="fa fa-arrow-up"></i></td> -->
                        <td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(<?= $key ?>, <?= $value['id'] ?>)"><i class="fa fa-trash"></i> Delete</button></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              </form>
          </div>
        </div>
        <!-- /.card-body -->
        <!--  -->
      </div>
    </div>
  </div>

<!-- Row with buttons -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include './views/layout/footer.php' ?>

<script>
  function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById('preview');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // Your custom script here
</script>
<script>
  var faqs_row = <?= count($listAnhSanPham); ?>;

  function addfaqs() {
    html = '<tr id="faqs-row' + faqs_row + '">';
    html += '<td><img src="https://www.guihangdinuocngoai.com.vn/wp-content/uploads/2016/12/Dich-Vu-Gui-Thu-Cung-DI-Nuoc-Ngoai-Sieu-Toc-Gia-Re-Tai-Tien-Viet-Express.jpg" style="width: 50px; height: 50px;" alt=""></td>';
    html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
    html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(' + faqs_row + ', null);"><i class="fa fa-trash"></i> Delete</button></td>';

    html += '</tr>';

    $('#faqs tbody').append(html);

    faqs_row++;
  }

  function removeRow(rowId, imgId) {
    $('#faqs-row' + rowId).remove();
    if (imgId !== null) {
      var imgDeleteInput = document.getElementById('img_delete');
      imgDeleteInput.value += (imgDeleteInput.value ? ',' : '') + imgId;
    }
  }
</script>
</body>

</html>