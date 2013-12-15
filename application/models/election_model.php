<?php
    class election_model extends CI_Model
    {
        /*--------------------------------CONFIRM LOGIN-------------------------------------*/
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
        /*---------------------------------SELECT ADMIN ACCOUNT--------------------------------*/
        public function select_account()
        {
            $username = $this->input->post('acct_username');
            $password = $this->input->post('acct_password');
            
            $query = $this->db->query("SELECT acct_fname, acct_mname, acct_lname
                FROM account_admin WHERE acct_username LIKE '".$username."' AND
                acct_password LIKE '".$password."'");
            if($query->num_rows() != 0)
            {
                $result = $query->result();
                return $result;
            }
        }
        /*----------------------------------ADD ELECTION--------------------------------------*/
        public function add_sy()
        {
            $school_year = array('school_year' => $this->input->post('school_year'),
                                 'status' => 0);
            
            $insert = $this->db->insert('election', $school_year);
            return $insert;
        }
        
        public function select_sy()
        {
            $query = $this->db->query("SELECT elect_id, school_year, status FROM election ORDER BY school_year");
            if($query->num_rows != 0)
            {
                $result = $query->result();
                return $result;
            }
        }
        /*-----------------------------------SEARCH RECORD------------------------------------*/
        public function select_registered_voter_by_id()
        {
            $id = $this->input->get('id');
            $searched_record = $this->input->post('searched_record');
            
            $query = $this->db->query("SELECT a.acct_id, a.acct_username, a.acct_password, a.acct_fname, a.acct_mname, a.acct_lname,
                a.email_address, (SELECT course_name FROM course WHERE course_id = a.course_id) as course_id, a.acct_status,
                a.reg_status, a.time_date_log, (SELECT acct_type_name FROM account_type WHERE acct_type_id = a.acct_type_id) as
                acct_type_id FROM account a WHERE a.acct_username LIKE '".$searched_record."'  OR a.acct_id LIKE '".$id."'
                ORDER BY a.acct_username");
            if($query->num_rows() != 0)
            {
                $registered_voter = $query->result();
                return $registered_voter;
            }
        }
        
        public function select_registered_voter_by_lastname()
        {
            $id = $this->input->get('id');
            $searched_record = $this->input->post('searched_record');
            
            $query = $this->db->query("SELECT a.acct_id, a.acct_username, a.acct_password, a.acct_fname, a.acct_mname, a.acct_lname,
                a.email_address, (SELECT course_name FROM course WHERE course_id = a.course_id) as course_id, a.acct_status,
                a.reg_status, a.time_date_log, (SELECT acct_type_name FROM account_type WHERE acct_type_id = a.acct_type_id) as
                acct_type_id FROM account a WHERE a.acct_id LIKE '".$id."' OR a.acct_lname LIKE '".$searched_record."'
                ORDER BY a.acct_lname");
            if($query->num_rows() != 0)
            {
                $registered_voter = $query->result();
                return $registered_voter;
            }
        }
        /*--------------------------------------PARTY LIST-----------------------------------------*/
        public function select_party()
        {
            $query = $this->db->query("SELECT party_id, party_name, school_year FROM party ORDER BY school_year");
            if($query->num_rows != 0)
            {
                $result = $query->result();
                return $result;
            }
        }
        
        public function add_party()
        {
            $party = array('school_year' => $this->input->post('school_year'),
                                 'party_name' => $this->input->post('party_name'));
            
            $insert = $this->db->insert('party', $party);
            return $insert;
        }
        
        public function activate_election()
        {
            $id = $this->input->get('id');
            $data = array('status' => 1);
            $this->db->where('elect_id', $id);
            $this->db->update('election', $data);
            $data2 = array('status' => 0);
            $this->db->where('elect_id !=', $id);
            $this->db->update('election', $data2);
        }
    }
?>