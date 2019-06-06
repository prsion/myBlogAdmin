<?php

class Dbh {

  /**
   * Dbh constructor.
   */
  public function __construct(){
				$this->connect();
		}

		/**
		 *  function connect
		 *  return void
		 */
    private function connect()
    {
				$config = require 'config.php';

        $dsn= 'mysql:host=' .$config ['host'].'; dbname=' . $config ['dbname']. '; charset=' .$config ['charset'];
				$this->pdo = new PDO($dsn, $config ['user'], $config ['password']);
				return $this;
    }



  public function closeConnection()
    {
        $this->pdo = "null";
    }


		/**
		 *  function prepare
		 *
		 * param [type] $sql
		 * return void
		 */

		public function prepare($sql){

			$sth=$this->pdo->prepare($sql);
			return $sth;
		echo 'function Prepare SQL ';
	}


/**
 *  function count number of records in SQL
 *
 * param [type] $sql
 * return void
 */
		public function count($sql){

			$sth=$this->pdo->prepare($sql);
			$sth->execute();
			$result=$sth->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $key=>$val) {
				$result = $val['id'];
			}
			if($result===false){
					return[];
			}
			return $result;
		}



/**
 * function update
 *
 * param [type] $sql
 * return void
 */
		public function update($sql){
			$sth=$this->pdo->prepare($sql);
			$sth->execute();
			$result=$sth->fetchAll(PDO::FETCH_ASSOC);

			if($result===false){
					return[];
			}
			return $result;
		}






/**
 *  function insert
 *
 * param [type] $sql
 * param [type] $taValues
 * return void
 */
		public function insert($sql, $taValues){
	
			$sth=$this->pdo->prepare($sql);
			foreach ($taValues as $k=>$v){

				$sth->bindValue(':'.$k,$v);

			} // foreach
			$sth=$sth->execute();
			return $sth;
			echo 'function insert SQL ';
		}


  /**
   * @param $sql
   * @return array
   */
  public function queryCol($sql){

    $sth=$this->pdo->prepare($sql);
    $sth->execute();
    $result=$sth->fetchAll(PDO::FETCH_COLUMN);

    if($result===false){
      return[];
    }
    return $result;
  }




/**
 * SELECT ALL - query completely down
 *
 * #param [type] $sql
 * #return array
 */
		public function query($sql){

			$sth=$this->pdo->prepare($sql);
			$sth->execute();
			$result=$sth->fetchAll(PDO::FETCH_ASSOC);

			if($result===false){
					return[];
			}
			return $result;
		}


		/**
		 *  definition fields in tables
		 * 
		 */
		
		/*
		function pdoSet($allowed, &$values, $source = array()) {
			$set = '';
			$values = array();
			if (!$source) $source = &$_POST;
			foreach ($allowed as $field) {
				if (isset($source[$field])) {
					$set.="`".str_replace("`","``",$field)."`". "=:$field, ";
					$values[$field] = $source[$field];
				}
			}
			return substr($set, 0, -2);
		}
			*/




	}

