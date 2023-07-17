<?php 
	class Database {
		public $host = 'localhost';
		public $name = 'root';
		public $pass = '';
		public $dbname = 'sepak_bola';
		
		public $mysqli;

		function __construct (){

		$this->mysqli = new mysqli($this->host, $this->name, $this->pass, $this->dbname);

		if ($this->mysqli->connect_errno) {
			echo "<center> Maaf, server aplikasi sedang dalam perbaikan.. <br> Coba lah beberapa saat lagi </center>";
			exit;
		}

	}

}
?>