<?php
  header("Content-type: text/html; charset=utf-8"); 
// echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."default.html"."\""."</script>";
	$conn=@mysql_connect("localhost","root","")or die("connect fail");

	mysql_select_db("bookinline") or die("connect fail".mysql_error());
	
	if($conn)
	{
		$name=$_POST["userName"];
		$password=$_POST["password"];
		if($name==""||$password=="")
		{
			echo "用户名或者密码不能为空";
			echo "<a href='login.html'>重新登录</a>";
			exit;
		}
	
	 	$result= mysql_query("select * from user where USER_ID="."'"."$name"."'",$conn);	 
	 	$row=mysql_fetch_array($result);
	 	if($row["PASSWORD"]==$password)
	 	{

	 		echo "登录成功";
	    	echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."default.html"."\""."</script>";
	 	}
	 	else{
	 		echo "登录失败";
	 	}
	
	}

?>