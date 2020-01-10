<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script type="text/javascript" src="script.js"></script>
    <meta charset="utf-8">
    <title>Company</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <center>
      <input type="submit" class="btn2" onclick="changeBackground('green')" value="Green">
      <input type="submit" class="btn2" onclick="changeBackground('red')" value="Red">
      <input type="submit" class="btn2" onclick="changeBackground('orange')" value="Orange"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Red <input type="range" id="red" value="255" min="0" max="255" onchange="onSliderChanged()" style="background-color:red">
    Green <input type="range" id="green" value="255" min="0" max="255" onchange="onSliderChanged()" style="background:green" >
    Blue <input type="range" id="blue" value="255" min="0" max="255" onchange="onSliderChanged()" style="background:blue" >
  </center>

  	<header class="head">

  		<p>company</p>
  	</header>
  	<div class="container">
	  	<div class="links">
	  	   <a href="index.php" class="ch">Home</a>
		   <a href="add_employe.php">Add</a>
		   <a href="updateData.php">Edit</a>
		   <a href="Search.php">Search</a>
		   <a href="showData.php">payment</a>
		</div>

	    <div class="project">
		   	<div class="tit">Company Payroll System <hr></div> <br>
			Write a program that stores the data of employees working in a
			company. The employee’s data include: <span style="color:red">ID, name, address, rank,
			hours worked, and overtime hours</span>. The program should:
      <pre>
[ a ] -> Add a new employee. <span style=color:green>✓</span>
[ b ] -> Edit the data of stored employees. <span style=color:green>✓</span>
[ c ] -> Calculate the payment of stored employees. <span style=color:green>✓</span>
[ d ] -> Search for a certain employee and display his/her data. <span style=color:green>✓</span>
[ e ] -> Calculate the average payment for all employees. <span style=color:green>✓</span>
</pre>
<span style=color:red>[~] Note : The [ c ] and [ d ] is The Same Page</span>

	    </div>

	</div>

  </body>
</html>
