<?php

class candidacy_model extends CI_Model
    {
        /*--------------------------------Candidacy-------------------------------------*/
        public function candidacy()
        {
            
            $q = $this->db->query("INSERT INTO online_voting.election_candidate(acct_id,pos_id,elect_id)
VALUES(
	(SELECT election_voter.acct_id 
		FROM online_voting.election_voter,online_voting.election 
			WHERE election.status = 1 
			AND election_voter.elect_id = election.elect_id
			AND election_voter.acct_id  = 3),1,
	(SELECT election.elect_id 
		FROM online_voting.election 
			WHERE election.status = 1));

SELECT * FROM online_voting.election_candidate;;")
            
            if($q->num_rows != 0)
            {
                $program = $q->result();  
            }
            return $program;
        }
/*---------------endCandidacy---------------------------------*/
?>