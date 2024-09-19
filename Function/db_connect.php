<?php
$servername = "localhost";
$username = "root";  // เปลี่ยนเป็นชื่อผู้ใช้ฐานข้อมูลของคุณ
$password = "";      // เปลี่ยนเป็นรหัสผ่านฐานข้อมูลของคุณ
$dbname = "warehousedb";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}
?>