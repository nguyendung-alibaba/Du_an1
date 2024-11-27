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
          <h1>Quản lý San Pham</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">
            <!-- <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3> -->
            <div class="col-12">
              <img style="width: 500px; height: 500px; object-fit: contain" src=" <?= BASE_URL . $SanPham['hinh_anh'] ?>" class="product-image" alt="Product Image">
            </div>
            <div class="col-12 product-image-thumbs">
              <?php foreach ($listAnhSanPham as $key => $value) : ?>
                <div class="product-image-thumb <?= $key == 0 ? 'active' : '' ?>"><img src="<?= BASE_URL . $value['link_hinh_anh'] ?>" alt="Product Image"></div>
              <?php endforeach; ?>

            </div>
          </div>
          <div class="col-12 col-sm-6">
            <h3 class="my-3">Tên Sản Phẩm: <?= $SanPham['ten_san_pham'] ?></h3>
            <hr>
            <h4 class="my-2">Giá Sản Phẩm: <?= $SanPham['gia_san_pham'] ?></h4>
            <hr>
            <h4 class="my-2">Giá khuyến mãi: <?= $SanPham['gia_khuyen_mai'] ?> </h4>
            <hr>
            <h4 class="my-2">Số Lượng: <?= $SanPham['so_luong'] ?> </h4>
            <hr>
            <h4 class="my-2">Lượt xem: <?= $SanPham['luot_xem'] ?> </h4>
            <hr>
            <h4 class="my-2">Ngày nhập: <?= $SanPham['ngay_nhap'] ?> </h4>
            <hr>
            <h4 class="my-2">Danh mục: <?= $SanPham['ten_danh_muc'] ?> </h4>
            <hr>
            <h4 class="my-2">Trạng thái: <?= $SanPham['trang_thai'] == 1 ? 'Còn Hàng' : 'Hết Hàng' ?> </h4>
            <hr>
            <h4 class="my-2">Mota: <?= $SanPham['mo_ta'] ?> </h4>
          </div>
        </div>
        <div class="row mt-4">
          <nav class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
              <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#binh_luan" role="tab" aria-controls="product-desc" aria-selected="true">Bình Luận Sản Phẩm</a>

            </div>
          </nav>
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="binh_luan" role="tabpanel" aria-labelledby="product-desc-tab">
              <div class="container-fluid">

              </div>
            </div>
          </div>
        </div>
        <ul class="nav nav-tabs row mt-4" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
          </li>
        </ul>
        <h2 class="mt-4">Bình luận</h2>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>STT</th>
              <th>Người bình luận</th>
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
                  <td><a target="_blank" href="<?= BASE_URL_ADMIN . '?act=form-detail-san-pham&id_san_pham=' . $binh_luan['tai_khoan_id']; ?>">
                      <?= htmlspecialchars($binh_luan['ho_ten'] ?? '') ?>
                    </a></td>
                  <td><?= htmlspecialchars($binh_luan['noi_dung'] ?? '') ?></td>
                  <td><?= htmlspecialchars($binh_luan['ngay_dang'] ?? '') ?></td>
                  <td><?= htmlspecialchars($binh_luan['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn') ?></td>
                  <td>
                    <div class="btn-group">
                      <form method="post" action="<?= BASE_URL_ADMIN . '?act=update-binh-luan' ?>">
                        <input type="hidden" name="id_binh_luan" value="<?= htmlspecialchars($binh_luan['id']) ?>">
                        <input type="hidden" name="name_view" value="detail_san_pham">
                        <input type="hidden" name="id_khach_hang" value="<?= htmlspecialchars($binh_luan['tai_khoan_id']) ?>">
                        <button type="submit" class="btn <?= $binh_luan['trang_thai'] == 1 ? 'btn-warning' : 'btn-success' ?>"
                          onclick="return confirm('Bạn có muốn <?= $binh_luan['trang_thai'] == 1 ? 'ẩn' : 'hiển thị' ?> bình luận không?')">
                          <?= $binh_luan['trang_thai'] == 1 ? 'Ẩn' : 'Hiển thị' ?>
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
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include './views/layout/footer.php' ?>
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
    // Chuyển ảnh con thành ảnh chính
    $(".product-image-thumb").on("click", function() {
      // Bỏ class 'active' khỏi tất cả các ảnh thumbnail
      $(".product-image-thumb").removeClass("active");
      // Thêm class 'active' vào ảnh thumbnail được click
      $(this).addClass("active");
      // Lấy src của ảnh thumbnail được click
      const newImageSrc = $(this).find("img").attr("src");
      // Gán src của ảnh chính bằng src của ảnh thumbnail
      $(".product-image").attr("src", newImageSrc);
    });

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
  /* Tổng quan */
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f6f9;
    margin: 0;
    padding: 0;
  }

  .content-wrapper {
    background: #ffffff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  }

  /* Header */
  .content-header h1 {
    font-size: 2.5rem;
    color: #007bff;
    font-weight: bold;
    border-left: 5px solid #007bff;
    padding-left: 15px;
    margin-bottom: 20px;
  }

  /* Card */
  .card {
    border: none;
    border-radius: 10px;
    background-color: #fff;
  }

  .card-body {
    padding: 20px;
  }

  /* Hình ảnh sản phẩm */
  .product-image {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }

  .product-image-thumbs {
    display: flex;
    justify-content: start;
    gap: 10px;
    margin-top: 10px;
  }

  .product-image-thumb {
    width: 60px;
    height: 60px;
    overflow: hidden;
    border: 2px solid transparent;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .product-image-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .product-image-thumb.active {
    border-color: #007bff;
    transform: scale(1.1);
  }

  /* Thông tin sản phẩm */
  .my-3 {
    font-size: 1.3rem;
    color: #333;
    font-weight: 600;
    line-height: 1.6;
  }

  hr {
    border-top: 1px solid #ddd;
  }

  /* Tabs */
  .nav-tabs {
    border-bottom: 2px solid #ddd;
  }

  .nav-tabs .nav-link {
    font-size: 1rem;
    color: #007bff;
    border: 1px solid transparent;
    border-radius: 0;
  }

  .nav-tabs .nav-link.active {
    border-color: #ddd;
    background-color: #f8f9fa;
    color: #333;
  }

  .tab-content {
    margin-top: 20px;
  }

  /* Bảng bình luận */
  .table {
    width: 100%;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    overflow: hidden;
  }

  .table th {
    background-color: #007bff;
    color: white;
    text-align: center;
  }

  .table tbody tr:hover {
    background-color: #f1f1f1;
  }

  .table td,
  .table th {
    padding: 10px;
    text-align: center;
  }

  /* Nút */
  .btn {
    padding: 8px 12px;
    border-radius: 5px;
    font-size: 0.9rem;
    font-weight: 500;
  }

  .btn-warning {
    background-color: #ffc107;
    color: #fff;
    border: none;
  }

  .btn-warning:hover {
    background-color: #e0a800;
  }

  .btn-success {
    background-color: #28a745;
    color: #fff;
    border: none;
  }

  .btn-success:hover {
    background-color: #218838;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .product-image {
      width: 100%;
    }

    .product-image-thumb {
      width: 50px;
      height: 50px;
    }

    .content-header h1 {
      font-size: 1.8rem;
    }

    .my-3 {
      font-size: 1.2rem;
    }

    .table {
      font-size: 0.85rem;
    }
  }
</style>