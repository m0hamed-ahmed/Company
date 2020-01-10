<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Payment & Employee Data</title>
      <script type="text/javascript" src="script.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <center>
    <input type="submit" class="btn2" onclick="changeBackground('green')" value="Green" >
    <input type="submit" class="btn2" onclick="changeBackground('red')" value="Red">
    <input type="submit" class="btn2" onclick="changeBackground('orange')" value="Orange"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  Red <input type="range" id="red" value="255" min="0" max="255" onchange="onSliderChanged()" style="background:red">
  Green <input type="range" id="green" value="255" min="0" max="255" onchange="onSliderChanged()" style="background:green">
  Blue <input type="range" id="blue" value="255" min="0" max="255" onchange="onSliderChanged()" style="background:blue">
</center>
    <header class="head">
      <p>company</p>
    </header>

    <div class="container">
      <div class="links">
       <a href="index.php">Home</a>
       <a href="add_employe.php">Add</a>
       <a href="updateData.php">Edit</a>
       <a href="Search.php">Search</a>
       <a href="showData.php" class="ch">payment</a>
    </div>
  </div><br><br>

<article>
  <div class="header_form">
    Payment & Employee Data
  </div>

  <div class="registration">

  <form method="get">

  <div class="field_input">
<?php

/*
  This Page To Show ALL Data of ALL User's & Calculate The All Payment & The Average Payment
*/

$sum = 0;
$count = 0;
include 'connection.php';
$sql0 = "SELECT * FROM Employe_Data";
$stmt0 = $con -> prepare($sql0);
$stmt0 -> execute();
echo "<table border = 1>";
echo "<tr>
<th>ID</th>
<th>Name</th>
<th>Adress</th>
<th>Rank</th>
<th>Hours Worked</th>
<th>Payment</th>
<th>Overtime Hours</th>
<th>Action</th>
</tr>
";
while($row = $stmt0->fetch())
{

  $count++;  // Count How Many Data
  echo "<tr>";
  echo "<td style='text-align:center'>$row[0]</td>";
  echo "<td style='text-align:center'>$row[1]</td>";
  echo "<td style='text-align:center'>$row[2]</td>";
  echo "<td style='text-align:center'>$row[3]</td>";
  echo "<td style='text-align:center'>$row[4]</td>";
  echo "<td style='text-align:center'>$row[5]</td>";
  $sum += $row[5]; // To Calculate All Payment
  echo "<td style='text-align:center'>$row[6]</td>";
  echo "<td>
  <form method='get'>
      <input type='hidden' value='$row[0]' name='hidden_id'>
      <img src='delete.png' width='16px' height='16px'>
      <input type='submit' name='delete' value='Delete' class='dele' style='width:50px'>
  </form>
</td>";
echo "</tr>";

}
echo "</table>";
if(isset($_GET['delete']) && isset($_GET['hidden_id']))
{
$id = $_GET['hidden_id'];
$stmtdel = $con->prepare("DELETE FROM Employe_Data WHERE ID=?");
$stmtdel->execute(array($id));
echo "<br><div class='done'> [-] Row Deleted!!!</div> <br /><br />";
}
?>
<p>
<span style="color:red">The All Payment  = </span><span style=color:green><?php echo $sum;?></span><br>
<span style="color:red">The Average Payment  = </span><span style=color:green><?php if($count == 0) echo 0; else echo $sum/$count;?></span>
</p>
</div>

<div class="SearchId">

</div>
</form>
</div>
</article>

</body>
</html>
