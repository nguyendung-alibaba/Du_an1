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
          <div class="col-sm-9">
            <h1>Quản lý danh sách đơn hàng : Đơn hàng:<?= $DonHang['ma_don_hang'] ?></h1>
          </div>
          <div class="col-sm-3">
            <form action="" method="post">
                <select name="" id="" class="form-control">
                    <option value="" disabled></option>
                    <?php foreach($listTrangThaiDonHang as $key => $trangThai): ?>
                    <option
                    <?=$trangThai['id'] == $DonHang['trang_thai_id'] ? 'selected' : '' ?>
                    <?=$trangThai['id'] < $DonHang['trang_thai_id'] ? 'disabled' : '' ?>
                    value="<?= $trangThai['id'] ?>">
                    <?= $trangThai['ten_trang_thai'] ?></option>
                    
                    <?php endforeach; ?>
                </select>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php
                if($DonHang['trang_thai_id']=1){
                    $colorAlerts = 'primary';
                }else if($DonHang['trang_thai_id'] >=2 && $DonHang['trang_thai_id'] <=9){
                    $colorAlerts = 'warning';
                }else if($DonHang['trang_thai_id'] ==10){
                    $colorAlerts = 'success';
                }else {
                    $colorAlerts = 'danger';
                }
            ?>
                <div class="alert alert-<?=$colorAlerts?>" role="alert">
                    <p>Đơn hàng: <b><?= $DonHang['ten_trang_thai'] ?></b></p>
                </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-cat"></i> Shop thú cưng dung-nt
                    <small class="float-right">Ngày đặt: <?= formatDate($DonHang['ngay_dat']) ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong><?= $DonHang['ho_ten'] ?></strong><br>
                    Email: <?= $DonHang['email'] ?><br>
                    Số điện thoại: <?= $DonHang['so_dien_thoai'] ?><br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Người nhận
                  <address>
                  <strong><?= $DonHang['ten_nguoi_nhan'] ?></strong><br>
                    Email: <?= $DonHang['email_nguoi_nhan'] ?><br>
                    Số điện thoại: <?= $DonHang['sdt_nguoi_nhan'] ?><br>
                    Address: <?= $DonHang['dia_chi_nguoi_nhan'] ?><br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Thông tin
                  <address>
                  <strong>Mã đơn hàng:<?= $DonHang['ma_don_hang'] ?></strong><br>
                    Tổng Tiền: <?= $DonHang['tong_tien'] ?><br>
                    Ghi chú: <?= $DonHang['ghi_chu'] ?><br>
                    Thanh toán: <?= $DonHang['ten_phuong_thuc'] ?><br>
                  </address>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Tên sản phẩm</th>
                      <th>Đơn giá</th>
                      <th>Số lượng</th>
                      <th>Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $tong_tien=0; ?>
                    <?php foreach($sanPhamDonHang as $key => $sanPham) : ?>
                    <tr>
                      <td><?= $key+1 ?></td>
                      <td><?= $sanPham['ten_san_pham'] ?></td>
                      <td><?= $sanPham['don_gia'] ?></td>
                      <td><?= $sanPham['so_luong'] ?></td>
                      <td><?= $sanPham['thanh_tien'] ?></td>
                    </tr>
                    <?php $tong_tien += $sanPham['thanh_tien']; ?>
                    <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Ngày đặt hàng: <?= $DonHang['ngay_dat'] ?></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Thành tiền:</th>
                        <td>
                            <?= $tong_tien ?>
                        </td>
                      </tr>
                      <tr>
                        <th>Vận chuyển:</th>
                        <td>200.000</td>
                      </tr>
                      <tr>
                        <th>Tổng tiền:</th>
                        <td><?= $tong_tien + 200000 ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
                
              <!-- this row will not appear when printing -->
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
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
