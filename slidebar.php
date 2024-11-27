<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= BASE_URL_ADMIN ?>" class="brand-link">
    <img src="./assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">DungHoangHai</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- User Panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="./assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Trang chủ -->
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN ?>" class="nav-link <?= empty($_GET['act']) ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Trang chủ</p>
          </a>
        </li>

        <!-- Danh mục -->
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=list' ?>" class="nav-link <?= ($_GET['act'] ?? '') === 'list' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Danh Mục
            </p>
          </a>
        </li>

        <!-- Sản phẩm -->
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=product' ?>" class="nav-link <?= ($_GET['act'] ?? '') === 'product' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-box"></i>
            <p>Sản Phẩm</p>
          </a>
        </li>

        <!-- Đơn hàng -->
        <li class="nav-item">
          <a href="<?= BASE_URL_ADMIN . '?act=order' ?>" class="nav-link <?= ($_GET['act'] ?? '') === 'order' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>Đơn hàng</p>
          </a>
        </li>

        <!-- Quản lý tài khoản -->
        <!-- Quản lý tài khoản -->
<li class="nav-item has-treeview <?= in_array($_GET['act'] ?? '', ['list-tai-khoan-quan-tri', 'list-tai-khoan-khach-hang', 'add-user']) ? 'menu-open' : '' ?>">
  <a href="#" class="nav-link <?= in_array($_GET['act'] ?? '', ['list-tai-khoan-quan-tri', 'list-tai-khoan-khach-hang', 'add-user']) ? 'active' : '' ?>">
    <i class="nav-icon fas fa-user"></i>
    <p>
      Quản lý tài khoản
      <i class="right fas <?= in_array($_GET['act'] ?? '', ['list-tai-khoan-quan-tri', 'list-tai-khoan-khach-hang', 'add-user']) ? 'fa-angle-down' : 'fa-angle-left' ?>"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri' ?>" class="nav-link <?= ($_GET['act'] ?? '') === 'list-tai-khoan-quan-tri' ? 'active' : '' ?>">
        <i class="far fa-user"></i>
        <p>Tài khoản quản trị</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang' ?>" class="nav-link <?= ($_GET['act'] ?? '') === 'list-tai-khoan-khach-hang' ? 'active' : '' ?>">
        <i class="far fa-user"></i>
        <p>Tài khoản khách hàng</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= BASE_URL_ADMIN . '?act=add-user' ?>" class="nav-link <?= ($_GET['act'] ?? '') === 'add-user' ? 'active' : '' ?>">
        <i class="far fa-user"></i>
        <p>Tài khoản cá nhân</p>
      </a>
    </li>
  </ul>
</li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('.nav-item.has-treeview > a').click(function(e) {
  e.preventDefault(); // Ngừng hành động mặc định của thẻ a
  var treeviewMenu = $(this).next('.nav-treeview');
  
  // Kiểm tra xem menu con có đang hiển thị không, nếu không thì mới mở
  if (treeviewMenu.is(':hidden')) {
    treeviewMenu.stop(true, true).slideDown();
  } else {
    treeviewMenu.stop(true, true).slideUp();
  }

  $(this).children('.right').toggleClass('fa-angle-left fa-angle-down'); // Đổi icon khi mở/đóng menu
});
</script>
<style>
  /* Menu con */
.nav-treeview {
  display: none; /* Ẩn menu con theo mặc định */
  padding-left: 20px; /* Thụt vào một chút để dễ phân biệt */
}

.nav-item.menu-open .nav-treeview {
  display: block; /* Hiển thị menu con khi mục cha mở */
}

/* Nút active */
.nav-link.active {
  background-color: #007bff; /* Đổi màu nền khi mục được chọn */
  color: #fff;
}

.nav-link:hover {
  background-color: #0056b3;
  color: #fff;
}

</style>