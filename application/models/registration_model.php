<?php
    class Registration_model extends CI_Model
    {
        public function select_course()
        {
            $query = $this->db->query("SELECT course_id, course_name FROM course");
            if($query->num_rows != 0)
            {
                $course = $query->result();  
            }
            return $course;
        }
        
        public function select_registered_voter()
        {
            $id = $this->input->get('id');
            $searched_record = $this->input->post('searched_record');
            
            $query = $this->db->query("SELECT a.acct_id, a.acct_username, a.acct_password, a.acct_fname, a.acct_mname, a.acct_lname,
                a.email_address, (SELECT course_name FROM course WHERE course_id = a.course_id) as course_id, a.acct_status,
                a.reg_status, a.time_date_log, (SELECT acct_type_name FROM account_type WHERE acct_type_id = a.acct_type_id) as
                acct_type_id FROM account a WHERE a.acct_username LIKE '".$searched_record."'  OR a.acct_id LIKE '".$id."'");
            if($query->num_rows() != 0)
            {
                $registered_voter = $query->result();
                return $registered_voter;
            }
        }
        
        public function create_member()
        {
            $new_member_insert_data = array(
              'course_id' => $this->input->post('course_id'),
              'acct_username' => $this->input->post('acct_username'),
              'acct_fname' => $this->input->post('acct_fname'),
              'acct_mname' => $this->input->post('acct_mname'),
              'acct_lname' => $this->input->post('acct_lname'),
              'email_address' => $this->input->post('email_address'),
              'acct_type_id' => 1,
              'time_date_log' => date("Y-m-d H:i:s")
            );
            
            $insert = $this->db->insert('account', $new_member_insert_data);
            return $insert;
        }
        
        public function validate()
        {
            $this->db->where('acct_username', $this->input->post('acct_username'));
            $this->db->where('acct_password', $this->input->post('acct_password'));
            
            $query = $this->db->get('account_admin');
            
            if($query->num_rows == 1)
            {
                return true;
            }
        }
        
        public function confirm_voter_registration()
        {
            $id = $this->input->get('id');
            $data = array('reg_status' => 1);
            $this->db->where('acct_id', $id);
            $this->db->update('account', $data);
        }
        
        public function generate_password()
        {
            $id = $this->input->get('id');
            $query = $this->db->query("SELECT CONCAT(day(time_date_log), hour(time_date_log), minute(time_date_log)) FROM account
            WHERE acct_id = '".$id."'");
            
             if($query->num_rows == 1)
            {
                $result = $query->result();
                return $result;
                
                /*for($x=0;$x<count($result);$x++)
                {
                    $data = array('acct_password' => $this->$result);
                    $this->db->where('acct_id', $id);
                    $this->db->update('account', $data);
                }*/
            }
        }
        
        public function print_login_info()
        {
            $acct_id = $this->input->get('id');
            $query = $this->db->query("SELECT acct_username, acct_password FROM account WHERE acct_id='".$acct_id."'");
            
            if($query->num_rows == 1)
            {
                $result = $query->result();
                return $result;
            }
            
        }
    }
?>