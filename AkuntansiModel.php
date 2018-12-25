<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AkuntansiModel extends CI_Model{
    private $table_akun='akun';
	private $table_coa='coa';
	private $table_jurnal='jurnal';
	private $table_jurnaldet='jurnal_detail';
	private $akunbaru = 'akunbaru';


	public function getAkunlist(){
		$sql="SELECT id,parent_id, kode_akun, nama_akun FROM ".$this->akunbaru." WHERE parent_id=0";
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	
	public function listAkun($id){
		$sql="SELECT id,parent_id, kode_akun, nama_akun, nama_properti FROM akunbaru WHERE parent_id=?";
		if ($query=$this->db->query($sql,$id)){
			foreach($query->result() as $row){
				$i=0;
				if ($i==0){
					echo "<ul>";
				}
				echo "<li>".$row->kode_akun." ".$row->nama_akun;
				$this->listAkun($row->id);
				echo "</li>";
				$i++;
				if ($i>0){
					echo "</ul>";
				}
			}
		}
	}
}
?>