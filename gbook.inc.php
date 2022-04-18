<?php
/* Основные настройки */
 	define('DB_HOST', 'localhost');
 	define('DB_LOGIN', 'root');
 	define('DB_PASSWORD', '');
 	define('DB_NAME', 'gbook');

 	$mysql = new mysqli(DB_HOST,DB_LOGIN,DB_PASSWORD,DB_NAME);
 	if($mysql) echo ('Connected');
 	if($mysql->connect_errno)exit ('Ошибка подключения к базе данных');
 	$mysql->set_charset('utf8');


/* Основные настройки */

/* Сохранение записи в БД */


	$name = $_POST['name'];
	$email = $_POST['email'];
	$msg = $_POST['msg'];
	$mysql->query("INSERT INTO msgs (name, email, msg) VALUES ('$name','$email', '$msg')");
	echo $name, $email, $msg;


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

/* Вывод записей из БД */
?>