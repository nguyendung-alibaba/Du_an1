<?php 

class AdminDanhMucControllers
{   
    public $modelDanhMuc;
    public function __construct(){
        $this->modelDanhMuc= new AdminDanhMuc();
    }
    public function __destruct(){
        
    }
    
    public function list(){
        $listProduct= $this -> modelDanhMuc-> getAllProduct();
        // var_dump($listProduct);die();

        require_once './views/danhmuc/AdminDanhMuc.php';
    }
    public function formAddDanhMuc(){
        // ham nay de hien thi form dang nhap
        // var_dump('form-them');
        require_once './views/danhmuc/addDanhMuc.php';
        deleteSessionError();
    }
    public function addDanhMuc(){
        // ham nay xu li them du lieu
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lay ra du lieu
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            // tao mot mang trong de luu du lieu
            $error = [];
            if (empty($ten_danh_muc)) {
                $error['ten_danh_muc'] = 'Vui long nhap ten danh muc';
            }
            if (empty($error)){
                // neu khong co loi thi them danh muc
                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc,$mo_ta);
                header("location: ".BASE_URL_ADMIN.'?act=list');
                exit();
            }else{
                // neu co loi thi tra ve form
                $_SESSION['error'] = $error;
                $_SESSION['flash'] = true;
                header("location: " . BASE_URL_ADMIN . '?act=form-them-danh-muc');
                exit();
            }
        }
    }
    public function formEditDanhMuc(){
        // ham nay de hien thi form dang nhap
        // var_dump('form-them');
        $id = $_GET['id_danh_muc'];
        $danhMuc= $this -> modelDanhMuc-> getDetailDanhMuc ($id);
        if ($danhMuc){
            require_once './views/danhmuc/editDanhMuc.php';
        }else{
            header("location: ".BASE_URL_ADMIN.'?act=list');
            exit();
        }
        

    }
    public function editDanhMuc(){
        // ham nay xu li them du lieu
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lay ra du lieu
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            // tao mot mang trong de luu du lieu
            $error = [];
            if (empty($ten_danh_muc)) {
                $error['ten_danh_muc'] = 'Vui long nhap ten danh muc';
            }
            if (empty($error)){
                // neu khong co loi thi them danh muc
                $this->modelDanhMuc->UpdateDanhMuc($id,$ten_danh_muc,$mo_ta);
                header("location: ".BASE_URL_ADMIN.'?act=list');
                exit();
            }else{
                // neu co loi thi tra ve form
                $danhMuc= ['id'=>$id,'ten_danh_muc'=>$ten_danh_muc,'mo_ta'=>$mo_ta];
                require_once './views/danhmuc/editDanhMuc.php';
            }
        }
        
    }
    public function formDeleteDanhMuc(){
        $loi = "";
        $thanhCong = "";
        $id = $_GET['id_danh_muc'];
        $danhMuc= $this -> modelDanhMuc-> getDetailDanhMuc ($id);
        if ($danhMuc){
            $this->modelDanhMuc->destroyDanhMuc($id);
            if ($this->modelDanhMuc->destroyDanhMuc($id)){
                $thanhCong = "Xoa thanh cong";
            }
        }else{
            $loi = "Xoa khong thanh cong";
        }
        header("location: ".BASE_URL_ADMIN.'?act=list');
        exit();
    }
    public function deleteDanhMuc(){
        
    }
    

}