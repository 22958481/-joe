<?php
header('Content-Type: text/html; charset=utf-8');
//啟用session，此語法要放在網頁最前方
session_start();

if (isset($_SESSION['username']))
{
  //連接資料庫
  include("db.php");

  $id = $_POST['id'];
  //刪除資料庫資料語法
  $sql = "delete from $tbName where 帳號 = '$id'";
  mysqli_query($conn, $sql);
  //取得被刪除的記錄筆數
  $rowDeleted = mysqli_affected_rows($conn);
  if ($rowDeleted > 0) {
    echo '刪除成功!';
    echo '<meta http-equiv=REFRESH CONTENT=3;url=member.php>';
  }
  else {
    echo '刪除失敗!';
    echo '<meta http-equiv=REFRESH CONTENT=3;url=member.php>';
  }
}
else
{
  echo '您無權限觀看此頁面!';
  echo '<meta http-equiv=REFRESH CONTENT=3;url=index.htm>';
}
?>