<?php include './views/layout/header.php'; ?>
<?php include './views/layout/nav.php'; ?>
<?php include './views/layout/slidebar.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý tài khoản khách hàng</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Thông tin khách hàng -->
            <div class="row">
                <div class="col-4">
                    <img src="<?= BASE_URL . htmlspecialchars($khachHang['anh_dai_dien'] ?? '') ?>"
                        style="width: 100%; height: 85%; object-fit: cover;"
                        alt="Avatar"
                        onerror="this.onerror=null;this.src='https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png';">
                </div>
                <div class="col-sm-8">
                    <table class="table table-borderless">
                        <tbody style="font-size: x-large">
                            <tr>
                                <th>Tên:</th>
                                <td><?= htmlspecialchars($khachHang['ho_ten'] ?? 'Không xác định') ?></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td><?= htmlspecialchars($khachHang['email'] ?? 'Không xác định') ?></td>
                            </tr>
                            <tr>
                                <th>Số điện thoại:</th>
                                <td><?= htmlspecialchars($khachHang['so_dien_thoai'] ?? 'Không xác định') ?></td>
                            </tr>
                            <tr>
                                <th>Giới tính:</th>
                                <td><?= isset($khachHang['gioi_tinh']) && $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                            </tr>
                            <tr>
                                <th>Địa chỉ:</th>
                                <td><?= htmlspecialchars($khachHang['dia_chi'] ?? 'Không xác định') ?></td>
                            </tr>
                            <tr>
                                <th>Trạng thái:</th>
                                <td><?= isset($khachHang['trang_thai']) && $khachHang['trang_thai'] == 1 ? 'Hoạt động' : 'Không hoạt động' ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Thông tin mua hàng -->
            <h2 class="mt-4">Lịch sử mua hàng</h2>
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
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($listDonHang)) : ?>
                        <?php foreach ($listDonHang as $key => $DonHang) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= htmlspecialchars($DonHang['ma_don_hang'] ?? '') ?></td>
                                <td><?= htmlspecialchars($DonHang['ten_nguoi_nhan'] ?? '') ?></td>
                                <td><?= htmlspecialchars($DonHang['sdt_nguoi_nhan'] ?? '') ?></td>
                                <td><?= htmlspecialchars($DonHang['ngay_dat'] ?? '') ?></td>
                                <td><?= number_format($DonHang['tong_tien'] ?? 0, 0, ',', '.') ?> đ</td>
                                <td><?= htmlspecialchars($DonHang['ten_trang_thai'] ?? '') ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= BASE_URL_ADMIN . '?act=form-detail-don-hang&id_don_hang=' . htmlspecialchars($DonHang['id'] ?? '') ?>" class="btn btn-info">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a href="<?= BASE_URL_ADMIN . '?act=form-edit-don-hang&id_don_hang=' . htmlspecialchars($DonHang['id'] ?? '') ?>" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="8" class="text-center">Không có đơn hàng nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- Lịch sử bình luận -->
            <h2 class="mt-4">Lịch sử bình luận</h2>
            <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Nội dung</th>
                        <th>Ngày bình luận</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($listBinhLuan)) : ?>
                        <?php foreach ($listBinhLuan as $key => $binh_luan) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><a target="_blank" href="<?= BASE_URL_ADMIN . '?act=form-detail-san-pham&id_san_pham=' . $binh_luan['san_pham_id']; ?>">
                                        <?= htmlspecialchars($binh_luan['ten_san_pham'] ?? '') ?>
                                    </a></td>
                                <td><?= htmlspecialchars($binh_luan['noi_dung'] ?? '') ?></td>
                                <td><?= htmlspecialchars($binh_luan['ngay_dang'] ?? '') ?></td>
                                <td><?= htmlspecialchars($binh_luan['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn') ?></td>
                                <td>
                                    <div class="btn-group">
                                        <form method="post" action="<?= BASE_URL_ADMIN . '?act=update-binh-luan' ?>">
                                            <input type="hidden" name="id_binh_luan" value="<?= htmlspecialchars($binh_luan['id']) ?>">
                                            <input type="hidden" name="name_view" value="detail_khach_hang">
                                            <input type="hidden" name="id_khach_hang" value="<?= htmlspecialchars($binh_luan['tai_khoan_id']) ?>">
                                            <button type="submit" class="btn btn-warning" onclick="return confirm('Bạn có muốn ẩn bình luận không?')">
                                                <?= htmlspecialchars($binh_luan['trang_thai'] == 1 ? 'Ẩn' : 'Hiển thị') ?>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6" class="text-center">Không có bình luận nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>


<?php include './views/layout/footer.php'; ?>
<script src="./assets/plugins/jquery/jquery.min.js"></script>
<script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="./assets/dist/js/adminlte.min.js"></script>

<script>
    $(function() {
        // Khởi tạo DataTable cho bảng thông tin mua hàng
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": true, // Bật chức năng tìm kiếm
            "ordering": true, // Cho phép sắp xếp các cột
            "buttons": ["copy", "csv", "excel", "pdf", "print"],
            "language": {
                "search": "Tìm kiếm:",
                "lengthMenu": "Hiển thị _MENU_ mục",
                "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                "paginate": {
                    "next": "Tiếp",
                    "previous": "Trước"
                }
            }
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        // Khởi tạo DataTable cho bảng lịch sử bình luận
        $("#example2").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": true, // Bật chức năng tìm kiếm
            "ordering": true, // Cho phép sắp xếp các cột
            "buttons": ["copy", "csv", "excel", "pdf", "print"],
            "language": {
                "search": "Tìm kiếm:",
                "lengthMenu": "Hiển thị _MENU_ mục",
                "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                "paginate": {
                    "next": "Tiếp",
                    "previous": "Trước"
                }
            }
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>

<style>
    /* CSS tổng thể */
    .content-wrapper {
        background-color: #f4f6f9;
        /* Màu nền nhẹ nhàng */
        padding: 20px;
        border-radius: 10px;
        /* Bo góc mềm mại */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        /* Hiệu ứng bóng */
    }

    /* Tiêu đề */
    .content-header h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #007bff;
        /* Màu xanh chủ đạo */
        border-bottom: 3px solid #007bff;
        display: inline-block;
        padding-bottom: 5px;
        margin-bottom: 20px;
    }

    /* Thông tin khách hàng */
    .row img {
        border-radius: 15px;
        border: 3px solid #007bff;
        /* Viền ảnh nổi bật */
        transition: transform 0.3s ease-in-out;
    }

    .row img:hover {
        transform: scale(1.05);
        /* Hiệu ứng phóng to khi rê chuột */
    }

    .table-borderless th {
        font-weight: bold;
        color: #333;
        width: 30%;
        text-align: left;
    }

    .table-borderless td {
        color: #555;
        font-style: italic;
    }

    /* Bảng thông tin mua hàng */
    table.table {
        background-color: #ffffff;
        border-radius: 10px;
        overflow: hidden;
    }

    table.table thead {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
        text-align: center;
    }

    table.table tbody tr:hover {
        background-color: #f0f8ff;
        /* Hiệu ứng khi rê chuột */
        cursor: pointer;
    }

    table.table tbody td {
        vertical-align: middle;
        text-align: center;
    }

    /* Nút thao tác */
    .btn-group .btn {
        margin-right: 5px;
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn-group .btn:hover {
        transform: translateY(-2px);
    }

    /* H2 tiêu đề thông tin mua hàng */
    .mt-4 {
        font-size: 1.8rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
        border-left: 5px solid #007bff;
        padding-left: 10px;
    }

    /* Hiển thị thanh công cụ */
    .dataTables_wrapper .dt-buttons {
        margin-bottom: 10px;
    }

    /* Căn chỉnh các nút */
    .dataTables_wrapper .dataTables_filter {
        float: right;
        text-align: right;
    }

    .dataTables_wrapper .dataTables_length {
        float: left;
        margin-bottom: 10px;
    }

    .dataTables_wrapper .dataTables_paginate {
        margin-top: 10px;
    }
</style>