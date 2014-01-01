<?php
	class Candidate_model extends CI_Model
	{
		function __construct()
	    {
	        parent::__construct();

	        $config['hostname'] = "localhost";
			$config['username'] = "root";
			$config['password'] = "root";
			$config['database'] = "election";
			$config['dbdriver'] = "mysql";
			$config['dbprefix'] = "";
			$config['pconnect'] = FALSE;
			$config['db_debug'] = TRUE;
			$config['cache_on'] = FALSE;
			$config['cachedir'] = "";
			$config['char_set'] = "utf8";
			$config['dbcollat'] = "utf8_general_ci";

			$this->load->database($config);
	    }

		public function check_existing_candidacy($account_id)
		{
			$sql = 'SELECT pos_id,pos_name,order_no FROM position 
					WHERE div_id ='. $division .' ORDER BY order_no ASC';
			
			$sQuery = $this->db->query($sql);
			return $sQuery->result_array();
		}
	}

?>