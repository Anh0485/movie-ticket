<?php
/* Kết nối máy chủ MySQL. Máy chủ có cài đặt mặc định (user là 'root' và không có mật khẩu) */
$link = mysqli_connect("localhost", "root", "", "bainhom");
 
// Kiểm tra kết nối
if($link === false){
    die("ERROR: Không thể kết nối. " . mysqli_connect_error());
}
 
// Làm sạch dữ liệu đầu vào để đảm bảo an toàn
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
 
// Thực thi câu lệnh insert
$sql = "INSERT INTO register (name, email, password) VALUES ('$name', '$email', '$password')";
if(mysqli_query($link, $sql)){
    
    echo "Đăng ký thành công";

    header("Location: ../log-in/html/login.php");
    exit();
    
} else{
    echo "ERROR: Không thể thực thi $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>