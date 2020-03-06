<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>
<style>
#bigDiv{
    width: 350px;
    height:200px;
    background:#f2f2f2;
    margin: auto;
	margin-top: 150px;
}
	#loginTable{
		display:none;
	}
    #register{
        display:block;
    }
</style>
</head>
<script>
window.onload = function(){
    var btn1 = document.getElementById('register');
	var btn2 = document.getElementById('login');
    var tab1 = document.getElementById('registerTable');
	var tab2 = document.getElementById('loginTable');
	btn1.onclick = function(){
		if(tab1.style.display == 'none'){
           tab1.style.display = 'block'
           tab2.style.display = 'none'
        }
	}
	btn2.onclick = function(){
		if(tab2.style.display == 'block'){
            console.log('2开了')
        }else{
            tab2.style.display = 'block';
            tab1.style.display = 'none'
        }

}	
	
}
	
</script>
<body>
<?php
	if(isset($_POST['user'])){
		$conn = new MySQLi('localhost','root','','Mydb3');
		if($conn){
			$user = $_POST['user'];
			$password = $_POST['password'];
			echo '连接成功<br>';
			echo "用户名".$user.'<br>';
			echo "密码：".$password.'<br>';
			$insert = "insert into login values(null,'{$user}','{$password}')";
			if(mysqli_query($conn, $insert)){
				echo 's注册成功';
			}else{
				echo "数据插入失败";
			}
		}else{
			die('连接失败');
		}
	}
	
	
	?>
<div id="bigDiv">
  <div id="registerTable">
    <form method="post" action="">
    <table width="300" border="1">
      <tbody>
        <tr>
          <th scope="col" width="92.8" colspan="2">注册 </th>
        </tr>
        <tr>
          <td>用户名：</td>
          <td><input type="text" name="user"></td>
        </tr>
        <tr>
          <td> 密码：</td>
          <td><input type="password" name="password"></td>
        </tr>
		 <tr><td  colspan="2" align="right"><input type="submit" value="注册"></td></tr>
      </tbody>
    </table>
		  </form>
  </div>
  <div id="loginTable">
	
	    <form method="post" action="login.php">
    <table width="300" border="1">
      <tbody>
        <tr>
          <th scope="col" width="92.8" colspan="2">登录 </th>
        </tr>
        <tr>
          <td>用户名：</td>
          <td><input type="text" name="user"></td>
        </tr>
        <tr>
          <td> 密码：</td>
          <td><input type="password" name="password"></td>
        </tr>
		 <tr><td  colspan="2" align="right"><input type="submit" value="登录"></td></tr>
      </tbody>
    </table>
		  </form>
	
	</div>
	
  <button id="register">注册</button><button id="login">已有帐号？点击登录</button>


</div>
