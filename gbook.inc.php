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

	if (($name != "") and ($email != "") and ($msg != "")){
	$mysql->query("INSERT INTO msgs (name, email, msg) VALUES ('$name','$email', '$msg')");
	}


/* Сохранение записи в БД */

?>
<h3>Оставьте запись в нашей Гостевой книге</h3>

<form method="POST" action="<?= $_SERVER['REQUEST_URI']?>" >
Имя: <br /><input type="text" name="name" /><br />
Email: <br /><input type="text" name="email" /><br />
Сообщение: <br /><textarea name="msg"></textarea><br />

<br />

<input type="submit" value="Отправить!" />

</form>
<?php
/* Вывод записей из БД */
$select_query = "SELECT id, name, email, msg FROM msgs ORDER BY id DESC";
$result = $mysql->query($select_query);
$row = mysqli_fetch_array($result);
$count = 0;
date_default_timezone_set('Asia/Almaty');
?>
<?php
while($row = mysqli_fetch_array($result)){
	echo "<p><table border='0'>
	<tr>
	<td><strong>".$row['name']."</strong> &nbsp &nbsp".date('d-m-y  h:i:s')."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	<a style = 'color:black' href='index.php?id=gbook&del=".$row['id']."'>Удалить</a></td>
	</tr>
	<tr>
	<td>".$row['email']. "<input type='hidden' name='id' value='" . $row["id"] . "' /> </td>
	<td></td>
	</tr>
	<tr>
	<td margin-left = 20px>".$row['msg']."</td>
	<td></td>
	</tr>
	</table></p>";
	$count++;

}

echo "<p>Всего записей в гостевой книге:".$count." </p>";
/* Вывод записей из БД */
/* Удаление записи из БД */
$mysql->query("DELETE * FROM msgs WHERE id = $del");

/* Удаление записи из БД */
?>