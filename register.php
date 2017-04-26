<?php
	header("Content-type: text/html; charset=utf-8"); 
	$conn=@mysql_connect("localhost","root","")or die("connect fail");	
	if($conn)
	{
		$record=mysql_select_db("bookinline") or die("connect fail".mysql_error());;
		if($record)
		{
			$username=$_POST["username"];
			$password=$_POST["password"];
			$password2=$_POST["pwd_again"];
			if($name=""||$password=="")
			{
				echo "name/password cann't be null";
				echo "<a href='login.html'>重新填写注册信息</a>";
			}
			if($password!=$password2)
			{
				echo "password are not conincidence";
				exit;
			}
			$result=mysql_query("insert into user (USER_ID,PASSWORD) values('$username','$password')",$conn);
			if($result)
			{
				echo "register success";
			    echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."login.html"."\""."</script>";
			}
		}
	}
?>