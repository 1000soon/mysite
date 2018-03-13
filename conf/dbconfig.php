<?php
class Connection{
	private $hostname= "192.168.1.250";
	private $port = 15460;
	private $dbname = "test";
    private $username = "root";
    private $pw = "SBlade12#"; 
	private $mssqldriver = '{ODBC Driver 11 for SQL Server}';
	private $dbh;
		
	public function init(){		
		switch($db){
			/** 공통 **/
			case "gmt" :$this->hostname= "192.168.1.250"; $this->dbname = "test"; break; 
			default : $this->hostname= "192.168.1.250"; $this->dbname = "test"; break;
		}
	
		$this->dbh = null;
	}
	
	public function setConnection(){
		try {		
			$this->dbh = new PDO ("mysql:host=$this->hostname; port=$this->port; dbname=$this->dbname","$this->username","$this->pw");
			$this->dbh->query("SET NAMES 'utf8mb4'");
			return $this->dbh;
		} catch (PDOException $e) {
			echo "Failed to get DB handle: " . $e->getMessage() . "\n";
			exit;
		}
	}
	
	public function closeConn(){
		$this->dbh=null;
	}	
}
?>