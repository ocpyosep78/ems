SELECT elect_cand_id, acct_lname, acct_fname, acct_mname, pos_name

FROM election_candidate
INNER JOIN election ON election_candidate.elect_id = election.elect_id
INNER JOIN position ON election_candidate.pos_id = position.pos_id
INNER JOIN account ON election_candidate.acct_id = account.acct_id

WHERE party_id IS NULL
AND election.status = 1
AND position.div_id = 1