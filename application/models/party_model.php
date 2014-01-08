<?php
	class Party_model extends CI_Model
	{
		function __construct()
	    {
	        parent::__construct();
	        $this->load->model('mysql_database_model');
	    }

	    public function get_party()
	    {
	    	$sql = 'CALL get_party()';
	    	$sQuery = $this->db->query($sql);
	    	$this->db->close();

	    	return $sQuery->result_array();
	    }

	    public function update_candidate_party($party_id, $candidate_id)
	    {
	    	$sql = 'CALL update_candidate_party('.$party_id.','.$candidate_id.')';
	    	$sQuery = $this->db->query($sql);
	    	$this->db->close();
	    }

	 }
?>