 <?php
 include 'connection.php';
 $error['ID'] = "";
?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Search in DB</title>
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
         <a href="Search.php" class="ch">Search</a>
         <a href="showData.php">payment</a>
      </div>
  </div><br><br>

  <article>
    <div class="header_form">
      Search By ID
    </div>

    <div class="registration">

      <form method="get">

        <div class="field_input">
          <label>ID</label><br />
          <input type="number" name="ID" placeholder="ID Number : 1 , 2 , 3 , 4 , 5 , 6 , 7 ... ">
          <?php  echo $error['ID'];?><br>
          <input type="submit" name="submit" value="Search" class="btn1" style="width:200px">
        </div>
  </form>
     <div class="SearchId">
  <?php

   // Handle Error
   $error = array(
                  'ID' => '',
          );

   if(!empty($_GET['ID']))
   {
     $ID = $_GET['ID'];
     $sql = "SELECT * FROM Employe_Data WHERE ID = ?";
     $stmt = $con -> prepare($sql);
     $stmt -> execute(array($ID));

     $sql2 = "SELECT * FROM Employe_Data WHERE ID = ?";
     $stmt2 = $con -> prepare($sql2);
     $stmt2 -> execute(array($ID));
     $number = $stmt2 -> rowCount();
     if($number > 0)
     {
           echo "<table border = 1>";
           echo "<tr>
           <th style='text-align:center'>ID</th>
           <th style='text-align:center'>Name</th>
           <th style='text-align:center'>Adress</th>
           <th style='text-align:center'>Rank</th>
           <th style='text-align:center'>Hours Worked</th>
           <th style='text-align:center'>Payment</th>
           <th style='text-align:center'>Overtime Hours</th>
           </tr>";
           while($row = $stmt->fetch())
           {
             echo "<tr>";
             echo "<td style='text-align:center'>$row[0]</td>";
             echo "<td style='text-align:center'>$row[1]</td>";
             echo "<td style='text-align:center'>$row[2]</td>";
             echo "<td style='text-align:center'>$row[3]</td>";
             echo "<td style='text-align:center'>$row[4]</td>";
             echo "<td style='text-align:center'>$row[5]</td>";
             echo "<td style='text-align:center'>$row[6]</td>";
             echo "</tr>";
           }
     }
     else
     {
       echo "<span class='error'>The Data of ID [ $ID ] is Not Found or You Don't Have Permission To Read</span><br>";
     }
   }


else
  {
     $error['ID'] = "<span class='error'>* ID is Required</span>";
  }

  ?>
</div>

    </div>
      </article>
</body>
</html>
