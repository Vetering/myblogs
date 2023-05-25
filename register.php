<?php
$servername = "127.0.0.1";
$dbname = "sqlqq7684490";
$username = "qq7684490";
$password = "qq7684490";

// 创建与数据库的连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
  die("连接失败：" . $conn->connect_error);
}

// 如果 users 表不存在，则创建该表
if (!$conn->query("DESCRIBE users")) {
  $sql = "CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
  )";
  if ($conn->query($sql) === TRUE) {
    echo "成功创建表 'users'。";
  } else {
    echo "创建表 'users' 失败：" . $conn->error;
    exit();
  }
}

// 获取表单数据
$username = $_POST['username'];
$password = $_POST['password'];

// 查询数据库中是否已存在该用户名
$sql_check = "SELECT id FROM users WHERE username='$username'";
$result = $conn->query($sql_check);

if ($result && $result->num_rows > 0) {
  // 如果存在，则提示用户已存在，直接登录或注册
  echo "该用户已存在！请直接登录或注册！";
} else {
  // 如果不存在，则将数据插入到数据库中
  $sql_insert = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
  if ($conn->query($sql_insert) === TRUE) {
    echo "注册成功！";
    header("Location: login.html");
  } else {
    echo "注册失败！请重试！ " . $sql_insert . "<br>" . $conn->error;
  }
}

// 关闭连接
$conn->close();
