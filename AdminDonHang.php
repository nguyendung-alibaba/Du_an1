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
            <h1>Quản lý danh sách đơn hàng</h1>
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
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Mã đơn hàng</th>
                      <th>Tên người nhận</th>
                      <th>Số điện thoại</th>
                      <th>Ngày đặt</th>
                      <th>Tổng tiền</th>
                      <th>Trạng thái</th>
                      <th>Thao Tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($listDonHang as $key => $DonHang) :?>
                      <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $DonHang['ma_don_hang'] ?></td>
                        <td><?= $DonHang['ten_nguoi_nhan'] ?></td>
                        <td><?= $DonHang['sdt_nguoi_nhan'] ?></td>
                        <td><?= $DonHang['ngay_dat'] ?></td>
                        <td><?= $DonHang['tong_tien'] ?></td>
                        <td><?= $DonHang['ten_trang_thai' ]?></td>
                        <td>
                        <div class="btn-group">
                          <a href="<?= BASE_URL_ADMIN.'?act=form-detail-don-hang&id_don_hang='.$DonHang['id'] ?>">
                            <button type="button" class="btn btn-info"><i class="fas fa-info-circle"></i></button>
                          </a>
                          <a href="<?= BASE_URL_ADMIN.'?act=form-edit-don-hang&id_don_hang='.$DonHang['id'] ?>">
                            <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                          </a>
                        </div>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>STT</th>
                      <th>Mã đơn hàng</th>
                      <th>Tên người nhận</th>
                      <th>Số điện thoại</th>
                      <th>Ngày đặt</th>
                      <th>Tổng tiền</th>
                      <th>Trạng thái</th>
                      <th>Thao Tác</th>
                    </tr>
                  </tfoot>
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
