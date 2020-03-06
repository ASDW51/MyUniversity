<?php
$conn = mysqli_connect('localhost','root','','Mydb3');
if($conn){
	echo "连接成功<br>";
	$user = $_POST['user'];
	$password = $_POST['password'];
	$select = 'select * from login';
	$re = mysqli_query($conn, $select);
	$vafiety = false;
	while($rows = mysqli_fetch_row($re)){
		if($user == $rows[1]){
			if($password == $rows[2]){
				$vafiety = true;
				break;
			}else{
				$vafiety = false;
			}
		}
	}
	if($vafiety){
		echo "<h2 align = 'center'>登陆成功</h2><br>";
		echo "<script>
		window.onload = function(){
		location.href = 'index1.html'
		}
		</script>";
	}else{
		echo '用户名或密码错误';
	}

}else{
	echo "连接失败";
}


?>