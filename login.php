<?php
session_start();

// 数据库连接信息
$servername ="127.0.0.1";
$dbname = "sqlqq7684490";
$username = "qq7684490";
$password = "qq7684490";

// 创建数据库连接对象
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
  die("连接失败：" . $conn->connect_error);
}

// 获取表单提交的数据并进行处理
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// 使用预处理语句查询数据库中是否存在该用户
$stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

// 判断查询结果是否存在
if ($result->num_rows > 0) {
  // 登录成功，将用户名存储在 session 中
  $_SESSION['username'] = $username;

  // 跳转到 index.php 页面
  header("Location: index.html");
  exit();
} else {
  // 登录失败，显示错误消息
  echo "用户名或密码不正确，请重试。";
}

// 关闭数据库连接
$stmt->close();
$conn->close();
?>
