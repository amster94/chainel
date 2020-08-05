<?php
class DBController{
	// private $host = "localhost";
	// private $user = "chainelc_user";
	// private $password = "chain_123";
	// private $database = "chainelc_db";
	// private $dsn ='mysql:host=localhost;dbname=chainelc_db';////

	private $host = "localhost";
	private $user = "root";
	private $password = "12345";
	private $database = "chainel";
	private $dsn ='mysql:host=localhost;dbname=chainel';
	function DBController() {
	 $conn = $this->connectDB();
		// if(!empty($conn)) {
		// 	$this->selectDB($conn);
		// }
	}
	
	function connectDB() {
		try {
			$conn = new PDO($this->dsn,$this->user,$this->password);
		} catch (Exception $e) {
			
		}
		return $conn;
	}
	
	function runQuery($query,$condition) {
		$conn = $this->connectDB();
		try {
			$result = $conn->prepare($query);
			$result->bindParam(':condition',$condition);
			$result->execute();
		} catch (Exception $e) {
			
		}	
		
			return $result;
	}

function runQuery1($query, $c1,$c2,$c3,$c4,$c5,$c6,$c7,$c6,$c8,$c9,$c10,$c11,$c12,$c13) {
		$conn = $this->connectDB();
		try {
			$result = $conn->prepare($query);
			$result->bindParam(':c1',$c1);
			$result->bindParam(':c2',$c2);
			$result->bindParam(':c3',$c3);
			$result->bindParam(':c4',$c4);
			$result->bindParam(':c5',$c5);
			$result->bindParam(':c6',$c6);
			$result->bindParam(':c7',$c7);
			$result->bindParam(':c8',$c8);
			$result->bindParam(':c9',$c9);
			$result->bindParam(':c10',$c10);
			$result->bindParam(':c11',$c11);
			$result->bindParam(':c12',$c12);
			$result->bindParam(':c13',$c13);
			$result->execute();
		} catch (Exception $e) {
			
		}	
		
			return $result;
	}


}
?>