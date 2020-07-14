<?php
header('content-type: text/html; charset=utf-8');
include "db.php";
$aa = $_POST['username'];
$bb = $_POST['passwd'];
$birth = $_POST['birth'];
$blood = $_POST['blood'];

$business = $_POST['business'];
$address = $_POST['address'];
$email = $_POST['email'];
echo '公司名稱：'  .   $aa  .  "<br />" ;
echo '負責人：'  .   $bb  .  "<br />" ;
echo '公司成立日期：'  .   $birth   .  "<br />" ;
echo '行業：'  .   $blood .  "<br />" ;

echo "資產：<br />";
$h="";
if (isset($_POST['SC'])) {
   $SC = $_POST['SC'];
   $h = $h . $SC . '+';
   echo "$SC<br />";
}
if (isset($_POST['dadads'])) {
   $dadads = $_POST['dadads'];
   $h = $h . $dadads . '+';
   echo "$dadads<br />";
}
if (isset($_POST['SAD'])) {
   $SAD = $_POST['SAD'];
   $h = $h . $SAD . '+';
   echo "$SAD<br />";
}

echo "業務品項：$business<br />";
echo "地址：$address<br />";
echo "信箱：$email<br />";

$result = mysqli_query($conn, "select * from `$tbName` where 公司名稱 = '$aa'");
if (mysqli_num_rows($result) > 0) {
    echo " <br />資料庫中已有 '$aa' 公司名稱!!!";
    echo '<meta http-equiv=REFRESH CONTENT=5;url=index.html>';
}
else
{
	$sql = "INSERT $tbName (`公司名稱`,`負責人`,`公司成立日期`,`行業`,`資產`,`業務品項`,`地址`,`信箱`) 
		   VALUES ('$aa','$bb','$birth',$blood','$h','$$business','$address','$email')";
	$result = mysqli_query($conn, $sql);
	if (!$result)
		echo("<br />" . "新增失敗：" . mysqli_error($conn));
	// else
	//	include "gmail.php"; 

	echo  "<br />-------------------------------------------------<br />";
	echo "<table border='1'><tr>";
	echo "<th>公司名稱</th><th>負責人</th><th>公司成立日期</th><th>行業</th><th>資產</th><th>業務品項</th>
		  <th>地址</th><th>信箱</th></tr>";
	$result=mysqli_query($conn, "SELECT * FROM `$tbName`");
	//--------------- 讀取資料庫記錄 ---------------
	while ($row=mysqli_fetch_array($result))
	{
	echo "<tr>";
	echo "<td>$row[0]</td>";
	echo "<td>$row[1]</td>";
	echo "<td>$row[2]</td>";
	echo "<td>$row[3]</td>";
	
echo "<td>";
		$hh = explode('+',$row[4]);
		for ($i=0; $i<count($hh); $i++) echo  "$hh[$i]&nbsp;&nbsp;";
	echo "</td>";

    echo "<td>"  . nl2br($row[5]) . "</td>";

	echo "<td>$row[6]</td>";

	echo "<td>$row[7]</td>";
	echo "</tr>";
	}
	echo  "</table>";

}
?>
