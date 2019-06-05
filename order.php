<?php
if(isset($_POST["submit"])){
	//pizza section
	$largePizza=$_POST['largePizza'];
	$tlp=$_POST['largePizza']*1000;
	$mediumPizza=$_POST['mediumPizza'];
	$mp=$_POST['mediumPizza']*700;
	$smallPizza=$_POST['smallPizza'];
	$sp=$_POST['smallPizza']*400;

	//extra toppings
	$meatToppings=$_POST['meatToppings'];
	$vegetableToppings=$_POST['vegetableToppings'];
	if($meatToppings==""){
		echo "";
	}else{
		$mt=$_POST['meatToppings']*150;
	}

	if($vegetableToppings==""){
		echo "";
	}else{
		$vt=$_POST['vegetableToppings']*100;
	}	
	//donate checkbox
	if($donate==""){
		echo "";
     }else{
     	$donate=$_POST['donate']==200;
     }

     //total variable
     $total=$tlp+$mp+$sp+$mt+$vt;
	//order arrays
	$order=array($tlp,$mp,$sp,$mt,$vt,$donate);
     
     //order details display
	echo "Thank you for your order";
	echo "Details:<br/>";
	echo $largePizza."x large pizza = ".$tlp;
	echo $mediumPizza."x medium pizza = ".$mp;
	echo $smallPizza."x small pizza = ".$sp;
	echo "Extra toppings: <br/>";
	echo $meatToppings."x meat toppings =".$mt;
	echo $vegetable."x vegetable toppings=".$vt;
	echo $donate;
	echo "Total is:".$total;

}else{
	echo "try again";
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<title>Online Pizza</title>
</head>
<body>
	<nav class="navbar fixed-top navbar-light bg-light">
  <a class="navbar-brand" href="http://localhost/php_basics/pizza.html">Dashboard Orders</a>
  <span class="navbar-text">Titus Tunduny
  </span>
  <form class="form-inline">
    <a href="http://localhost/php_basics/login.html" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Logout</a>
  </form>
</nav>
<br/><br/><br/>
<form method="POST">
<div >
	<h2>Quantity</h2>
	<input type="number" name="largePizza"/>
	<label for ="large pizza">Large Pizza (ksh. 1000)</label><br/>
	<input type="number" name="mediumPizza"/>
	<label for ="medium pizza">Medium Pizza (ksh. 700)</label><br/>
	<input type="number" name="smallPizza"/>
	<label for ="small pizza">Small Pizza (ksh. 400)</label><br/>

</div>
<br/><br/><br/>
<div>
	<h2>Extra Toppings</h2>
	<input type="checkbox" name="meatToppings"/>
	<label for ="meat toppings">Meat Toppings (ksh. 150)</label><br/>
	<input type="checkbox" name="vegetableToppings"/>
	<label for ="vegetableToppings">Vegetable Toppings (ksh. 100)</label><br/>
	<input type="checkbox" checked="true" name="no  toppings"/>
	<label for ="no toppings">No Toppings (ksh. 0)</label><br/>
	<br/><br/>
	<p>Feed a hungry child today?</p>
	<input type="checkbox" name="donate"/>
	<label for="donate">Donate ksh. 200</label>

	<br/><br/>
	<a href="#" class="btn btn-primary btn-lg active" name="submit" role="submit" aria-pressed="true">ORDER NOW</a>
</div>
</form>


</body>
</html>
