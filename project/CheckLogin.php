<?php
session_start();
require("conn.php");

if ($identify == "admin") {
    $user_pass = md5($user_pass);
    $sql = "select * from admin where UserName='$user_no' and PassWord='$user_pass'";
    $result = mysql_query($sql);
    $login = mysql_fetch_array($result);
    if (empty($login)) {
        echo "<script>alert('����Ա�û����������');location.href='login.php';</script>";
        exit;
    } else {
        $_SESSION["AdminName"] = $user_no;
        $_SESSION[admin] = $user_no;
        echo "<script>alert('����Ա��¼�ɹ�');location.href='admin/admin_index.php';</script>";
        //header("location:admin/");
    }
}
?>