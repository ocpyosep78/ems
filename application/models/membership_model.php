<?php
    class Membership_model extends CI_Model
    {
        public function validate()
        {
            $this->db->where('acct_id', $this->input->post('acct_id'));
            $this->db->where('acct_password', $this->input->post('acct_password'));
            $this->db->where('acct_status', 1);
            $this->db->where('reg_status', 1);
            $query = $this->db->get('account');
            
            if($query->num_rows == 1)
            {
                return true;
            }
        }
        
        public function create_member()
        {
            $new_member_insert_data = array(
              'course_id' => $this->input->post('course_id'),
              'acct_id' => $this->input->post('acct_id'),
              'acct_fname' => $this->input->post('acct_fname'),
              'acct_mname' => $this->input->post('acct_mname'),
              'acct_lname' => $this->input->post('acct_lname'),
              'email_address' => $this->input->post('email_address'),
              'acct_type_id' => 1,
              'time_date_log' => 'now()'
            );
            
            $insert = $this->db->insert('account', $new_member_insert_data);
            return $insert;
        }
        
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
            $query = $this->db->query("SELECT a.acct_id, a.acct_password, a.acct_fname, a.acct_mname, a.acct_lname,
                a.email_address, (SELECT course_name FROM course WHERE course_id = a.course_id) as course_id, a.acct_status,
                a.reg_status, a.time_date_log, (SELECT acct_type_name FROM account_type WHERE acct_type_id = a.acct_type_id) as
                acct_type_id FROM account a");
            if($query->num_rows() != 0)
            {
                $registered_voter = $query->result();
            }
            return $registered_voter;
        }
        
        public function delete_record()
        {
            $acct_id = array('acct_id' => $this->input->get('id'));
            $delete = $this->db->delete('account', $acct_id);
            return $delete;
        }
        
        public function activate_acct()
        {
            $data = array('acct_status' => 1);
            $this->db->where('acct_id', $this->input->get('id'));
            $this->db->update('account', $data); 
        }
        
        public function deactivate_acct()
        {
            $data = array('acct_status' => 0);
            $this->db->where('acct_id', $this->input->get('id'));
            $this->db->update('account', $data);
        }
        
        public function confirm_voter_registration()
        {
            $data = array('reg_status' => 1);
            $this->db->where('acct_id', $this->input->get('id'));
            $this->db->update('account', $data);
        }
    }
    
?>