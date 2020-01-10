<?php
include 'connection.php';
function secure($value)
{
  $value = htmlentities($value, ENT_QUOTES);
  return $value;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Employee Data</title>
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
       <a href="updateData.php" class="ch">Edit</a>
       <a href="Search.php">Search</a>
       <a href="showData.php">payment</a>
    </div>
  </div><br><br>

  <div class="afterUpdate">
  <?php
      $sum = 0;
      $count = 0;
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
  </div>

  <article>
    <div class="header_form">
      Change Employee Data By ID
    </div>

    <div class="registration">

      <form method="get">

        <div class="field_input">
          <label>ID</label><br />
            <?php
            $error = array(
              'name'          => '',
              'adress'        => '',
              'rank'          => '',
              'worked_hours'  => '',
              'payment'       => '',
            );

        if(isset($_GET['submit']))
        {
          $ID = $_GET['ID'];

          if(empty($_GET['username']))
             $error['name'] = "<span class='error'>* Name is Required</span>";
          else
            $name = secure($_GET['username']);

          if(empty($_GET['adress']))
            $error['adress'] = "<span class='error'>* Adress is Required</sapn>";
          else
            $adress = secure($_GET['adress']);

          if(empty($_GET['rank']))
            $error['rank'] = "<span class='error'>* Rank is Required</span>";
          else
            $rank = secure($_GET['rank']);

          if(empty($_GET['worked_hours']))
            $error['worked_hours'] = "<span class='error'>* Hours Worked is Required</sapn>";
          else
            $worked_hours = secure($_GET['worked_hours']);

          if(empty($_GET['payment']))
            $error['payment'] = "<span class='error'>* Payment is Required</span>";
          else
            $payment = secure($_GET['payment']);
        }

            $sql0 = "SELECT * FROM Employe_Data";
            $stmt0 = $con -> prepare($sql0);
            $stmt0 -> execute();
            echo "<select name='ID' class='selectid'>";
            while($row = $stmt0->fetch())
            {
              echo "<option value=".$row[0].">". $row[0] ."</option>";
            }
            echo "</select></td></tr>";
            ?>

      </div>

        <div class="field_input">
          <label>Name</label><br />
          <input type="text" name="username" placeholder="Mohamed Abdelfatah ,Mohamed Ahmed ...">
          <?php echo $error['name'];?>
        </div>

        <div class="field_input">
          <label>Adress</label><br />
          <input type="text" name="adress" placeholder="14th Gamal , Giza">
          <?php echo $error['adress'];?>
        </div>

        <div class="field_input">
          <label>Rank</label><br />
          <input type="text" name="rank" placeholder="Manage , Worker , officer boy ...">
          <?php echo $error['rank'];?>
        </div>

        <div class="field_input">
          <label>Hours Worked</label><br />
          <input type="number" name="worked_hours" placeholder="10 , 11 , 12 , 13 , 14 ...">
          <?php echo $error['worked_hours'];?>
        </div>

        <div class="field_input">
          <label>Overtime Hours</label><br />
          <input type="number" name="overtime" placeholder="10 , 11 , 12 , 13 , 14 ...">
        </div>

        <div class="field_input">
          <label>Payment/hour</label><br />
          <input type="number" name="payment" placeholder="20 , 40 , 60 , 80 ....">
          <?php echo $error['payment'];?>
        </div><br><br>

        <input type="submit" class="btn1" name="submit" value="UPDATE DATA"><br><br>

      </form>
    </div>
  </article>



















<?php
if(!empty($name) && !empty($ID) && !empty($adress) && !empty($rank) && !empty($worked_hours) && !empty($payment))
{
  if(empty($_GET['overtime'])) $overtime = 0;
  else $overtime = secure($_GET['overtime']);
  $payment = $payment * ($overtime + $worked_hours);
  $sql = "UPDATE Employe_Data SET Name=?,adress=?,rank=?,hours_worked=?,payment=?,overtime_hours=? WHERE ID = ?";
  $stmt = $con -> prepare($sql);
  $stmt->execute(array($name,$adress,$rank,$worked_hours,$payment,$overtime,$ID));

  header("Location: updateData.php"); // To Refresh [ Redirect ] The updateData.php Page
}

 ?>
  </body>
</html>
