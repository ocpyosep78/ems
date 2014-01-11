<?php
	class Ballot_model extends CI_Model
	{
		function __construct()
	    {
	        parent::__construct();
	        $this->load->model('mysql_database_model');
	    }

	    public function submit_vote($acct_id, $candidate_id)
	    {
	    	$sql = "CALL insert_vote('".$acct_id."','".$candidate_id."')";
	    	$sQuery = $this->db->query($sql);
	    	$this->db->close();

	    	return $sQuery->result_array();
	    }
	 }
?>