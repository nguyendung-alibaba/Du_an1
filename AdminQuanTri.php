
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
            <div class="card">
              <div class="card-header">
                <a href="<?= BASE_URL_ADMIN.'?act=form-them-quan-tri'?>">
                  <button type="button" class="btn btn-primary">Thêm tài khoản</button>
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">

                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($tai_khoans as $key => $value){ ?>
                    <tr>
                      <td><?= $key+1 ?></td>
                      <td><?= $value['ho_ten'] ?></td>
                      <td><?= $value['email'] ?></td>
                      <td><?= $value['so_dien_thoai'] ?></td>
                      <td><?= $value['trang_thai'] == 1 ? 'Hoạt động' : 'Không hoạt động' ?></td>
                      <td>
                        <a href="<?= BASE_URL_ADMIN.'?act=form-sua-quan-tri&id_quan_tri='.$value['id'] ?>">
                          <button type="button" class="btn btn-info">Edit</button>
                        </a>
                        <a href="<?= BASE_URL_ADMIN.'?act=reset-password&id_quan_tri='.$value['id'] ?>" onclick="return confirm('Ban co muon reset password khong?')">
                          <button type="button" class="btn btn-danger">Reset</button>
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
