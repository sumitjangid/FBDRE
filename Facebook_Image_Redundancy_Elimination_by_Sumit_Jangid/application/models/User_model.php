<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {
	private $fields = ['fb_id', 'name', 'email', 'pass', 'token', 'is_active', 'created'];
	public function __construct()
	{
		parent::__construct();
		$this->tableName = 'users';
	}

	public function register_fb_user($data = array()){
		$tosave = false;
		foreach($this->fields as $field){
			if(isset($data[$field])){
				$tosave = true;
				$this->db->set($field,$data[$field]);
			}
		}
		if($tosave){
			if(!isset($data['id'])){
				$this->db->set('is_active',true);
				$this->db->set('created',date('Y-m-d H;i:s'));
				$this->db->insert($this->tableName);
				return $this->db->insert_id();
			}else{
				$this->db->where('id',$data['id'])->update($this->tableName);
			}
		}
	}
	public function get_fb_user($fb_id = NULL){
		return $this->db->where('fb_id',$fb_id)->get($this->tableName)->row_array();
	}
}
