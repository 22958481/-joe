<?php
header('Content-Type: text/html; charset=utf-8');

//啟用session，此語法要放在網頁最前方
session_start();

if (isset($_SESSION['username']))
{
  echo "<form  method='post' action='delete_finish.php'>";
  echo "要刪除的帳號：<input type='text' name='id' /> <br>";
  echo "<input type='submit' value='刪除' />";
  echo "</form>";
}
else
{
  echo '您無權限觀看此頁面!';
  echo '<meta http-equiv=REFRESH CONTENT=2;url=index.htm>';
}

?>