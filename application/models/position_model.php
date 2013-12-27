<?php
	class Position_model extends CI_Model
	{
		function __construct()
	    {
	        parent::__construct();
	    }

		public function get_list_of_position($division)
		{
			$division += 1;

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