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
		<title>Cybercode E-learning</title>
	</head>
<body>
	<?php
		if(empty($login) and empty($password)){
			$_SESSION['lang']=$lang;
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
				<li><a href='practice.php'>Курсы</a></li>
				<li style='float:right'><a class='active' href='exit.php'>Выход</a></li>
				<li style='float:right'><p id='helloUser'><font color='white'>Вы вошли как <u><strong>$login</strong></u></font></p></li>
				<li style='float:center'><p id='helloUser'><font color='white'>Главная страница</font></p></li>
			</ul>
			<ul>
				<li><a href='index.php'>Главная</a></li>
				<li><a href='practice.php'>Курсы</a></li>
				<form action='' method='post'>
					<li><button class='sub' type='submit' name='insert'>Добавить</button></li>
					<li><button class='sub' type='submit' name='update'>Изменить</button></li>
					<li><button class='sub' type='submit' name='delete'>Удалить</button></li>
				</form>
			</ul>
			
			<div id='main'>";

			
			// подключение к базе данных mysql
			$conn = mysqli_connect("localhost", "root", "", "mysql");
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			
			// вeб форма для добавления данных
				if(isset($_POST['insert'])){
					$sql = "SELECT name FROM practica ORDER BY id";
					$practica = mysqli_query($conn, $sql);
					echo "
					<div class='layer'>
						<h3>Добавить новую запись</h3>
						<form action='' method='post'>
							<label for='lname'>Фамилия</label>
							<input id='lname' type='text' name='lname'><br>
							<label for='fname'>Имя</label>
							<input id='fname' type='text' name='fname'><br>
							<label for='birth'>Дата рождения</label>
							<input id='birth' type='text' name='birth'><br>
							<label for='sex'>Пол</label>
							<input id='sex' type='text' name='sex'><br>
							<label for='city'>Город</label>
							<input id='city' type='text' name='city'><br>
							<label for='grupa'>Группа</label>
							<input id='grupa' type='text' name='grupa'><br>
							<label for='facultet'>Факультет</label>
							<input id='facultet' type='text' name='facultet'><br>
							<label for='score'>Средний балл</label>
							<input id='score' type='text' name='score'><br>
							<label for='course_fk'>Курс</label>
							<select id='course_fk' name='course_fk'>
							<option disabled selected value> -- выберите практику -- </option>";
							$i = 0;
							while($row = mysqli_fetch_assoc($practica)) {
								$i = $i + 1;
								echo "<option value=$i>".$row['name']."</option>";
							}
							  echo "
							</select>
							<button class='sub' type='submit' name='adding'>Insert</button>
						</form>
					</div>
					";
				}
				// веб форма для изменения данных
				if(isset($_POST['update'])){
					$sql = "SELECT name FROM practica ORDER BY id";
					$practica = mysqli_query($conn, $sql);
					echo "
					<div class='layer'>
						<h3>Изменить существующую запись по фамилии</h3>
						<form action='' method='post'>
							<label for='lname'>Фамилия</label>
							<input id='lname' type='text' name='lname'><br>
							<label for='fname'>Имя</label>
							<input id='fname' type='text' name='fname'><br>
							<label for='birth'>Дата рождения</label>
							<input id='birth' type='text' name='birth'><br>
							<label for='sex'>Пол</label>
							<input id='sex' type='text' name='sex'><br>
							<label for='city'>Город</label>
							<input id='city' type='text' name='city'><br>
							<label for='grupa'>Группа</label>
							<input id='grupa' type='text' name='grupa'><br>
							<label for='facultet'>Факультет</label>
							<input id='facultet' type='text' name='facultet'><br>
							<label for='score'>Средний балл</label>
							<input id='score' type='text' name='score'><br>
							<label for='course_fk'>Курс</label>
							<select id='course_fk' name='course_fk'>
							<option disabled selected value> -- выберите практику -- </option>";
							$i = 0;
							while($row = mysqli_fetch_assoc($practica)) {
								$i = $i + 1;
								echo "<option value=$i>".$row['name']."</option>";
							}
							  echo "
							</select>
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
							<label for='idn'>ID</label>
							<input id='idn' type='text' name='idn'><br>
							<button class='sub' type='submit' name='deleting'>Delete</button>
						</form>
					</div>
					";
				}
				
				if(!isset($_POST['insert'])&& !isset($_POST['update']) && !isset($_POST['delete'])){
					echo "
					<div class='layer'>
						<h3>Поиск</h3>
						<form action='' method='post'>
							<select id='filter' name='filter'>
								<option disabled selected value> -- выберите фильтр -- </option>
								<option value='lname'>По фамилии</option>
								<option value='fname'>По имени</option>
								<option value='name'>По практике</option>
								<option value='grupa'>По группе</option>
							</select>
							<label for='find'>Искать:</label>
							<input id='find' type='text' name='find'><br>
							<button class='sub' type='submit' name='search'>Search</button>
						</form>
					</div>
					";
				}
		
			// sql запрос для веб формы добавления данных
			if(isset($_POST['adding'])){
				$ln = $_POST['lname'];
				$fn = $_POST['fname'];
				$sc = $_POST['score'];
				$bh = $_POST['birth'];
				$sx = $_POST['sex'];
				$gr = $_POST['grupa'];
				$fc = $_POST['facultet'];
				$ct = $_POST['city'];
				$fk = $_POST['course_fk'];
				$sql = "INSERT INTO labphp (fname, lname, score, birth, sex, grupa, facultet, city, course_fk) VALUES ('$fn', '$ln', $sc, STR_TO_DATE('$bh', '%Y-%m-%d'), '$sx', '$gr', '$fc', '$ct', $fk);";
				if (mysqli_query($conn, $sql)) {
					echo "New record created successfully<br>";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
			// sql запрос для веб формы изменения данных
			if(isset($_POST['updating'])){
				$ln = $_POST['lname'];
				$fn = $_POST['fname'];
				$sc = $_POST['score'];
				$bh = $_POST['birth'];
				$sx = $_POST['sex'];
				$gr = $_POST['grupa'];
				$fc = $_POST['facultet'];
				$ct = $_POST['city'];
				$fk = $_POST['course_fk'];
				$sql = "UPDATE labphp SET lname = '$ln', fname = '$fn', score = '$sс' WHERE lname = '$ln';";
				if (mysqli_query($conn, $sql)) {
					echo "The record updated successfully<br>";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
			// sql запрос для веб формы удаления данных
			if(isset($_POST['deleting'])){
				$idn = $_POST['idn'];
				$sql = "DELETE FROM labphp WHERE idn = '$idn';";
				if (mysqli_query($conn, $sql)) {
					echo "The record deleted successfully<br>";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
			function sorting($type, $conn){
				switch($type){
					case 0: $sql = "SELECT * FROM labphp l INNER JOIN practica p ON l.course_fk = p.id ORDER BY l.idn"; break;
					case 1: $sql = "SELECT * FROM labphp l INNER JOIN practica p ON l.course_fk = p.id ORDER BY l.idn desc"; break;
					case 2: $sql = "SELECT * FROM labphp l INNER JOIN practica p ON l.course_fk = p.id ORDER BY l.lname"; break;
					case 3: $sql = "SELECT * FROM labphp l INNER JOIN practica p ON l.course_fk = p.id ORDER BY l.lname desc"; break;
					case 4: $sql = "SELECT * FROM labphp l INNER JOIN practica p ON l.course_fk = p.id ORDER BY l.fname"; break;
					case 5: $sql = "SELECT * FROM labphp l INNER JOIN practica p ON l.course_fk = p.id ORDER BY l.fname desc"; break;
					case 6: $sql = "SELECT * FROM labphp l INNER JOIN practica p ON l.course_fk = p.id ORDER BY l.score"; break;
					case 7: $sql = "SELECT * FROM labphp l INNER JOIN practica p ON l.course_fk = p.id ORDER BY l.score desc"; break;
					default: $sql = "SELECT * FROM labphp l INNER JOIN practica p ON l.course_fk = p.id ORDER BY l.idn";
				}
				$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) <= 0) { echo "0 results"; }
				return $result;
			}
			
			echo 
				"<table id='students'>
					<tr>
						<th><form action='' method='POST'>ID <button type='submit' name='idasc'>&#8743;</button><button type='submit' name='iddesc'>&#8744;</button></form></th>
						<th><form action='' method='POST'>Фамилия <button type='submit' name='lnameasc'>&#8743;</button><button type='submit' name='lnamedesc'>&#8744;</button></form></th>
						<th><form action='' method='POST'>Имя <button type='submit' name='fnameasc'>&#8743;</button><button type='submit' name='fnamedesc'>&#8744;</button></form></th>
						<th><form action='' method='POST'>Средний балл <button type='submit' name='scoreasc'>&#8743;</button><button type='submit' name='scoredesc'>&#8744;</button></form></th>
						<th>Дата рождения</th>
						<th>Пол</th>
						<th>Группа</th>
						<th>Факультет</th>
						<th>Город</th>
						<th>Курс</th>
						<th>Место работы</th>
						<th>Период занятости</th>
					</tr>";
					
			if(isset($_POST['search'])){
				$ft = $_POST['filter'];
				$fd = $_POST['find'];
				$sql = "SELECT * FROM labphp l INNER JOIN practica p ON l.course_fk = p.id WHERE $ft = '$fd'";
				$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) <= 0) { echo "0 results"; }
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>".$row["idn"]."</td><td>".$row["lname"]."</td><td>".$row["fname"]."</td><td>".$row["score"]."</td><td>".$row["birth"]."</td><td>".$row["sex"]."</td><td>".$row["grupa"]."</td><td>".$row["facultet"]."</td><td>".$row["city"]."</td><td>".$row["name"]."</td><td>".$row["location"]."</td><td>".$row["from_d"]." - ".$row["to_d"]."</td></tr>";
				}
			} else {
				// сортировка по каждому столбцу
				$result = sorting(9, $conn);
				if(isset($_POST['idasc'])){$result = sorting(0, $conn);}
				if(isset($_POST['iddesc'])){$result = sorting(1, $conn);}
				if(isset($_POST['lnameasc'])){$result = sorting(2, $conn);}	
				if(isset($_POST['lnamedesc'])){$result = sorting(3, $conn);}
				if(isset($_POST['fnameasc'])){$result = sorting(4, $conn);}
				if(isset($_POST['fnamedesc'])){$result = sorting(5, $conn);}
				if(isset($_POST['scoreasc'])){$result = sorting(6, $conn);}
				if(isset($_POST['scoredesc'])){$result = sorting(7, $conn);}
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>".$row["idn"]."</td><td>".$row["lname"]."</td><td>".$row["fname"]."</td><td>".$row["score"]."</td><td>".$row["birth"]."</td><td>".$row["sex"]."</td><td>".$row["grupa"]."</td><td>".$row["facultet"]."</td><td>".$row["city"]."</td><td>".$row["name"]."</td><td>".$row["location"]."</td><td>".$row["from_d"]." - ".$row["to_d"]."</td></tr>";
				}				
			}
			echo "</table>";
			mysqli_close($conn);
		}
		?>
	</div>
	
</html>