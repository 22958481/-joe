<?php
header('Content-Type: text/html; charset=utf-8');

//啟用session，此語法要放在網頁最前方
session_start();

if (isset($_SESSION['username']))
{
  //連接資料庫
  include("db.php");
  
  //將登入帳號丟給$id
  $id = $_SESSION['username'];
  //若以下$id直接用$_SESSION['username']將無法使用
  $sql = "SELECT * FROM $tbName where 帳號 = '$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_row($result);
  
  echo "<form method='post' action='update_finish.php' enctype='multipart/form-data'>";
  echo "<table border='1'>";
  echo "<tr><td>帳號：</td> <td>$id (此項目無法修改)</td></tr>";
  echo "<tr><td>密碼：</td> <td><input type='password' name='pw' value='$row[1]'></td></tr>";
  echo "<tr><td>再一次輸入密碼：</td> <td><input type='password' name='pw2' value='$row[1]'></td></tr>";
  echo "<tr><td>生日：</td> <td><input type='date' name='birth' value='$row[2]'></td></tr>";
  echo "<tr><td>年紀：</td> <td><input type='text' name='years' value='$row[3]'></td></tr>";
  if ($row[4] == '男')
  {
    echo "<tr><td>性別：</td> <td><input type='radio' name='gender' value='男' checked />男
		      <input type='radio' name='gender' value='女'  />女</td></tr>";
  }
  else
  {
     echo "<tr><td>性別：</td> <td><input type='radio' name='gender' value='男' />男
		      <input type='radio' name='gender' value='女'  checked />女</td></tr>";
  }
  echo "<tr><td>血型：</td> <td>";
  switch($row[5])
  {
    case 'A':
        echo "<select name='bloody'>
		          <option selected='on'>A</option>
              <option>B</option>
              <option>O</option>
              </select></td></tr>";
        break;
    case 'B':
        echo "<select name='bloody'>
		          <option>A</option>
              <option selected='on'>B</option>
              <option>O</option>
              </select></td></tr>";
        break;
    case 'O':
         echo "<select name='bloody'>
		          <option>A</option>
              <option>B</option>
              <option selected='on'>O</option>
              </select></td></tr>";
        break;
  }
  $arr = array("電影", "數獨", "讀書");
  echo "<tr><td>興趣：</td> <td>";
  $hh = explode('+',$row[6]);
  $k = 0;
  for ($i=0; $i<count($hh); $i++)
  {
     for ($j=$k; $j<3 ; $j++)
     {
        if ($hh[$i] ==  $arr[$j])
        {
            echo "<input type='checkbox' name='check[]' value='$arr[$j]' checked>$arr[$j] &nbsp;";
            $k = $j + 1;
            if ($i+1 != count($hh)) break;
        }
        else
            echo "<input type='checkbox' name='check[]' value='$arr[$j]'>$arr[$j] &nbsp;";
     }
  }
  echo "</td></tr>";
  echo "<tr><td>相片：</td> <td><input type='file' name='UpFile'> <img src = './upload/$row[7]'> </td></tr>";
  echo "<tr><td>信箱：</td> <td><input type='text' size='40' name='email' value='$row[8]' /></td></tr>";
  echo "<tr><td>留言板：</td> <td><textarea name='note' rows='4'>$row[9]</textarea></td></tr>";
  echo "</table>";
  echo "<br><input type='submit' value='確定'>";
  echo "</form>";
}
else
{
  echo '您無權限觀看此頁面!';
  echo '<meta http-equiv=REFRESH CONTENT=2;url=index.htm>';
}
?>