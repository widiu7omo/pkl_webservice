<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 25/03/19
 * Time: 11:01
 */

namespace Master;
class StoreProcedure extends \CI_Controller
{
	public $table = NULL;
	public $storeName = NULL;
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		//Do your magic here
	}

	/**
	 * @param $data
	 * @param bool $withtype
	 * @return string
	 * impolodeArray is to implode array that provided to be parameters of database procedure
	 */
	public function implodeArray($data, $withtype = true){
		return implode(',',array_map(function($entry) use($withtype){
			if($withtype){
				return $entry['name'].' '.$entry['type'];
			}
			else{
				return $entry['name'];
			}
		},$data));
	}

	/**
	 * @param $paramater
	 * array two dimension
	 * array(array(key=>value))
	 * make database store procedure dynamically
	 * @return boolean
	 */
	public function createStore($paramater){
		$implodeParam = $this->implodeArray($paramater);
		$implodeValues = $this->implodeArray($paramater,false);
		return $this->db->query('CREATE PROCEDURE '.$this->storeName.'('.$implodeParam.') begin insert into '.$this->table.' values('.$implodeValues.'); end');
	}

	/**
	 * @param null $name
	 * @return mixed
	 */
	public function dropStore($name = NULL){
		return $this->db->query('DROP PROCEDURE '.$name);
	}
	public function checkStore(){
		return $this->db->query('SHOW PROCEDURE STATUS WHERE Db = ? ',$this->db->database);
	}

}
