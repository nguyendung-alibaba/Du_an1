
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
            <h1>Quản lý tài khoản quản trị</h1>
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
                <h3 class="card-title">Thêm tài khoản quản trị</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= BASE_URL_ADMIN.'?act=them-quan-tri'?> " method="POST">
                <div class="card-body">
                <div class="form-group">
                    <label>Họ tên</label>
                    <input type="text" name="ho_ten" class="form-control" placeholder="Nhập Tên">
                    <?php if (isset($_SESSION['error']['ho_ten'])){ ?>
                        <span class="text-danger"><?=$_SESSION['error']['ho_ten']?></span>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Nhập Email">
                    <?php if (isset($_SESSION['error']['email'])){ ?>
                        <span class="text-danger"><?=$_SESSION['error']['email']?></span>
                    <?php } ?>
                </div>
                <button class="btn btn-primary">Them</button>
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
