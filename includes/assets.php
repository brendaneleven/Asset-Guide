<?php
class Asset {
	public function fetch_all() {
		global $pdo;

		$query = $pdo->prepare("SELECT * FROM assets");
		$query->execute();

		return $query->fetchAll();
	}

	public function fetch_data($id) {
		global $pdo;
		$query = $pdo->prepare("SELECT * FROM assets WHERE id = $id");
		$query->bindValue(1, $id);
		$query->execute();

		return $query->fetch();
	}

}

?>