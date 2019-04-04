<?php
namespace Master;
class Area{
	function Negara(){
		return "INSERT INTO tb_negara values ('1','Indonesia')";
	}
	function Provinsi(){
		$provinsi = array_map('str_getcsv',file(APPPATH.'controllers/database/csv/provinces.csv'));
//		var_dump('hello');
		return $provinsi;
	}
	function Kabupaten(){
		$kab = array_map('str_getcsv',file(APPPATH.'controllers/database/csv/regencies.csv'));
		return $kab;
	}
	function Kecamatan(){
		$kec = array_map('str_getcsv',file(APPPATH.'controllers/database/csv/districts.csv'));
		return $kec;
	}
}
