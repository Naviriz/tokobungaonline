<?php
class db extends PDO{
	protected $dbms = "mysql";
	protected $dbhost ="localhost";
	protected $dbuser = "root";
	protected $dbpass = "070412";
	protected $dbnm = "sekarsari";
	private $a = "";
	
	private $hasil;
	
	function __construct(){
		try{
			parent::__construct($this->dbms.':host='.$this->dbhost.';dbname='.$this->dbnm, $this->dbuser, $this->dbpass);
			PDO::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->dbms == 'mysql' ? PDO::exec("SET CHARACTER SET utf8") : '';
		}catch(PDOException $e){
			echo $e->getMessage();
			exit();
		}
	}
	
	/* Function Login */
	public function check_login($username, $password){
		$pass = md5($password);
		$qLogin = $this->prepare("SELECT * FROM user WHERE userName ='$username' and userPassword='$pass'");
		$qLogin->execute();
		foreach($qLogin as $data){}
		$rows = $qLogin->rowCount();
		//echo $data['username'];
		if($rows==1){
			$_SESSION['login'] = true;
			$_SESSION['username'] = $data['userName'];
			$_SESSION['password'] = $data['userPassword'];
			$_SESSION['full_name'] = $data['full_name'];
			$_SESSION['userId'] = $data['id_user'];
			return true;
		}else{
			return false;
		}
	}
	
	public function check_userId($username){
		$qUser = $this->prepare("SELECT userId FROM user WHERE userName='$username'");
		$qUser->execute();
		foreach($qUser as $dataUser){}
		return $dataUser['userId'];
	}
	
	public function check_userName($userId){
		$qUser = $this->prepare("SELECT userName FROM user WHERE id_user='$userId'");
		$qUser->execute();
		foreach($qUser as $dataUser){}
		return $dataUser['userName'];
	}
	
	public function check_fullName($userName){
		$qUser = $this->prepare("SELECT full_name FROM user WHERE userName='$userName'");
		$qUser->execute();
		foreach($qUser as $dataUser){}
		return $dataUser['full_name'];
	}
	
	/* Function Tampil */
	public function select($table, $rows, $where=null, $order=null, $limit=null, $groupby=null){
		//check kondisi parameter $tabel
		if(is_array($table)){
            foreach ($table as $key){
                $param[] = $key;
            }
			$param = implode(', ', $param);
			
        }else{
			$param = $table;
		}
		
		//check kondisi parameter $rows
		if(is_array($rows)){
			foreach ($rows as $row){
                $fild[] = $row;
            }
			$fild = implode(', ', $fild);
		}else{
			$fild = $rows;
		}
        $sql = 'SELECT '.$fild.' FROM '.$param;
		
		// check kondisi $where
		if($where != null)
		{
			$sql .= ' WHERE '.$where;
		}
		if($groupby != null){
			$sql .= ' GROUP BY '.$groupby;
		}
		if($order != null){
			$sql .= ' ORDER BY '.$order;
		}
		if($limit != null){
			$sql .= ' ORDER BY '.$limit;
		}
		
		$query = $this->prepare($sql);
		$query->execute();
		$posts = array();
		while($row = $query->fetch()){
			$posts[] = $row;
		}
		return $posts;
	}
	
	/* Function Tambah */
	public function add($table, $rows){
		if(is_array($rows)){
			foreach($rows as $key => $val){
				$vals[] = "'".$val."'";
				$keys[] = $key;
			}
		}
		$field = implode(', ',$keys);
		$value = implode(', ',$vals);
		$sql = "INSERT INTO ".$table." (".$field.") VALUES (".$value.")";
		$query = $this->prepare($sql);
		$query->execute();
	}
	
	//function update
	public function update($table, $data=null, $where=null){
		$sql = "UPDATE ".$table;
        if(is_array($data)){
            foreach ($data as $key =>$val){
                $vals = "'".$val."'";
                $param[] = $key." = ".$vals;
            }
			$param = implode(', ', $param);
        }else{
			$param = $data;
		}
        
        $sql .= " SET ".$param;
		if($where != null)
		{
			$sql .= ' WHERE '.$where;
		}
		 
		$query = $this->prepare($sql);
		$query->execute();
		if(!$query){
			$a = "gagal";
		}
		return $a;
    }
	
	//function delete
	public function delete($table,$where=null){
		$sql = "DELETE FROM ".$table;
        if(!empty($where)){
            $sql .= ' WHERE '.$where;
        }
        $query = $this->prepare($sql);
		$query->execute();
        if(!$query){
			$a = "gagal";
		}
		return $a;
	}
	
	public function formatRupiah($angka){
		$rupiah = number_format($angka,0,',','.');
		return $rupiah;
	}
	
	public function standarNumber($number){
		$hiddenRp = str_replace("Rp ", "", $number);
		$num = str_replace(".", "", $hiddenRp);
		return $num;
	}
	
	public function formatDescription($description){
		$result = substr($description,0,60);
		return $result;
	}
	
	/*public function formatCategoryId(){
		$fild = "substr(ifnull(max(categoryId),0),3,4) as categoryNo";
		$tabel = "roomcategory";
		foreach($this->select($tabel, $fild) as $data){};
		$no = $data['categoryNo']+1;
		if($no < 10){
			$categoryId = "RC000".$no;
		}else if($no < 100){
			$categoryId = "RC00".$no;
		}else if($no < 1000){
			$categoryId = "RC0".$no;
		}else{
			$categoryId = "RC".$no;
		}
		return $categoryId;
	}
	
	public function checkLevelName($userId){
		$tabel = array(
				'user U',
				'level L',
				'userakses UA'
			);
		$fild = "L.levelName";
		$where = "UA.levelId=L.levelId AND UA.userId=U.userId AND U.userId='$userId'";
		$levelName = array();
		foreach($this->select($tabel, $fild, $where) as $dataLevel){
			$levelName[] = $dataLevel['levelName'];
		}
		return $levelName;
	}
	
	public function checkLevelId($userId){
		$tabel = array(
				'user U',
				'level L',
				'userakses UA'
			);
		$fild = "L.levelId";
		$where = "UA.levelId=L.levelId AND UA.userId=U.userId AND U.userId='$userId'";
		$levelId = array();
		foreach($this->select($tabel, $fild, $where) as $dataLevel){
			$levelId[] = $dataLevel['levelId']."<br/>";
		}
		return $levelId;
	}
	
	public function levelAdmin($userId){
		$count = count($this->checkLevelName($userId));
		$level = $this->checkLevelName($userId);
		for($j=0; $j<$count; $j++){
			if($level[$j]=="administrator"){
				$l = $level[$j];
				break;
			}else{
				$l = $level[$j];
			}
		}
		return $l;
	}*/
	
	public function checkPassword($username,$oldPass){
		$tabel = "user";
		$fild = "userPassword";
		$where = "username='$username'";
		foreach($this->select($tabel, $fild, $where) as $data){}
		if($data['userPassword']=="$oldPass"){
			return true;
		}else{
			return false;
		}
	}
	
	// select nama collection
	public function collectionName($idCollection){
		$tabel = "product_collection";
		$fild = "collection_name";
		$where = "id_collection = '$idCollection'";
		foreach($this->select($tabel, $fild, $where) as $data){}
		$collection_name = $data['collection_name'];
		
		return $collection_name;
	}
}	
?>