<?php 
// session_start();
class AdminDonHangControllers
{   
    public $modelDonHang;

    // public $modelDanhMuc;
    public function __construct(){
        $this->modelDonHang = new AdminDonHang();
    }
    
    public function order(){
        $listDonHang = $this->modelDonHang->getAllDonHang();
        require_once './views/donhang/AdminDonHang.php';
    }
    public function formDetailDonHang() {
        $don_hang_id = (int)$_GET['id_don_hang']; // Ép kiểu về số nguyên
    
        // Debug lại sau khi ép kiểu // Kết quả sẽ là: int(1)
    
        // Lấy thông tin đơn hàng
        $DonHang = $this->modelDonHang->getDetailDonHang($don_hang_id);
    
        // Lấy danh sách sản phẩm trong đơn hàng
        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);
        $listTrangThaiDonHang = $this ->modelDonHang-> getAllTrangThaiDonHang();
        require_once './views/donhang/detailDonHang.php';
    }
    
    public function formEditDonHang(){
        $id = $_GET['id_don_hang'];
        $DonHang = $this->modelDonHang->getDetailDonHang($id);
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang($id);
        if ($DonHang) {
            require_once './views/donhang/editDonHang.php';
            deleteSessionError();
        } else {
            header("location: " . BASE_URL_ADMIN . '?act=order');
            exit();
        }
    }
    public function editDonHang(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $don_hang_id = $_POST['don_hang_id'] ?? '';
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
            $ghi_chu = $_POST['ghi_chu'] ?? '';
            $trang_thai_id = $_POST['trang_thai_id'] ?? '';
    
            // Kiểm tra lỗi
            $error = [];
    
            if (empty($ten_nguoi_nhan)) {
                $error['ten_nguoi_nhan'] = "Vui lòng nhập tên người nhận.";
            }
            if (empty($sdt_nguoi_nhan)) {
                $error['sdt_nguoi_nhan'] = "Vui lòng nhập số điện thoại người nhận.";
            }
            if (empty($email_nguoi_nhan)) {
                $error['email_nguoi_nhan'] = "Vui lòng nhập email người nhận.";
            }
            if (empty($dia_chi_nguoi_nhan)) {
                $error['dia_chi_nguoi_nhan'] = "Vui lòng nhập địa chỉ người nhận.";
            }
            if (empty($trang_thai_id)) {
                $error['trang_thai_id'] = "Vui lòng chọn trạng thái.";
            }
    
            // Nếu không có lỗi thì cập nhật đơn hàng và chuyển hướng
            if (empty($error)) {
                $this->modelDonHang->updateDonHang(
                    $don_hang_id,
                    $ten_nguoi_nhan,
                    $sdt_nguoi_nhan,
                    $email_nguoi_nhan,
                    $dia_chi_nguoi_nhan,
                    $ghi_chu,
                    $trang_thai_id
                );
                header("location: " . BASE_URL_ADMIN . '?act=order');
                exit();
            } else {
                $_SESSION['error'] = $error;
                header("location: " . BASE_URL_ADMIN . '?act=form-edit-don-hang&id_don_hang=' . $don_hang_id);
            }
        }
    }
    
    
}
