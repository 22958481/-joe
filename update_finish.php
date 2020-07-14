<?php
header('Content-Type: text/html; charset=utf-8');
//啟用session，此語法要放在網頁最前方
session_start();

if (isset($_SESSION['username']))
{
  //連接資料庫
  include("db.php"); 
  
  $pw = $_POST['pw'];
  $pw2 = $_POST['pw2'];
  $birth = $_POST['birth'];
  $years = $_POST['years'];
  $g = $_POST['gender'];
  $bl = $_POST['bloody'];
  $bb = "";
  if (isset($_POST['check'])) {
    foreach($_POST['check'] as $i => $aa) {
       if ($i == 0)
          $bb = $aa;
       else
          $bb = $bb . "+$aa";
    }
  }
  $upload_dir='./upload/';
  //如果錯誤代碼為 UPLOAD_ERR_OK, 表示上傳成功
  if( $_FILES['UpFile']['error'] == UPLOAD_ERR_OK ) {
  
    //將暫存檔搬移到上傳目錄下, 並且改回原始檔名
    move_uploaded_file($_FILES['UpFile']['tmp_name'],
                       $upload_dir . $_FILES['UpFile']['name']);  
    $photo =  $_FILES['UpFile']['name'];                 
  }
  else{
    $photo =  "";
//    echo "上傳失敗<br /><br />";
  }
  $email = $_POST['email'];
  $c = $_POST['note'];
  
  //判斷密碼是否填寫正確
  if ($pw != null && $pw2 != null && $pw == $pw2)
  {
      $id = $_SESSION['username'];
    
      //更新資料庫資料語法
      $sql = "UPDATE `$tbName` 
              SET 密碼='$pw', 生日='$birth', 年紀='$years', 性別='$g',  
			      血型='$bl', 興趣='$bb', 相片='$photo', 信箱='$email', 留言板='$c'  
              WHERE 帳號 = '$id'";
    
      mysqli_query($conn, $sql);
      //取得被更新的記錄筆數
      $rowUpdated=mysqli_affected_rows($conn); 
      //如果更新的筆數大於 0, 則顯示成功, 若否, 便顯示失敗
      if ($rowUpdated>0) {
        echo '修改成功!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
      }
      else {
        echo '修改失敗!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
      }
  }
  else
  {
      echo '2次密碼不一樣!';
      echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
  }
}
else
{
  echo '您無權限觀看此頁面!';
  echo '<meta http-equiv=REFRESH CONTENT=2;url=index.htm>';
}

?>