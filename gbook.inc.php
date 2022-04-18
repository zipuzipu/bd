<?php
/* Основные настройки */
 	define('DB_HOST', 'localhost');
 	define('DB_LOGIN', 'root');
 	define('DB_PASSWORD', '');
 	define('DB_NAME', 'gbook');

 	$mysql = new mysqli(DB_HOST,DB_LOGIN,DB_PASSWORD,DB_NAME);
 	if($mysql->connect_errno)exit ('Ошибка подключения к базе данных');
 	$mysql->set_charset('utf8');


/* Основные настройки */

/* Сохранение записи в БД */


	$name = $_POST['name'];
	$email = $_POST['email'];
	$msg = $_POST['msg'];
	$mysql->query("INSERT INTO msgs (name, email, msg) VALUES ('$name','$email', '$msg')");



/* Сохранение записи в БД */

/* Удаление записи из БД */

/* Удаление записи из БД */
?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="POST" action="<?= $_SERVER['REQUEST_URI']?>">
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />

<br />

<input type="submit" value="Отправить!" />

</form>
<?php
/* Вывод записей из БД */
$select_query = "SELECT name, email, msg FROM msgs ORDER BY id DESC";
$result = $mysql->query($select_query);
$row = mysqli_fetch_array($result);
$count = 0;
do{
	echo "<p><table border='0'>
	<tr>
	<td><strong>".$row['name']."</strong> &nbsp &nbsp".$row['email']."</td>
	</tr>
	<tr>
	<td></td>
	<td></td>
	</tr>
	<tr>
	<td margin-left = 20px>".$row['msg']."</td>
	<td></td>
	</tr>
	</table></p>";
	$count++;

}
while($row = mysqli_fetch_array($result));
echo "<p>Всего записей в гостевой книге:".$count." </p>";
/* Вывод записей из БД */
?>