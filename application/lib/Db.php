<?php 

namespace application\lib;
use PDO;

class Db {

	protected $db;

	public function __construct() {
		$config = require 'application/config/db.php';
		$this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'].'', $config['user'], $config['password']);
	}

  //Делает запрос, защита от SQL-инъекции
	public function query($sql, $params = []) {
		$stmt = $this->db->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				$stmt->bindValue(':'.$key, $val); //Связывает параметр с заданным значением
			}
		}
		$stmt->execute(); //Запускает подготовленный запрос на выполнение
		return $stmt;
	}

	public function row($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function column($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchColumn();
	}


}

