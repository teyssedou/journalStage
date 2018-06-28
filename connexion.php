<?php
class Connexion
{
	private static $link = null;

	private static function getLink()
	{
		if (self :: $link) {
			return self :: $link;
		}
		$servername = 'localhost';
		$username = 'root';
		$password = 'simplonco';
		$dbname = 'exopoo';
		$charset = 'utf8';
		$collate = 'utf8_unicode_ci';
        //$conn = new mysqli($servername, $username, $password, $dbname);
		$dsn = "mysql:host=$servername;dbname=$dbname;charset=$charset";
		$options = [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_PERSISTENT => false,
			PDO::ATTR_EMULATE_PREPARES => false,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset COLLATE $collate",
		];
		self :: $link = new PDO($dsn, $username, $password, $options);

		return self :: $link;
	}

	public static function __callStatic($name, $args)
	{
		$callback = array(self :: getLink(), $name);

		return call_user_func_array($callback, $args);
	}
}
