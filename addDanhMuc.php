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
          <h1>Quản lý danh mục</h1>
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
              <h3 class="card-title">Them Danh Muc</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= BASE_URL_ADMIN . '?act=them-danh-muc' ?> " method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label>Ten Danh Muc</label>
                  <input type="text" name="ten_danh_muc" class="form-control" placeholder="Nhap Ten Danh Muc">
                  <?php if (isset($_SESSION['error']['ten_danh_muc'])) { ?>
                    <span class="text-danger"><?= $_SESSION['error']['ten_danh_muc'] ?></span>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label>Mo Ta</label>
                  <textarea class="form-control" rows="3" placeholder="Nhap Mo Ta ..." name="mo_ta"></textarea>
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