SELECT election_candidate.elect_cand_id,
	position.pos_name AS Position,
	program.prog_name AS Program,
	account.acct_lname AS Last_Name,
	account.acct_fname AS First_Name
FROM account
INNER JOIN election_candidate ON account.acct_id = election_candidate.acct_id
INNER JOIN position ON election_candidate.pos_id = position.pos_id
INNER JOIN election ON election_candidate.elect_id = election.elect_id
INNER JOIN course ON account.course_id = course.course_id
INNER JOIN program ON course.prog_id = program.prog_id
WHERE election.status = 1
AND position.div_id = 3
AND program.prog_id = 3
OR position.div_id = 2
ORDER BY position.order_no ASC;