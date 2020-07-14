<?php
header('Content-Type: text/html; charset=utf-8');
//啟用session，此語法要放在網頁最前方
session_start();
//連接資料庫
include("db.php");
$id = $_POST['account'];
$pw = $_POST['passwd'];
//搜尋資料庫資料
$sql = "SELECT * FROM $tbName where 帳號 = '$id'";
$result = mysqli_query($conn, $sql);
$row = @mysqli_fetch_array($result);
//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
if($id != null && $pw != null && $row['帳號'] == $id && $row['密碼'] == $pw)
{
  //將帳號寫入session，方便驗證使用者身份
  $_SESSION['username'] = $id;
  echo '登入成功!';
  echo '<meta http-equiv=REFRESH CONTENT=3;url=member.php>';
}
else
{
  echo '登入失敗!';
  echo '<meta http-equiv=REFRESH CONTENT=5;url=index.htm>';

}
?>