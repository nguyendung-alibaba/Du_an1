
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
                <a href="<?= BASE_URL_ADMIN.'?act=form-them-danh-muc'?>">
                  <button type="button" class="btn btn-primary">Them Danh Muc</button>
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">

                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Mo Ta</th>
                    <th>Thao Tac</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($listProduct as $key => $value){ ?>
                    <tr>
                      <td><?= $key+1 ?></td>
                      <td><?= $value['ten_danh_muc'] ?></td>
                      <td><?= $value['mo_ta'] ?></td>
                      <td>
                        <a href="<?= BASE_URL_ADMIN.'?act=form-edit-danh-muc&id_danh_muc='.$value['id'] ?>">
                          <button type="button" class="btn btn-info">Edit</button>
                        </a>
                        <a href="<?= BASE_URL_ADMIN.'?act=form-Delete-danh-muc&id_danh_muc='.$value['id'] ?>" onclick="return confirm('Ban co muon xoa khong?')">
                          <button type="button" class="btn btn-danger">Delete</button>
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Mo Ta</th>
                    <th>Thao Tac</th>
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
