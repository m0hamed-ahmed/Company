<?php
function secure($value)
{
  $value = htmlentities($value, ENT_QUOTES);
  return $value;
}
include 'connection.php';

$error = array(
          'name'          => '',
          'ID'            => '',
          'adress'        => '',
          'rank'          => '',
          'worked_hours'  => '',
          'payment'       => '',
        );

if(isset($_GET['submit']))
{
    // Validate From XSS & HTML Injection or Any Injection & Handle Error
    if(empty($_GET['username']))
       $error['name'] = "<span class='error'>* Name is Required</span>";
    else
      $name = secure($_GET['username']);

    if(empty($_GET['ID']))
      $error['ID'] = "<span class='error'>* ID is Required</span>";
    else
      $ID = secure($_GET['ID']);

    if(empty($_GET['adress']))
      $error['adress'] = "<span class='error'>* Adress is Required</sapn>";
    else
      $adress = secure($_GET['adress']);

    if(empty($_GET['rank']))
      $error['rank'] = "<span class='error'>* Rank is Required</span>";
    else
      $rank = secure($_GET['rank']);

    if(empty($_GET['worked_hours']))
      $error['worked_hours'] = "<span class='error'>* Worked House is Required</sapn>";
    else
      $worked_hours = secure($_GET['worked_hours']);

    if(empty($_GET['payment']))
      $error['payment'] = "<span class='error'>* Payment is Required</span>";
    else
      $payment = secure($_GET['payment']);
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
        <script type="text/javascript" src="script.js"></script>
    <meta charset="utf-8">
    <title>Regestire New Employee</title>
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
       <a href="add_employe.php" class="ch">Add</a>
       <a href="updateData.php">Edit</a>
       <a href="Search.php">Search</a>
       <a href="showData.php">payment</a>
    </div>
  </div><br><br>

  <article>
    <div class="header_form">
      Add a New Employee
    </div>

    <div class="registration">

      <form method="get">

        <div class="field_input">
          <label>Name</label><br />
          <input type="text" name="username" placeholder="Mohamed Abdelfatah ...">
          <?php echo $error['name'];?>
        </div>

        <div class="field_input">
          <label>ID</label><br />
          <input type="number" name="ID" placeholder="282041376253918">
          <?php echo $error['ID'];?>
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
          <input type="number" name="worked_hours" placeholder="10,11,12 ...">
          <?php echo $error['worked_hours'];?>
        </div>

        <div class="field_input">
          <label>Overtime Hours</label><br />
          <input type="number" name="overtime" placeholder="10,11,12 ...">
        </div>

        <div class="field_input">
          <label>Payment/hour</label><br />
          <input type="number" name="payment" placeholder="20 , 40 , 60 , 80 ....">
          <?php echo $error['payment'];?>
        </div><br><br>

        <input type="submit" class="btn1" name="submit" value="INSERT DATA"><br><br>

      </form>
    </div>
  </article>
  </body>
</html>

<?php
if(!empty($name) && !empty($ID) && !empty($adress) && !empty($rank) && !empty($worked_hours) && !empty($payment))
{
  // if There no Overtime the Value will be 0
  if(empty($_GET['overtime']))
    $overtime = 0;
  else
    $overtime = secure($_GET['overtime']);

  //Calculate Payment
  $payment = $payment * ($overtime + $worked_hours);

  // Insert Data in DataBase
  $sql = "INSERT INTO Employe_Data VALUES(?,?,?,?,?,?,?)";
  $stmt = $con -> prepare($sql);
  $stmt->execute(array($ID,$name,$adress,$rank,$worked_hours,$payment,$overtime));
  echo "<br><div class='done'>  [+] Data Inserted </div> <br /><br />";
}
?>
