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
            <h1>Quản lý Sản Phẩm</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="<?= BASE_URL_ADMIN.'?act=form-them-san-pham'?>">
                  <button type="button" class="btn btn-primary">Thêm Sản Phẩm</button>
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên Sản Phẩm</th>
                      <th>Image</th>
                      <th>Gia Tien</th>
                      <th>So Luong</th>
                      <th>Danh Muc</th>
                      <th>Trang Thai</th>
                      <th>Thao Tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($listSanPham as $key => $SanPham){ ?>
                      <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $SanPham['ten_san_pham'] ?></td>
                        <td>
                          <img src="<?= BASE_URL . $SanPham['hinh_anh'] ?>" style="width: 100px" alt=""
                            onerror="this.onerror=null;this.src='https://www.guihangdinuocngoai.com.vn/wp-content/uploads/2016/12/Dich-Vu-Gui-Thu-Cung-DI-Nuoc-Ngoai-Sieu-Toc-Gia-Re-Tai-Tien-Viet-Express.jpg'"
                          > 
                        </td>
                        <td><?= $SanPham['gia_san_pham'] ?></td>
                        <td><?= $SanPham['so_luong'] ?></td>
                        <td><?= $SanPham['ten_danh_muc'] ?></td>
                        <td><?= $SanPham['trang_thai' ] == 1 ? 'Còn Hàng' : 'Hết Hàng' ?></td>
                        <td>
                        <div class="btn-group">
                          <a href="<?= BASE_URL_ADMIN.'?act=form-edit-san-pham&id_san_pham='.$SanPham['id'] ?>">
                            <button type="button" class="btn btn-info"><i class="fas fa-edit"></i></button>
                          </a>
                          <a href="<?= BASE_URL_ADMIN.'?act=form-detail-san-pham&id_san_pham='.$SanPham['id'] ?>">
                            <button type="button" class="btn btn-primary"><i class="fas fa-info-circle"></i></button>
                          </a>
                          <a href="<?= BASE_URL_ADMIN.'?act=form-delete-san-pham&id_san_pham='.$SanPham['id'] ?>" onclick="return confirm('Bạn có muốn xóa không?')">
                            <button type="button" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                          </a>
                        </div>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
