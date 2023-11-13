<?php
include_once 'navbar.php';
if (isset($_POST['submit'])) {
    include_once 'connect.php';
    $pro_id = $_POST['pro_id'];
    $pro_name = $_POST['pro_name'];
    $pro_price = $_POST['pro_price'];
    $pro_amount = $_POST['pro_amount'];
    $pro_status = $_POST['pro_status'];
    if ($pro_name == '' || $pro_price == '' || $pro_amount == '' || $pro_status == '') {
        echo "<script>('กรอกข้อมูลให้ครบ')</script>";
    } else {
        $num = mysqli_num_rows($con->query("SELECT pro_name FROM product WHERE pro_name='$pro_name'"));
        if ($num == 1) {
            echo "<script>alert('product นี้มีอยู่แล้ว')</script>";
        } else {
            // $sql = "INSERT INTO product(pro_name,pro_price,pro_amount,pro_status) VALUES('$pro_name','$pro_price','$pro_amount','$pro_statusmail','$pro_status')";
            $sql = "INSERT INTO product VALUES('','$pro_name','$pro_price','$pro_amount','$pro_status')";
            $result = $con->query($sql);
            if (!$result) {
                echo "<script>alert('Error:ไม่สามารถเพิ่มข้อมูล');history.back();</script>";
            } else {
                header('location:user.php');
            }
        }
    }
}
?>

<div class="container mt-5 w-50">
    <div class="card">
        <div class=" card-header bg-primary text-white">
            เพิ่มข้อมูล
        </div>
        <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="mb-3">
                    <label class="from-lable">ชื่อสินค้า</label>
                    <input type="text" name="pro_name" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="from-lable">ราคาสินค้า</label>
                    <input type="text" name="pro_price" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="from-lable">จำนวนสินค้า</label>
                    <input type="text" name="pro_amount" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="from-lable">สถานะสินค้า</label>
                    <select name="pro_status" class="form-select">
                        <option value="1">สินค้าพร้อมใช้งาน</option>
                        <option value="2">สินค้าหมด</option>
                        <option value="3">สินค้ายกเลิกจำหน่าย</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">
                    บันทึกข้อมูล </button>
            </form>
        </div>
    </div>
</div>