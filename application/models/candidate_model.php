<?php
	class Candidate_model extends CI_Model
	{
		function __construct()
	    {
	        parent::__construct();
	    }

		public function check_existing_candidacy($account_id)
		{
			$sql = 'SELECT pos_id,
						   pos_name,
						   order_no 
					FROM position 
					WHERE div_id ='. $division .' ORDER BY order_no ASC';
			
			$sQuery = $this->db->query($sql);
			return $sQuery->result_array();
		}
	}

?>