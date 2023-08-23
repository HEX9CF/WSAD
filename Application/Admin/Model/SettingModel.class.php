<?php
namespace Admin\Model;
use Think\Model;
class SettingModel extends Model{
	function getall(){
		$data = $this->select();
		$result = array();
		foreach( $data as $row ){
			$result[ $row['key'] ] = $row['val'];
		}
		return $result;
	}

	function cname_getall(){
		$data = $this->select();
		$result = array();
		foreach( $data as $row ){
			$result[ $row['cname'] ] = $row['val'];
		}
		return $result;
	}

}


?>