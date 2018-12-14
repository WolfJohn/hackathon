<?php include_once('bd.php'); ?>	
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
		<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
		<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
		<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
		<script src='https://code.jquery.com/jquery-1.11.1.min.js'></script>
		<script src='script/login.js'></script>
		<script>
			function changeCSS(cssFile, cssLinkIndex) {

				var oldlink = document.getElementsByTagName("link").item(cssLinkIndex);

				var newlink = document.createElement("link");
				newlink.setAttribute("rel", "stylesheet");
				newlink.setAttribute("type", "text/css");
				newlink.setAttribute("href", cssFile);

				document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
			}
		</script>
		<style>
			.field-icon {
				  float: right;
				  margin-right: 10px;
				  margin-top: -45px;
				  position: relative;
				  z-index: 2;
				}
		</style>
		<title>Лабораторная работа №3</title>
	</head>
<body>
	<?php
		if(empty($login) and empty($password)){
			echo "<body>
			<div class='container'>
			<div class='form'>
				<div class='thumbnail'><img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg'/></div>
				<form action='login.php' method='post'>
						<label for='login'>Логин</label><br>
						<input id='login' type='text' name='login' required><br>
						
						<label for='password'>Пароль</label><br>
						<input id='password' type='password' name='password' required>
						<span id='pass_toggle' onclick='showpass(this, \"password\")' class='fa fa-fw fa-eye fa-eye-slash field-icon'></span>

						<br>
						<button id='subbut' class='sub' type='submit' name='submit'>Войти</button>
					</form>
					<br><a href='registration.php'>Регистрация</a>
				</div>
			</div></body>";
		} else{
			echo "<body onload=\"changeCSS('css/index.css', 0);\">
			<ul>
				<li><a href='index.php'>Главная</a></li>
				<li><a href='practice.php'>Практики</a></li>
				<li style='float:right'><a class='active' href='exit.php'>Выход</a></li>
				<li style='float:right'><p id='helloUser'><font color='white'>Вы вошли как <u><strong>$login</strong></u></font></p></li>
				<listyle='float:center'><p id='helloUser'><font color='white'>Доступные практики</font></p></li>
			</ul>
			<form action='' method='post'>
				<table>
					<th><button class='sub' type='submit' name='insert'>Добавить</button></th>
					<th><button class='sub' type='submit' name='update'>Изменить</button></th>
					<th><button class='sub' type='submit' name='delete'>Удалить</button></th>
				</table>
			</form>
			
			<div id='main'>";

			
			// подключение к базе данных mysql
			$conn = mysqli_connect("localhost", "root", "", "mysql");
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			// вeб форма для добавления данных
				if(isset($_POST['insert'])){
					echo "
					<div class='layer'>
						<h3>Добавить новую запись</h3>
						<form action='' method='post'>
							<label for='name'>Курс</label>
							<input id='name' type='text' name='name'><br>
							<label for='location'>Место работы</label>
							<input id='location' type='text' name='location'><br>
							<label for='from_d'>Дата начала</label>
							<input id='from_d' type='text' name='from_d'><br>
							<label for='to_d'>Дата окончания</label>
							<input id='to_d' type='text' name='to_d'><br>
							<button class='sub' type='submit' name='adding'>Insert</button>
						</form>
					</div>
					";
				}
				// веб форма для изменения данных
				if(isset($_POST['update'])){
					echo "
					<div class='layer'>
						<h3>Изменить существующую запись по названию</h3>
						<form action='' method='post'>
							<label for='name'>Курс</label>
							<input id='name' type='text' name='name'><br>
							<label for='location'>Место работы</label>
							<input id='location' type='text' name='location'><br>
							<label for='from_d'>Дата начала</label>
							<input id='from_d' type='text' name='from_d'><br>
							<label for='to_d'>Дата окончания</label>
							<input id='to_d' type='text' name='to_d'><br>
							<button class='sub' type='submit' name='updating'>Update</button>
						</form>
					</div>
					";
				}
				// веб форма для удаления данных
				if(isset($_POST['delete'])){
					echo "
					<div class='layer'>
						<h3>Удалить существующую запись</h3>
						<form action='' method='post'>
							<label for='id'>ID</label>
							<input id='id' type='text' name='id'><br>
							<button class='sub' type='submit' name='deleting'>Delete</button>
						</form>
					</div>
					";
				}
		
			// sql запрос для веб формы добавления данных
			if(isset($_POST['adding'])){
				$nm = $_POST['name'];
				$lc = $_POST['location'];
				$fr = $_POST['from_d'];
				$to = $_POST['to_d'];
				$sql = "INSERT INTO practica (name, location, from_d, to_d) VALUES ('$nm', '$lc', STR_TO_DATE('$fr', '%Y-%m-%d'), STR_TO_DATE('$to', '%Y-%m-%d'));";
				if (mysqli_query($conn, $sql)) {
					echo "New record created successfully<br>";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
			// sql запрос для веб формы изменения данных
			if(isset($_POST['updating'])){
				$nm = $_POST['name'];
				$lc = $_POST['location'];
				$fr = $_POST['from_d'];
				$to = $_POST['to_d'];
				$sql = "UPDATE practica SET name = '$nm', location = '$lc', from_d = STR_TO_DATE('$fr', '%Y-%m-%d'), to_d = STR_TO_DATE('$to', '%Y-%m-%d') WHERE name = '$nm';";
				if (mysqli_query($conn, $sql)) {
					echo "The record updated successfully<br>";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
			// sql запрос для веб формы удаления данных
			if(isset($_POST['deleting'])){
				$id = $_POST['id'];
				$sql = "DELETE FROM practica WHERE id = '$id';";
				if (mysqli_query($conn, $sql)) {
					echo "The record deleted successfully<br>";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
			// вывод в виде таблицы на экран
			
			
			echo 
			"<table id='students'>
				<tr>
					<th>ID</th>
					<th>Курс</th>
					<th>Место работы</th>
					<th>Период занятости</th>
				</tr>";

			$sql = "SELECT * FROM practica";
			$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) <= 0) { echo "0 results"; }
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["location"]."</td><td>".$row["from_d"]." - ".$row["to_d"]."</td></tr>";
			}				
			echo "</table>";
			mysqli_close($conn);
			}
		?>
	</div>
	
</html>