<?php
//initialize session
session_start();
$link=mysqli_connect("localhost","forms","","forms");
if(mysqli_connect_error()){
   echo("not connected");
}

$sql="SELECT username,password FROM forms";
$result=mysqli_query($link,$sql);

//define variables and initialize with empty values
$username=$password="";
$username_err=$password_err="";

//processing form data when form is submited
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if(empty(trim($_POST["username"]))){
		$username_err="please enter username";
	}else{
		$username=trim($_POST["username"]);
	}
}

//checkif username is empty
if(empty(trim($_POST["password"]))){
	$password_err="please enter your password";
}else{
	$password=trim($_POST["password"]);
}

//validation of  creditentials
if(empty($username_err) && empty($password_err)){
	$sql="SELECT username,password FROM users WHERE username=?";
	//select statement
	if($stmt = mysqli_prepare($link,$sql)){
		//variables binded tp the statement as parameters
		mysqli_stmt_bind_param($stmt,"s",$param_username);
		//set parameters
		$param_username=$username;
		//attempt to execute the prepared statement
		if(mysqli_stmt_execute($stmt)){
			//storing result
			mysqli_stmt_store_result($stmt);
			//check if username exists
			if(mysqli_stmt_num_rows($stmt)==1){
				//binding result variables
				mysqli_stmt_bind_results($stmt,$username,$password);
				if(mysqli_stmt_fetch($stmt)){
					if(password_verify($password))
						//password==correct,start new session
						session_start();
						//data stored in new session variables
						$_SESSION["loggedin"]=true;
						$_SESSION["username"]=$username;
						//user directed to next page
						header("location:welcome.php");
				}else{
					//displays error message if password in not valid.
					$password_err="the passsword you entered was not valid";
				}
			}
		}else{
			//displays error message if username is not valid
			$username_err="no account found with that username";
		}
	}else{
		echo "try again";
	}
	mysqli_stmt_close($stmt);
}

	mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
	<title>LoginForm</title>

</head>
<body>
	<h3>Login Form</h3>
	<form action="<?php echo htmlspecialchars($_SERVER["localhost"]);?>" method="POST">
		<div class="form-group <?php echo (!empty($username))? 'has error': '';?>">
		<label>Username</label><br/>
		<input type="text" name="username" class="form-control" placeholder=" Username "/><br/>
	</div>
	<div class="form-group <?php echo (!empty($passord_err))?'has-error':'';?>">
		<label for="password">Password</label><br/>
		<input type="password" name="password" class="form-control"/><br/>
	</div>
		<br/><br/>
		<div class="form-group">
		<input type="submit" value="Login"/>
	</div>
	</form>

</body>
</html>

