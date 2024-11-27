<?php
class AdminTaiKhoanControllers
{
    public $modelTaiKhoan;
    public $modelDonHang;
    public $modelSanPham;
    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelDonHang = new AdminDonHang();
        $this->modelSanPham = new AdminSanPham();
    }
    public function listTaiKhoanQuanTri()
    {
        $tai_khoans = $this->modelTaiKhoan->getAllTaiKhoan(1);
        require_once './views/taikhoan/quantri/AdminQuanTri.php';
    }
    public function formAddTaiKhoanQuanTri()
    {
        require_once './views/taikhoan/quantri/AddTaiKhoanQuanTri.php';
        deleteSessionError();
    }
    public function AddTaiKhoanQuanTri() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = trim($_POST['ho_ten']);
            $email = trim($_POST['email']);
            $error = [];
    
            // Kiểm tra dữ liệu
            if (empty($ho_ten)) {
                $error['ho_ten'] = 'Vui lòng nhập họ tên.';
            }
            if (empty($email)) {
                $error['email'] = 'Vui lòng nhập email.';
            }
    
            if (empty($error)) {
                $password = password_hash('123@123ab', PASSWORD_DEFAULT);
                $chuc_vu_id = 1;
    
                $result = $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);
    
                if ($result) {
                    header("location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                    exit();
                } else {
                    echo "Lỗi: Không thể thêm tài khoản.";
                }
            } else {
                $_SESSION['error'] = $error;
                header("location: " . BASE_URL_ADMIN . '?act=form-them-quan-tri');
                exit();
            }
        }
    }
    public function formEditTaiKhoanQuanTri(){
        $id_quan_tri= $_GET['id_quan_tri'];
        $quanTri= $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);
       if($quanTri['chuc_vu_id'] == 1){
        require_once './views/taikhoan/quantri/EditTaiKhoanQuanTri.php';
       }else{
        require_once './views/taikhoan/khachhang/EditTaiKhoanKhachHang.php';
       }
        deleteSessionError();
    }
    public function EditTaiKhoanQuanTri(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $quan_tri_id = $_POST['quan_tri_id'] ?? '';
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            
    
            // Kiểm tra lỗi
            $error = [];
    
            if (empty($ho_ten)) {
                $error['ho_ten'] = "Vui lòng nhập tên người dùng.";
            }
            if (empty($email)) {
                $error['email'] = "Vui lòng nhập email người dùng.";
            }
            if (empty($trang_thai)) {
                $error['trang_thai'] = "Vui lòng chọn trạng thái người dùng.";
            }
        
    
            // Nếu không có lỗi thì cập nhật đơn hàng và chuyển hướng
            if (empty($error)) {
                $this->modelTaiKhoan->updateTaiKhoan(
                    $quan_tri_id,
                    $ho_ten,
                    $email,
                    $so_dien_thoai,
                    $trang_thai
                );
                header("location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['error'] = $error;
                $_SESSION['flash'] = true;
                header("location: " . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $quan_tri_id);
            }
        }
    }
    public function ResetPassword(){
        $tai_khoan_id = $_GET['id_quan_tri'];
        $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);
        $password = password_hash('123@123ab', PASSWORD_DEFAULT);
        $status=$this->modelTaiKhoan->resetPassword($tai_khoan_id, $password);
        if($status && $tai_khoan['chuc_vu_id'] == 1){
            header("location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        }else if($status && $tai_khoan['chuc_vu_id'] == 2){
            header("location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
            exit();
        }else{
            echo "Lỗi: Không thể reset tài khoản.";die();
        }
    }
    public function listTaiKhoanKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
        require_once './views/taikhoan/khachhang/AdminKhachHang.php';
    }
    public function EditTaiKhoanKhachHang(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $quan_tri_id = $_POST['quan_tri_id'] ?? '';
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            
    
            // Kiểm tra lỗi
            $error = [];
    
            if (empty($ho_ten)) {
                $error['ho_ten'] = "Vui lòng nhập tên người dùng.";
            }
            if (empty($email)) {
                $error['email'] = "Vui lòng nhập email người dùng.";
            }
            if (empty($ngay_sinh)) {
                $error['ngay_sinh'] = "Vui lòng nhập ngày sinh người dùng.";
            }
            if (empty($gioi_tinh)) {
                $error['gioi_tinh'] = "Vui lòng nhập giới tính người dùng.";
            }
            if (empty($trang_thai)) {
                $error['trang_thai'] = "Vui lòng chọn trạng thái người dùng.";
            }
        
    
            // Nếu không có lỗi thì cập nhật đơn hàng và chuyển hướng
            if (empty($error)) {
                $this->modelTaiKhoan->updateKhachHang(
                    $quan_tri_id,
                    $ho_ten,
                    $email,
                    $so_dien_thoai,
                    $ngay_sinh,
                    $gioi_tinh,
                    $dia_chi,
                    $trang_thai
                );
                header("location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
                exit();
            } else {
                $_SESSION['error'] = $error;
                $_SESSION['flash'] = true;
                header("location: " . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $quan_tri_id);
            }
        }
    }
    public function DetailTaiKhoanKhachHang(){
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailKhachHang($id_khach_hang);
        $listDonHang = $this->modelDonHang->getDonHangByKhachHang($id_khach_hang);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFormKhachHang($id_khach_hang);
        require_once './views/taikhoan/khachhang/DetailTaiKhoanKhachHang.php';
    }




    public function Formlogin(){
        require_once './views/auth/formLogin.php';
        deleteSessionError();
    }
    public function Login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy email và password từ form
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
    
            // Kiểm tra thông tin đăng nhập
            $result = $this->modelTaiKhoan->checkLogin($email, $password);
    
            if($result == $email){
                $_SESSION['user_admin']=$result;
                header("location: " . BASE_URL_ADMIN );
                exit();
            }else{
                // thong bao loi
                $_SESSION['error'] = $result;
                $_SESSION['flash'] = true;
                header("location: " . BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }
    
}
