<?php
class AdminTaiKhoan
{
    public $db;

    public function __construct()
    {
        $this->db = connectDB();
    }

    public function __destruct()
    {
        $this->db = null;
    }

    public function getAllTaiKhoan($chuc_vu_id)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE chuc_vu_id = :chuc_vu_id';

            $stmt = $this->db->prepare($sql);
            $stmt->execute([':chuc_vu_id' => $chuc_vu_id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Loi: " . $e->getMessage();
        }
    }
    public function insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id)
    {
        try {
            $sql = 'INSERT INTO tai_khoans (ho_ten, email, mat_khau, chuc_vu_id) 
                    VALUES (:ho_ten, :email, :password, :chuc_vu_id)';

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':password' => $password,
                ':chuc_vu_id' => $chuc_vu_id
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    public function getDetailTaiKhoan($id)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE id=:id';

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                'id' => $id,
                // 'mo_ta'=>$mo_ta
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Loi: " . $e->getMessage();
        }
    }
    public function updateTaiKhoan(
        $id,
        $ho_ten,
        $email,
        $so_dien_thoai,
        $trang_thai,
    ) {
        try {
            $sql = 'UPDATE tai_khoans
                SET 
                ho_ten = :ho_ten,
                email = :email,
                so_dien_thoai = :so_dien_thoai,
                trang_thai = :trang_thai
                WHERE id = :id';

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':trang_thai' => $trang_thai,
                ':id' => $id
            ]);

            // lay id san pham vua them

            return true;
        } catch (Exception $e) {
            echo "Loi: " . $e->getMessage();
        }
    }public function resetPassword(
        $id,
        $mat_khau
    ) {
        try {
            $sql = 'UPDATE tai_khoans
                SET 
                mat_khau = :mat_khau
                WHERE id = :id';

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':mat_khau' => $mat_khau,
                ':id' => $id
            ]);

            // lay id san pham vua them

            return true;
        } catch (Exception $e) {
            echo "Loi: " . $e->getMessage();
        }
    }
    public function updateKhachHang(
        $id,
        $ho_ten,
        $email,
        $so_dien_thoai,
        $ngay_sinh,
        $gioi_tinh,
        $dia_chi,
        $trang_thai,
    ) {
        try {
            $sql = 'UPDATE tai_khoans
                SET 
                ho_ten = :ho_ten,
                email = :email,
                so_dien_thoai = :so_dien_thoai,
                ngay_sinh = :ngay_sinh,
                gioi_tinh = :gioi_tinh,
                dia_chi = :dia_chi,
                trang_thai = :trang_thai
                WHERE id = :id';

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':ngay_sinh' => $ngay_sinh,
                ':gioi_tinh' => $gioi_tinh,
                ':dia_chi' => $dia_chi,
                ':trang_thai' => $trang_thai,
                ':id' => $id
            ]);

            // lay id san pham vua them

            return true;
        } catch (Exception $e) {
            echo "Loi: " . $e->getMessage();
        }
    }
    public function getDetailKhachHang($id)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE id=:id';

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                'id' => $id,
                // 'mo_ta'=>$mo_ta
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Loi: " . $e->getMessage();
        }
    }
    public function checkLogin($email, $mat_khau) {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email';
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['email' => $email]);
            
            // Lấy dữ liệu từ cơ sở dữ liệu
            $user = $stmt->fetch();
    
            if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                if ($user['chuc_vu_id'] == 1) {
                    if ($user['trang_thai'] == 1) {
                        return $user['email'];
                    } else {
                        return "Tài khoản bị khóa";
                    }
                } else {
                    return "Tài khoản không có quyền đăng nhập";
                }
            } else {
                return "Sai thông tin đăng nhập";
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    
}
