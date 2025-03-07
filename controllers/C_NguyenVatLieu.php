<?php
include_once '../models/M_NguyenVatLieu.php';
include_once '../models/M_ChucVu.php';

class C_NguyenVatLieu
{
    public function invoke()
    {
        $ModelPhanQuyen = new Model_PhanQuyen();

        if (isset($_GET['expand']))
        {
            // $MaNVL = $_GET['expand'];
            // $ModelNguyenVatLieu = new Model_NguyenVatLieu();
            // $NguyenVatLieu = $ModelNguyenVatLieu->get_NguyenVatLieuDetails($MaNVL);

            include_once('../admin/warehouse/expand.php');
        } 
        elseif (isset($_GET['receipt']))
        {
            include 'C_PhieuNhap.php';
        }
        elseif (isset($_GET['export']))
        {
            include 'C_PhieuXuat.php';
        }
        elseif (isset($_GET['report']))
        {
            include 'C_PhieuKiem.php';
        }
        else
        {
            if (isset($_POST['name']) && isset($_POST['type']) && isset($_POST['unit']) && isset($_POST['id']) &&
                isset($_POST['supplier']) && isset($_POST['status']) && isset($_POST['action']))
            {
                include '../models/M_DonViTinh.php';
                include '../models/M_LoaiNguyenVatLieu.php';
                include '../models/M_NhaCungCap.php';
                include '../models/M_TinhTrang.php';
                $modelNVL = new Model_NguyenVatLieu();

                $ModelDonViTinh = new Model_DonViTinh();
                $DonViTinhList = $ModelDonViTinh->get_AllDonViTinh();
                function getMaDVT($DonViTinhList, $tenDVT)
                {
                    for ($i = 0; $i < count($DonViTinhList); $i++) {
                        if ($DonViTinhList[$i]->get_TenDVT() == $tenDVT) {
                            return $DonViTinhList[$i]->get_MaDVT();
                        }
                    }
                }

                $ModelLoaiNguyenVatLieu = new Model_LoaiNguyenVatLieu();
                $LoaiNguyenVatLieuList = $ModelLoaiNguyenVatLieu->get_AllLoaiNguyenVatLieu();
                function getMaLoaiNVL($LoaiNguyenVatLieuList, $tenLNVL)
                {
                    for ($i = 0; $i < count($LoaiNguyenVatLieuList); $i++) {
                        if ($LoaiNguyenVatLieuList[$i]->get_TenLoaiNVL() == $tenLNVL) {
                            return $LoaiNguyenVatLieuList[$i]->get_MaLoaiNVL();
                        }
                    }
                }

                $ModelNhaCungCap = new Model_NhaCungCap();
                $NhaCungCapList = $ModelNhaCungCap->get_AllNhaCungCap();
                function getMaNCC($NhaCungCapList, $tenNCC)
                {
                    for ($i = 0; $i < count($NhaCungCapList); $i++) {
                        if ($NhaCungCapList[$i]->get_TenNCC() == $tenNCC) {
                            return $NhaCungCapList[$i]->get_MaNCC();
                        }
                    }
                }

                $ModelTinhTrang = new Model_TinhTrang();
                $TinhTrangList = $ModelTinhTrang->get_AllTinhTrang();
                function getMaTT($TinhTrangList, $tenTT)
                {
                    for ($i = 0; $i < count($TinhTrangList); $i++) {
                        if ($TinhTrangList[$i]->get_TenTinhTrang() == $tenTT) {
                            return $TinhTrangList[$i]->get_MaTinhTrang();
                        }
                    }
                }

                //Define action
                if ($_POST['action'] == "add-material")
                {
                    $data = array(
                        "MaNVL"=>$modelNVL->generate_MaNVL(),
                        "MaLoaiNVL"=>getMaLoaiNVL($LoaiNguyenVatLieuList, $_POST['type']),
                        "TenNVL"=>$_POST['name'],
                        "SoLuongTon"=>0,
                        "MaDVT"=>getMaDVT($DonViTinhList, $_POST['unit']),
                        "DonGiaNhap"=>0,
                        "MaNCC"=>getMaNCC($NhaCungCapList, $_POST['supplier']),
                        "MaTinhTrang"=>getMaTT($TinhTrangList, $_POST['status'])
                    );
                    
                    $NVL = new NguyenVatLieu($data);
                    if ($modelNVL->add_NguyenVatLieu($NVL) == 1)
                    {
                        $arr = array('success'=>'1', 'id'=>$data['MaNVL']);
                        echo json_encode($arr);
                    }
                    else
                    {
                        echo json_encode(array('success' =>'0'));
                    }
                }
                elseif ($_POST['action'] == "edit-material")
                {
                    $data = array(
                        "MaNVL"=>$_POST['id'],
                        "MaLoaiNVL"=>getMaLoaiNVL($LoaiNguyenVatLieuList, $_POST['type']),
                        "TenNVL"=>$_POST['name'],
                        "SoLuongTon"=>$_POST['quantity'],
                        "MaDVT"=>getMaDVT($DonViTinhList, $_POST['unit']),
                        "DonGiaNhap"=>0,
                        "MaNCC"=>getMaNCC($NhaCungCapList, $_POST['supplier']),
                        "MaTinhTrang"=>getMaTT($TinhTrangList, $_POST['status'])
                    );
                    
                    $NVL = new NguyenVatLieu($data);
                    if ($modelNVL->update_NguyenVatLieu($NVL) == 1)
                    {
                        $arr = array('success'=>'1');
                        echo json_encode($arr);
                    } 
                    else
                    {
                        echo json_encode(array('success' =>'0'));
                    }
                }
                else
                {
                    //echo json_encode(array('success' =>'0'));
                }
            }
            elseif (isset($_POST['action']) && $_POST['action'] == 'delete')
            {
                $modelNVL = new Model_NguyenVatLieu();

                if ($modelNVL->delete_NguyenVatLieu($_POST['mater_id']) == 1)
                {
                    $arr = array('success'=>'1');
                    echo json_encode($arr);
                } 
                else
                {
                    echo json_encode(array('success' =>'0'));
                }
            }
            elseif ($ModelPhanQuyen->check_PhanQuyen($_SESSION['maCV'], "kho0")) {
                $ModelNguyenVatLieu = new Model_NguyenVatLieu();
                $NguyenVatLieuList = $ModelNguyenVatLieu->get_AllNguyenVatLieu();

                include_once('../admin/werehouse.php');
            }
            else {
                echo "<script>" .
                    "Swal.fire(
                        'Thất bại!',
                        'Bạn không có quyền truy cập mục này!',
                        'error'
                    );" .
                    "</script>";
            }
        }
    }
}

$C_NguyenVatLieu = new C_NguyenVatLieu();
$C_NguyenVatLieu->invoke();
?>