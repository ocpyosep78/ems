<?php
	class Results_model extends CI_Model
	{
		function __construct()
	    {
	        parent::__construct();
	        $this->load->model('mysql_database_model');
	    }

	    public function get_result()
	    {
	    	$sql = 'CALL get_result()';
	    	$sQuery = $this->db->query($sql);
	    	$this->db->close();

	    	return $sQuery->result_array();
	    }

	    public function get_program_result($voter_prog_id)
	    {
	    	$sql = 'CALL get_program_result('.$voter_prog_id.')';
	    	$sQuery = $this->db->query($sql);
	    	$this->db->close();

	    	return $sQuery->result_array();
	    }
	 }
?>