<?php

ini_set('display_error', 1);

class MysqlDB
{

	// === インサート用
	public function Insert_DATA($table, $data)
	{

		try {

			$pdo = new PDO(PDO_DSN, DB_USER, DB_PASS);

			// データ挿入の準備
			$columns = array_keys($data);
			$set_columns = implode(',', $columns); // カラム作成
			$placeholders = ":" . implode(', :', $columns); // プレースホルダー作成

			$stmt = $pdo->prepare("INSERT INTO $table ($set_columns) VALUES ($placeholders)");

			if (!$stmt) {
				die('プリペアードステートメントエラー smtp ');
			}

			// パラメータとバインド
			foreach ($data as $key => $value) {
				$stmt->bindValue(":$key", $value);
			}

			$result = $stmt->execute();

			if ($result) {
				return true;
			} else {
				return false;
			}

			echo "インサート完了";
		} catch (PDOException $e) {
			echo "insert エラー" . $e->getMessage();
		}

		$pdo = null;
	}


	// ============= DELETE data 削除用　関数
	public function DELETE_DATA($table, $data_id)
	{

		try {

			$pdo = new PDO(PDO_DSN, DB_USER, DB_PASS);

			$stmt = $pdo->prepare("DELETE FROM $table WHERE id = :id");
			$stmt->bindParam(":id", $data_id);

			$execute_result = $stmt->execute();

			if ($execute_result) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			echo "Delete エラー" . $e->getMessage();
		}
	}

	// ============= Update data 更新用　関数
	public function UPDATE_DATA($table, $update_data, $data_id)
	{

		try {

			$pdo = new PDO(PDO_DSN, DB_USER, DB_PASS);

			$columns = array_keys($update_data); // キーから、カラムを取得

			$result = [];

			for ($i = 0; $i < count($columns); $i++) {
				$result[$i] = $columns[$i] . " = " . ":" . $columns[$i];
			}

			$result_str = implode(",", $result); // name = :name , name_02 = :name_02 

			$sql = "UPDATE $table SET $result_str WHERE " . "id = :id";
			$stmt = $pdo->prepare($sql);

			// パラメータとバインド
			foreach ($update_data as $key => $value) {
				$stmt->bindValue(":$key", $value);
			}

			$stmt->bindParam(":id", $data_id);

			$update_result = $stmt->execute();

			if ($update_result) {
				return true;
			} else {
				return false;
			}
		} catch (PDOException $e) {
			echo "Update エラー" . $e->getMessage();
		}
	}
} // === END class MysqlDB
