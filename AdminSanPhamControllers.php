<?php
// session_start();
class AdminSanPhamControllers
{
    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();
    }

    public function product()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/sanpham/AdminSanPham.php';
    }

    public function formAddSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/sanpham/addSanPham.php';
        deleteSessionError();
    }

    public function addSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'];

            // luu hinh anh
            $file_thump = uploadFile($hinh_anh, './uploads/');
            $img_array = $_FILES['img_array'];


            $error = [];

            if (empty($ten_san_pham)) {
                $error['ten_san_pham'] = 'Vui lòng nhập tên sản phẩm';
            }
            if (empty($gia_san_pham)) {
                $error['gia_san_pham'] = 'Vui lòng nhập giá sản phẩm';
            }
            if (empty($gia_khuyen_mai)) {
                $error['gia_khuyen_mai'] = 'Vui lòng nhập giá khuyen mai sản phẩm';
            }
            if (empty($so_luong)) {
                $error['so_luong'] = 'Vui lòng nhập số luợng sản phẩm';
            }
            if (empty($ngay_nhap)) {
                $error['ngay_nhap'] = 'Vui lòng nhập ngày nhập sản phẩm';
            }
            if (empty($danh_muc_id)) {
                $error['danh_muc_id'] = 'Vui lòng nhập danh mục sản phẩm';
            }
            if (empty($trang_thai)) {
                $error['trang_thai'] = 'Vui lòng nhập trạng thái sản phẩm';
            }
            if ($hinh_anh['error'] !== 0) {
                $error['hinh_anh'] = 'Vui lòng nhập hình ảnh sản phẩm';
            }
            $_SESSION['error'] = $error;
            if (empty($error)) {
                $san_pham_id = $this->modelSanPham->insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $file_thump);
                // xu li them anh san pham
                if (!empty($img_array['name'])) {
                    foreach ($img_array['name'] as $key => $value) {
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key]
                        ];
                        $link_hinh_anh = uploadFile($file, './uploads/');
                        $this->modelSanPham->insertAlbumAnh($san_pham_id, $link_hinh_anh);
                    }
                }
                header("location: " . BASE_URL_ADMIN . '?act=product');
                exit();
            } else {
                // đặt chỉ thị xóa session sau khi hiển thị
                $_SESSION['flash'] = true;
                header("location: " . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }
        }
    }

    public function formEditSanPham()
    {
        $id = $_GET['id_san_pham'];
        $SanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllProduct();
        if ($SanPham) {
            require_once './views/sanpham/editSanPham.php';
            deleteSessionError();
        } else {
            header("location: " . BASE_URL_ADMIN . '?act=product');
            exit();
        }
    }
    public function editSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $hinh_anh = $_FILES['hinh_anh'];
            $img_array = $_FILES['img_array'];

            // Lấy dữ liệu sản phẩm cũ để sử dụng ảnh cũ nếu không có ảnh mới
            $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $new_file = $hinh_anh['error'] === UPLOAD_ERR_OK ? uploadFile($hinh_anh, './uploads/') : $sanPhamOld['hinh_anh'];

            // Cập nhật thông tin sản phẩm
            $this->modelSanPham->updateSanPham($san_pham_id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $new_file);


            // Xóa các ảnh cũ trong album của sản phẩm
            $this->modelSanPham->deleteAlbumAnhByProductId($san_pham_id);

            // Thêm các ảnh mới vào album
            if (!empty($img_array['name'][0])) { // Kiểm tra có ảnh mới để upload hay không
                foreach ($img_array['name'] as $key => $value) {
                    $file = [
                        'name' => $img_array['name'][$key],
                        'type' => $img_array['type'][$key],
                        'tmp_name' => $img_array['tmp_name'][$key],
                        'error' => $img_array['error'][$key],
                        'size' => $img_array['size'][$key]
                    ];
                    $link_hinh_anh = uploadFile($file, './uploads/');
                    $this->modelSanPham->insertAlbumAnh($san_pham_id, $link_hinh_anh);
                }
            }

            header("location: " . BASE_URL_ADMIN . '?act=product');
            exit();
        } else {
            $_SESSION['flash'] = true;
            header("location: " . BASE_URL_ADMIN . '?act=form-edit-san-pham&id_san_pham=');
            exit();
        }
    }
    // sua album anh 
    // sua anh cu
    // khong them anh moi
    // them anh moi
    // xoa anh cu
    // 
    public function editAlbumSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);
            $img_array = $_FILES['img_array'];
            $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
            $current_img_ids = $_POST['current_img_ids'] ?? [];
            $upload_file = [];
            foreach ($img_array['name'] as $key => $value) {
                if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
                    $new_file = uploadFileAlbum($img_array, './uploads/', $key);
                    if ($new_file) {
                        $upload_file[] = [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' => $new_file
                        ];
                    }
                }
            }
            // luu anh vao db
            foreach ($upload_file as $file_info) {
                if ($file_info['id']) {
                    $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];
                    // cap nhat anh cu
                    $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);
                    // xoa anh cu
                    deleteFile($old_file);
                } else {
                    $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
                }
            }
            // xu li xoa anh cu
            foreach ($listAnhSanPhamCurrent as $anhSP) {
                $anh_id = $anhSP['id'];
                if (in_array($anh_id, $img_delete)) {
                    $this->modelSanPham->destroyAnhSanPham($anh_id);
                    deleteFile($anhSP['link_hinh_anh']);
                }
            }
            header("location: " . BASE_URL_ADMIN . '?act=form-edit-san-pham&id_san_pham=' . $san_pham_id);
            exit();
        }
    }
    public function formDeleteSanPham()
    {
        $id = $_GET['id_san_pham'];
        $SanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        if ($SanPham) {
            deleteFile($SanPham['hinh_anh']);
            $this->modelSanPham->destroySanPham($id);
        }
        if ($listAnhSanPham) {
            foreach ($listAnhSanPham as $key => $value) {
                deleteFile($value['link_hinh_anh']);
                $this->modelSanPham->destroyAnhSanPham($value['id']);
            }
        }
        header("location: " . BASE_URL_ADMIN . '?act=product');
        exit();
    }
    // formDetailSanPham
    public function formDetailSanPham()
    {
        $id = $_GET['id_san_pham'];
        $SanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan= $this->modelSanPham->getBinhLuanFormSanPham($id);

        if ($SanPham) {
            require_once './views/sanpham/detailSanPham.php';
            // deleteSessionError();
        } else {
            header("location: " . BASE_URL_ADMIN . '?act=product');
            exit();
        }
    }public function updateTrangThaiBinhLuan()
    {
        if (!isset($_POST['id_binh_luan']) || !isset($_POST['name_view']) || !isset($_POST['id_khach_hang'])) {
            die('Dữ liệu không hợp lệ.');
        }
    
        $id_binh_luan = $_POST['id_binh_luan'];
        $name_view = $_POST['name_view'];
        $id_khach_hang = $_POST['id_khach_hang'];
    
        // Lấy chi tiết bình luận
        $binhLuan = $this->modelSanPham->getDetailBinhLuan($id_binh_luan);
    
        if ($binhLuan) {
            // Cập nhật trạng thái
            $trang_thai_update = $binhLuan['trang_thai'] == 1 ? 2 : 1;
    
            $status = $this->modelSanPham->updateBinhLuan($id_binh_luan, $trang_thai_update);
    
            // Điều hướng theo view hiện tại
            if ($status) {
                if ($name_view === 'detail_khach_hang') {
                    header("Location: " . BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $id_khach_hang);
                } elseif ($name_view === 'detail_san_pham') {
                    header("Location: " . BASE_URL_ADMIN . '?act=form-detail-san-pham&id_san_pham=' . $binhLuan['san_pham_id']);
                }
            } else {
                die('Cập nhật trạng thái bình luận thất bại.');
            }
        } else {
            die('Không tìm thấy bình luận.');
        }
    }
    
}
