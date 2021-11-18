<?php
    include 'E_Mon.php';

    class Model_Mon
    {
        public function __construct()
        {
        }

        public function getAllItem()
        {
           include '../configs/config.php';
            $sql = 'SELECT * FROM mon';
            $result = $conn->query($sql);
            $itemList = array();
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc()) 
                {
                    $item = new Mon($row);
                    array_push($itemList, $item);
                }
                return $itemList;
            }
        }

        public function addMon($mon, $sizeArr, $priceArr)
        {
            include '../configs/config.php';
            include 'M_ChiTietMon.php';

            $ModelCTMon = new Model_ChiTietMon();

            $sql = "INSERT INTO
                        mon (MaMon, TenMon, MaLoaiMon, SoLuong, MaDVT, HinhAnh, MoTa, GhiChu, NgayThem, NgayChinhSuaLanCuoi)
                    VALUES
                        ('" . $mon->get_MaMon() . "', '" . $mon->get_TenMon() . "', '". $mon->get_MaLoaiMon() . "', ".
                        $mon->get_SoLuong() . ", '". $mon->get_MaDVT() . "', '". $mon->get_HinhAnh() . "', '". 
                        $mon->get_MoTa() . "', '" . $mon->get_GhiChu() . "', '" . $mon->get_NgayThem() . "', '".
                        $mon->get_NgayChinhSuaLanCuoi() . "')";
            $result = $conn->query($sql);
            if ($result)
            {
                if ($ModelCTMon->addChiTietMon($mon->get_MaMon(), $sizeArr, $priceArr) == 1)
                {
                    return 1;
                } else {
                    return 0;
                }
            }
            else
            {
                return 0;
            }
        }

        public function addQuantityMon($maMon, $quantity)
        {
            include '../configs/config.php';

            $sql = "UPDATE
                        mon
                    SET
                        SoLuong=" . $quantity . " WHERE MaMon='" . $maMon . "'";
            $result = $conn->query($sql);
            if ($result)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        public function generate_MaMon()
        {
            include 'M_General_CMD.php';
            $general_cmd = new General_CMD();
            return $general_cmd->AutoGetID("mon", "MON");
        }
    }
?>