<?php
require_once __DIR__ . '/../config/config.php';
class Database
{
	public function connect()
	{
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		mysqli_set_charset($conn, "utf8");
		// $conn->set_charset('utf8');
		if (mysqli_connect_errno()) {
			echo 'Connect error:' . mysqli_connect_errno();
		}
		return $conn;
	}
	public function Closeconnect($conn)
	{
		mysqli_close($conn);
	}
	public function getdatatable($tablename)
	{
		$conn = $this->connect();
		$stringPro = "select * from " . $tablename;
		$result = mysqli_query($conn, $stringPro);
		$posts = array();
		if ($result->num_rows > 0) {
			while ($post = mysqli_fetch_assoc($result)) {
				$posts[] = $post;
			}
		}
		$this->Closeconnect($conn);
		return $posts;
	}
	public function checkten($tablename, $field, $value)
	{
		$conn = $this->connect();
		$stmt = $conn->prepare("SELECT COUNT(*) FROM " . $tablename . " where " . $field . " = ?");
		$stmt->bind_param("s", $value);
		$stmt->execute();
		$result = $stmt->get_result();
		return $result->fetch_array()[0];
	}

	public function insert_base(string $tbl_name, array $column, array $value)
	{
		$n = count($value);
		if ($n === count($column)) {
			$conn = $this->connect();
			$str_insert = "INSERT INTO `{$tbl_name}`(";
			$isFirst = true;
			foreach ($column as $c) {
				if ($isFirst) {
					$str_insert .= "`{$c}`";
					$isFirst = false;
				} else {
					$str_insert .= ",`{$c}`";
				}
			}
			$str_insert .= ") VALUES(";
			$str_insert .= str_repeat('?,', $n - 1) . '?)';
			$query = $conn->prepare($str_insert);
			$type = $this->getStringType($value);
			$query->bind_param($type, ...$value);
			$query->execute();
			
			$numAffected = $query->affected_rows;
			if ($numAffected > 0) {
				$query->close();
				return array("status" => true, "message" => $numAffected);
			} else {
				$query->close();
				return array("status" => false, "message" => "");
			}
		} else {
			return array("status" => false, "message" => "Số lượng cột và số lượng dữ liệu phải giống nhau");
		}
	}
	public function update_base(string $tbl_name, array $column, array $value, string $where)
	{
		$n = count($value);
		if ($n === count($column)) {
			$conn = $this->connect();
			$str_update = "UPDATE `{$tbl_name}` SET ";
			$isFirst = true;
			foreach ($column as $c) {
				if ($isFirst){
					$str_update .= "`{$c}`=?";
					$isFirst = false;
				}
				else
					$str_update .= " , `{$c}`=?";
			}
			$str_update .= " WHERE {$where}";
			$query = $conn->prepare($str_update);
			$type = $this->getStringType($value);
			$query->bind_param($type, ...$value);
			
			// var_dump($str_update);die();
			$query->execute();
			$numAffected = $query->affected_rows;
			if ($numAffected > 0) {
				$query->close();
				return array("status" => true, "message" => $numAffected);
			} else {
				$query->close();
				return array("status" => true, "message" => "");
			}
		} else {
			return array("status" => false, "message" => "Số lượng cột và số lượng dữ liệu phải giống nhau");
		}
	}
	public function delete_base(string $tbl_name, string $where)
	{
		$conn = $this->connect();
		$str_update = "DELETE FROM `{$tbl_name}` WHERE {$where}";
		$query = $conn->prepare($str_update);
		$query->execute();
		$numAffected = $query->affected_rows;
		if ($numAffected > 0) {
			$query->close();
			return array("status" => true, "message" => $numAffected);
		} else {
			$query->close();
			return array("status" => true, "message" => "");
		}
		return array("status" => false, "message" => "Số lượng cột và số lượng dữ liệu phải giống nhau");
	}
	public function getStringType(array $value)
	{
		$type = "";
		foreach ($value as $v) {
			if (gettype($v) === 'integer') {
				$type .= "i";
			} elseif (gettype($v) === 'string') {
				$type .= "s";
			} elseif (gettype($v) === 'double') {
				$type .= "d";
			} else
				$type .= "i";
		}
		return $type;
	}
}
