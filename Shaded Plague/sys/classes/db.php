<?php
class DB {
	
	public static $I;
	private static $conn;
	private static $prepare;
	
	public function __construct(){
		try {
		  self::$conn = new PDO("mysql:host=localhost;port=3308;dbname=shaded_plague", 'root', '');
		  self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			
		}
	}
	
	public static function insert($array, $table, $replace=false){
		$sql												= ($replace == true) ? 'REPLACE INTO `'.$table.'`' : 'INSERT INTO `'.$table.'`';
		$columns											= '';
		$values												= '';
		foreach($array as $k=>$v){
			$columns										.= '`'.$k.'`,';
			$values											.= '\''.$v.'\',';
		}
		$sql												.= ' ('.rtrim($columns, ',').') VALUES ('.rtrim($values, ',').');';
		self::query($sql);
		return self::$conn->lastInsertId();
	}
	
	public static function getRecord($table, $where=[], $fields='*', $offset=0){
		$rec								= self::getRecords($table, $where, $fields, $offset, 1);
		if(isset($rec[0]))
			return $rec[0];
		return false;
	}
	
	public static function getRecords($table, $where=[], $fields='*', $offset=0, $limit=null){
		$where											= self::buildWhere($where);
		if($limit != null)
			$limit										= ' LIMIT '.$limit.' OFFSET '.$offset;
		self::query('SELECT '.$fields.' FROM `'.$table.'`'.$where.$limit);
		return self::$prepare->fetchAll(PDO::FETCH_ASSOC); 
	}
	
	// PRIVATE FUNCTIONS
	
	private static function query($sql){
		if(self::$I == null)
			self::$I = new DB();
		self::$prepare = self::$conn->prepare($sql);
		self::$prepare->execute();
	}
	
	private static function buildWhere($array){
		$where												= '';
		if(is_array($array) && !empty($array)){
			$where											= ' WHERE ';
			foreach($array as $k=>$v)
				$where										.= '`'.$k.'`=\''.$v.'\' AND ';
		}
		return rtrim($where, ' AND ');
	}
}