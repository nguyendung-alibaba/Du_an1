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
                    <h1>Quản lý thông tin đơn hàng </h1>
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
                            <h3 class="card-title">Sửa đơn hàng : <?= $DonHang['ma_don_hang'] ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=edit-don-hang' ?>" method="POST">
                            <input type="text" value="<?= $DonHang['id'] ?>" name="don_hang_id" hidden>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên người nhận</label>
                                    <input type="text" name="ten_nguoi_nhan" class="form-control" value="<?= $DonHang['ten_nguoi_nhan'] ?>" placeholder="Nhập tên người nhận">
                                    <?php if (isset($_SESSION['error']['ten_nguoi_nhan'])) { ?>
                                        <span class="text-danger"><?= $_SESSION['error']['ten_nguoi_nhan'] ?></span>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" name="sdt_nguoi_nhan" class="form-control" value="<?= $DonHang['sdt_nguoi_nhan'] ?>" placeholder="Nhập số điện thoại người nhận">
                                    <?php if (isset($_SESSION['error']['sdt_nguoi_nhan'])) { ?>
                                        <span class="text-danger"><?= $_SESSION['error'] ['sdt_nguoi_nhan'] ?></span>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email_nguoi_nhan" class="form-control" value="<?= $DonHang['email_nguoi_nhan'] ?>" placeholder="Nhập email người nhận">
                                    <?php if (isset($_SESSION['error'] ['email_nguoi_nhan'])) { ?>
                                        <span class="text-danger"><?= $_SESSION['error'] ['email_nguoi_nhan'] ?></span>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" name="dia_chi_nguoi_nhan" class="form-control" value="<?= $DonHang['dia_chi_nguoi_nhan'] ?>" placeholder="Nhập địa chỉ người nhận">
                                    <?php if (isset($_SESSION['error'] ['dia_chi_nguoi_nhan'])) { ?>
                                        <span class="text-danger"><?= $_SESSION['error'] ['dia_chi_nguoi_nhan'] ?></span>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <textarea class="form-control" rows="3" placeholder="Nhập ghi chú ..." name="ghi_chu"><?= $DonHang['ghi_chu'] ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Trạng thái đơn hàng</label>
                                    <select name="trang_thai_id" id="inputStatus" class="form-control custom-select">
                                        <?php foreach ($listTrangThaiDonHang as $trangThai): ?>
                                            <option
                                                <?php if ($DonHang['trang_thai_id'] > $trangThai['id'] || in_array($DonHang['trang_thai_id'], [7, 8, 9])) {
                                                    echo 'disabled';
                                                } ?>
                                                <?= $trangThai['id'] == $DonHang['trang_thai_id'] ? 'selected' : '' ?>
                                                value="<?= $trangThai['id']; ?>">
                                                <?= htmlspecialchars($trangThai['ten_trang_thai'], ENT_QUOTES, 'UTF-8'); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($_SESSION['error'] ['trang_thai_id'])) { ?>
                                        <span class="text-danger"><?= $_SESSION['error'] ['trang_thai_id'] ?></span>
                                    <?php } ?>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
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
