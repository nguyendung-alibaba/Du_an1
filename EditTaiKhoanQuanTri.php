<?php include './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/nav.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/slidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý tài khoản quản trị</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Sửa tài khoản quản trị: <?= $quanTri['ho_ten']; ?></h3>
            </div>
            <form action="<?= BASE_URL_ADMIN . '?act=sua-quan-tri'; ?>" method="POST">
              <input type="hidden" name="quan_tri_id" value="<?= $quanTri['id']; ?>">
              <div class="card-body">
                <div class="form-group">
                  <label>Họ tên</label>
                  <input type="text" value="<?= $quanTri['ho_ten']; ?>" name="ho_ten" class="form-control" placeholder="Nhập Tên">
                  <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                    <span class="text-danger"><?= $_SESSION['error']['ho_ten']; ?></span>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" value="<?= $quanTri['email']; ?>" name="email" class="form-control" placeholder="Nhập Email">
                  <?php if (isset($_SESSION['error']['email'])) { ?>
                    <span class="text-danger"><?= $_SESSION['error']['email']; ?></span>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label>Số điện thoại</label>
                  <input type="text" value="<?= $quanTri['so_dien_thoai']; ?>" name="so_dien_thoai" class="form-control" placeholder="Nhập Số điện thoại">
                  <?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
                    <span class="text-danger"><?= $_SESSION['error']['so_dien_thoai']; ?></span>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label for="inputStatus">Trạng thái tài khoản</label>
                  <select name="trang_thai" id="inputStatus" class="form-control custom-select">
                    <option value="1" <?= $quanTri['trang_thai'] == 1 ? 'selected' : ''; ?>>Active</option>
                    <option value="2" <?= $quanTri['trang_thai'] !== 1 ? 'selected' : ''; ?>>Inactive</option>
                  </select>
                  <?php if (isset($_SESSION['error']['trang_thai_id'])) { ?>
                    <span class="text-danger"><?= $_SESSION['error']['trang_thai_id']; ?></span>
                  <?php } ?>
                </div>
                <button class="btn btn-primary">Cập nhật</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include './views/layout/footer.php'; ?>
</body>
</html>
