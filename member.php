<?php
header('Content-Type: text/html; charset=utf-8');
//啟用session，此語法要放在網頁最前方
session_start();
if (isset($_SESSION['username']))
{
  include("db.php");
  echo '<a href="logout.php">登出</a><br /><br />';
  echo '<a href="add.htm">新增</a> &nbsp;';
  echo '<a href="update.php">修改</a> &nbsp;';
  echo '<a href="delete.php">刪除</a>  <br /><br />'; 
  //將資料庫裡的所有會員資料顯示在畫面上
  $result=mysqli_query($conn, "SELECT * FROM $tbName");
  echo "<table border='1'>";
  echo "<tr><th>帳號</th><th>密碼</th><th>生日</th><th>年紀</th><th>性別</th><th>血型</th><th>興趣</th>
		<th>相片</th><th>信箱</th><th>留言板</th></tr>";
  while ($row=mysqli_fetch_array($result))
  {
  //以數字索引取得欄位資料
  echo "<tr>";
  echo "<td>$row[0]</td>";
  echo "<td>$row[1]</td>";
  echo "<td>$row[2]</td>";
  echo "<td>$row[3]</td>";
  echo "<td>{$row['性別']}</td>";
  echo "<td>$row[5]</td>";
  echo "<td>";
  $hh = explode('+',$row[6]);
  for ($i=0; $i<count($hh); $i++) echo  "$hh[$i]&nbsp;&nbsp;";
  echo "</td>";

  echo "<td> <img src = './upload/{$row['相片']}'> </td>";
  echo "<td>$row[8]</td>";
//  $note = nl2br($row[9]);
//  echo "<td>$note</td>";
  echo "<td>" . nl2br($row[9]) . "</td>";
  echo "</tr>";	
  }
  echo "</table>";
}
else
{
  echo '您無權限觀看此頁面!';
  echo '<meta http-equiv=REFRESH CONTENT=2;url=index.htm>';
}
?>
