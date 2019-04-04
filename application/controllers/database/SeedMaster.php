<?php
/**
 * Created by PhpStorm.
 * User: random
 * Date: 24/03/19
 * Time: 9:03
 */
use Master\Area as Area;
use Master\StoreProcedure as StoreProcedure;
require 'StoreProcedure.php';
require 'Area.php';

class SeedMaster extends CI_Controller{
//	private $procedure = new StoreProcedure();
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		//Do your magic here
	}
	public function area(){
		$newArea = new Area();
		//insert negara
		$negara = array('id_negara'=>'1','nama_negara'=>'Indonesia');

		$this->db->insert('tb_negara',$negara);

		echo 'sukses import negara ';

		$provinsi = $newArea->Provinsi();
		foreach ($provinsi as $prov){
			$data['id_provinsi'] = $prov[0];
			$data['id_negara'] = 1;
			$data['nama_provinsi'] = $prov[1];
			$this->db->insert('tb_provinsi',$data);
		}
		echo 'sukses import provinsi ';
		$data = [];
		$kabupaten = $newArea->Kabupaten();
		foreach ($kabupaten as $kab){
			$data['id_kab_kota'] = $kab[0];
			$data['id_provinsi'] = $kab[1];
			$data['nama_kab_kota'] = $kab[2];
			$this->db->insert('tb_kabupaten_kota',$data);
		}
		echo 'sukses import kabupaten ';
		$data = [];
		$kecamatan = $newArea->Kecamatan();
		foreach ($kecamatan as $kec){
			$data['id_kecamatan'] = $kec[0];
			$data['id_kab_kota'] = $kec[1];
			$data['nama_kecamatan'] = $kec[2];
			$this->db->insert('tb_kecamatan',$data);
		}
		echo 'sukses import kecamatan ';

	}
	public function programstudi(){
		$procedure = new StoreProcedure();
		$procedure->table = 'tb_program_studi';
		$procedure->storeName = 'store_program_studi';
		$parameter = array(
			array('name'=>'id',
					'type'=>'varchar(50)'),
			array('name'=>'program',
					'type'=>'varchar(100)')
		);
		//drop if store already exist
		$get = $procedure->checkStore();
		foreach ($get->result() as $res){
			if(isset($res->Name) && $res->Name == $procedure->storeName){
				$procedure->dropStore($procedure->storeName);
			}
		};
		if($procedure->createStore($parameter)){
//			echo 'success create store';
			$prody = array_map('str_getcsv',file(APPPATH.'controllers/database/csv/prodi.csv'));
			foreach ($prody as $prod){
				$implodePrody = implode(",",$prod);
				//do insert with store already created
				$issuccess = $this->db->query('CALL '.$procedure->storeName.'('.$implodePrody.')');
				if($issuccess){
					echo 'success import';
				}
				else{
					echo $this->db->errors();
				}
			}
			//when create store procedure are success then
		}
	}
	public function pangkat(){
		$procedure = new StoreProcedure();
		$procedure->table = 'tb_pangkat_golongan';
		$procedure->storeName = 'store_pangkat';
		$parameter = array(
			array('name'=>'id',
				'type'=>'varchar(30)'),
			array('name'=>'golongan',
				'type'=>'varchar(100)')
		);
		//drop if exist
		$get = $procedure->checkStore();
		foreach ($get->result() as $res){
			if(isset($res->Name) && $res->Name == $procedure->storeName){
				$procedure->dropStore($procedure->storeName);
			}
		};
		if ($procedure->createStore($parameter)){
			$pangkat = array_map('str_getcsv',file(APPPATH.'controllers/database/csv/angkutan.csv'));
			foreach ($pangkat as $pang) {
				$implodePangkat = implode(',',$pang);
				$issuccess = $this->db->query('CALL '.$procedure->storeName.' ('.$implodePangkat.')');
				if($issuccess){
					echo 'success import Pangkat';
				}
				else{
					echo $this->db->errors;
				}
			}
		}

		
	}
	public function angkutan(){
		$procedure = new StoreProcedure();
		$procedure->table = 'tb_angkutan';
		$procedure->storeName = 'store_angkutan';
		$parameter = array(
			array('name'=>'id',
					'type'=>'varchar(30)'),
			array('name'=>'angkutan',
					'type'=>'varchar(100)')
		);
		//drop store if exist
		//drop if exist
		$get = $procedure->checkStore();
		foreach ($get->result() as $res){
			if(isset($res->Name) && $res->Name == $procedure->storeName){
				$procedure->dropStore($procedure->storeName);
			}
		};
		if($procedure->createStore($parameter)){
			$angkutan = array_map('str_getcsv',file(APPPATH.'controllers/database/csv/angkutan.csv'));
			foreach ($angkutan as $ang){
				$implodeAngkutan = implode(',',$ang);
				$issuccess = $this->db->query('CALL '.$procedure->storeName.' ('.$implodeAngkutan.')');
				if($issuccess){
					echo 'success import Angkutan';
				}
				else{
					echo $this->db->errors;
				}
			}
		}
	}

}
