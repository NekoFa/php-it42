<?php
    include_once 'navbar.php';
    if(isset($_POST['submit'])){
        include_once 'connect.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        if($username == '' || $password == '' || $fullname == '' || $email == ''){
            echo "<script>('กรอกข้อมูลให้ครบ')</script>";
        } else {
        $num = mysqli_num_rows($con->query("SELECT * FROM user WHERE username='$username'"));
        if ($num == 1){
            echo "<script>alert('username นี้มีอยู่แล้ว')</script>";
        } else { 
        $sql = "INSERT INTO user VALUES('$username','$password','$fullname','$email')";
        $result = $con->query($sql);
        if(!$result){
            echo "<script>alert('Error:ไม่สามารถเพิ่มข้อมูล');history.back();</script>";
        }else {
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
        <form action="<?php $_SERVER['PHP_SELF']?>"method="POST">
        <div class="mb-3">
            <label class="from-lable">username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="mb-3">
        <label class="from-lable">password</label>
            <input type="text" name="password" class="form-control">
        </div>
        <div class="mb-3">
        <label class="from-lable">fullname</label>
            <input type="text" name="fullname" class="form-control">
        </div>
        <div class="mb-3">
        <label class="from-lable">email</label>
            <input type="text" name="email" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">
            บันทึกข้อมูล
        </button>
    </form>
    </div>
  </div>  
</div>
