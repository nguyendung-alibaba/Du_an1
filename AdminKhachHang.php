<?php include './views/layout/header.php'; ?>

<!-- Navbar -->
<?php include './views/layout/nav.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/slidebar.php'; ?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý tài khoản khách hàng</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">STT</th>
                                        <th style="width: 20%;">Name</th>
                                        <th style="width: 15%;">Avatar</th>
                                        <th style="width: 20%;">Email</th>
                                        <th style="width: 15%;">Số điện thoại</th>
                                        <th style="width: 10%;">Trạng thái</th>
                                        <th style="width: 15%;">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listKhachHang as $key => $value) { ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= htmlspecialchars($value['ho_ten']) ?></td>
                                            <td>
                                                <img src="<?= BASE_URL . htmlspecialchars($value['anh_dai_dien']) ?>"
                                                    style="width: 100px; height: 100px; object-fit: cover;"
                                                    alt="Avatar"
                                                    onerror="this.onerror=null;this.src='https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png?20200919003010';">
                                            </td>
                                            <td><?= htmlspecialchars($value['email']) ?></td>
                                            <td><?= htmlspecialchars($value['so_dien_thoai']) ?></td>
                                            <td><?= $value['trang_thai'] == 1 ? 'Hoạt động' : 'Không hoạt động' ?></td>
                                            <td>
                                                <div class="btn-group">
                                                <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $value['id'] ?>">
                                                    <button type="button" class="btn btn-primary"><i class="fas fa-info-circle"></i></button>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $value['id'] ?>">
                                                    <button type="button" class="btn btn-info"><i class="fas fa-edit"></i></button>
                                                </a>
                                                <a href="<?= BASE_URL_ADMIN . '?act=reset-password&id_quan_tri=' . $value['id'] ?>"
                                                    onclick="return confirm('Bạn có muốn reset password không?')">
                                                    <button type="button" class="btn btn-danger"><i class="fas fa-spinner"></i></button>
                                                </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Name</th>
                                        <th>Avatar</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include './views/layout/footer.php'; ?>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "columnDefs": [{
                    "width": "15%",
                    "targets": 2
                } // Đảm bảo cột Avatar có độ rộng cố định
            ],
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
        })
    });
</script>
</body>

</html>