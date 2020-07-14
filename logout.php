<?php
header('Content-Type: text/html; charset=utf-8');
//啟用session，此語法要放在網頁最前方
session_start();
//刪除session的username變數
unset($_SESSION['username']);
echo '登出中......';
echo '<meta http-equiv=REFRESH CONTENT=1;url=index.htm>';
//也可執行 header("Refresh: 2; url=index.htm"); 
//也可執行 header('Location:index.htm');
?>