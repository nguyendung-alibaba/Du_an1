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
          <div class="col-sm-6">
            <h1>Quản lý San Pham</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thêm Sản Phẩm</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= BASE_URL_ADMIN.'?act=them-san-pham'?> " method="POST" enctype="multipart/form-data">
                <div class="card-body row">
                  <div class="form-group col-12">
                    <label>Tên Sản Phẩm</label>
                    <input type="text" name="ten_san_pham" class="form-control" placeholder="Nhập Tên Sản Phẩm">
                    <?php if (isset($_SESSION['error']['ten_san_pham'])){ ?>
                        <span class="text-danger"><?=$_SESSION['error']['ten_san_pham']?></span>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Giá Sản Phẩm</label>
                    <input type="number" name="gia_san_pham" class="form-control" placeholder="Nhập Giá Sản Phẩm">
                    <?php if (isset($_SESSION['error']['gia_san_pham'])){ ?>
                        <span class="text-danger"><?=$_SESSION['error']['gia_san_pham']?></span>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Giá Khuyến Mãi</label>
                    <input type="number" name="gia_khuyen_mai" class="form-control" placeholder="Nhập Giá Khuyến Mãi Sản Phẩm">
                    <?php if (isset($_SESSION['error']['gia_khuyen_mai'])){ ?>
                        <span class="text-danger"><?=$_SESSION['error']['gia_khuyen_mai']?></span>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Hình Ảnh</label>
                    <input type="file" name="hinh_anh" class="form-control">
                    <?php if (isset($_SESSION['error']['hinh_anh'])){ ?>
                        <span class="text-danger"><?=$_SESSION['error']['hinh_anh']?></span>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Album Ảnh</label>
                    <input type="file" name="img_array[]" class="form-control" multiple>
                    
                  </div>
                  <div class="form-group col-6">
                    <label>Số Lượng</label>
                    <input type="number" name="so_luong" class="form-control" placeholder="Nhập So Luong Sản Phẩm">
                    <?php if (isset($_SESSION['error']['so_luong'])){ ?>
                        <span class="text-danger"><?=$_SESSION['error']['so_luong']?></span>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Ngày Nhập</label>
                    <input type="date" name="ngay_nhap" class="form-control" placeholder="Nhập Ngày Nhập Sản Phẩm">
                    <?php if (isset($_SESSION['error']['ngay_nhap'])){ ?>
                        <span class="text-danger"><?=$_SESSION['error']['ngay_nhap']?></span>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Danh Muc</label>
                    <select name="danh_muc_id" class="form-control" aria-label="Default control example">
                      <option selected disabled>Chọn danh mục sản phẩm</option>
                      <?php foreach ($listSanPham as $danhMuc): ?>
                        <option value="<?=$danhMuc['id']?>"><?=$danhMuc['ten_danh_muc']?></option>
                      <?php endforeach?>
                    </select>
                    <?php if (isset($_SESSION['error']['so_luong'])){ ?>
                        <span class="text-danger"><?=$_SESSION['error']['so_luong']?></span>
                    <?php } ?>
                  </div>
                  <div class="form-group col-6">
                    <label>Trang Thái</label>
                    <select name="trang_thai" class="form-control" aria-label="Default control example">
                      <option selected disabled>Chọn trạng thái sản phẩm</option>
                      <option value="1">Còn Hàng</option>
                      <option value="2">Hết Hàng</option>
                    </select>
                    <?php if (isset($_SESSION['error']['trang_thai'])){ ?>
                        <span class="text-danger"><?=$_SESSION['error']['trang_thai']?></span>
                    <?php } ?>
                  </div>
                  <div class="form-group col-12">
                        <label >Mo Ta</label>
                        <textarea class="form-control" rows="3" placeholder="Nhap Mo Ta ..." name="mo_ta"></textarea>
                  </div>
                </div> <!-- Đóng thẻ card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include './views/layout/footer.php' ?>
</body>
</html>
