<?php
	//if the form has been submitted, then
	// 	call login function
	//	if login function return true 
	//		start session 
	//		load user profile into session 
	//		redirect to home page
	//	else
	//		set error
	//		show the login form
	//	end if
	//else 
	//	show the login form
	$msg="";
	if(isset($_REQUEST['username'])){
		//the login form has been submitted
		$username=$_REQUEST['username'];
		$password=$_REQUEST['password'];
		//call login to check username and password
		if(login($username,$password)){
			session_start();	//initiate session for the current login
			loadUserProfile($username);	//load user information into the session
			header("location: admin.php");	//redirect to home page
			//echo "<a href='vaccine_list.php'>click here</a>";	//if redirect fails, provide a link
			exit();
		}else{
			//if login returns false, then something is worng
			$msg="username or password is incorrect";
		}
	}	
	
	
?>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<br><br><br>
	<div align="center"><a href="index.php"><img src="popsell.png" alt="popsell-out" width="250" height="100">
					 			</a></div>
		<form action="login.php" method="POST">
		<table align="center" width="80%">
			<tr>
				<td width="30%"></td>
				<td colspan="2" align="center"><span><?php echo $msg ?></span></td>
				<td width="30%"></td>
			</tr>
			<tr>
				<td width="30%"></td>
				<td class='formlabel'>username</td>
				<td><input class='textbox2' type="text" name="username"></td>
				<td width="30%"></td>
			</tr>
			<tr>
				<td width="30%"></td>
				<td class='formlabel'>password</td>
				<td><input class='textbox2' type="password" name="password"></td>
				<td  width="30%"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input class="btn btn-login" type="submit" name="submit" value="Login"></td>
				<td></td>
			</tr>
		<table>
	</form>
</body>
</html>

<?php
	function login($username, $password){
		include_once ("seller.php");
		 $obj= new seller();
		 $row=$obj->check_user($username, $password);
		  if(!$row){ 
			return false;
			}
		//connect to db
		//select db
		//if connection fails, return false
		//query for the $username and $password
		//if the user with the right password is found, 
		//	return true
		//else 
		
		return true;
	}
	
	function loadUserProfile($username){
		//load username and other informaiton into the session 
		//the user informaiton comes from the database
		$_SESSION['username']=$username;
		$_SESSION['usertype']=1;
		//permission
	}
?>