<?php
	class Voter_model extends CI_Model
	{

		function __construct()
	    {
	        parent::__construct();
			$this->load->model('mysql_database_model');

	    }

	    public function check_voter_login($username, $userpass)
	    {
	    	$sql = "CALL check_login_details('".$username."','".$userpass."')";
			$sQuery = $this->db->query($sql);
				
			return $sQuery->row_array(1);	
	    }

		public function get_voter_statistics()
		{
			$sql = 'CALL get_voter_statistics()';
			$sQuery = $this->db->query($sql);
				
			return $sQuery->result_array();
		}
	}

?>