SELECT 	program.prog_id,
		program.prog_name,
		SUM(election_candidate.pos_id AND division.div_id = 1 AND election_candidate.status = 0 ) AS Pending,
		SUM(election_candidate.pos_id AND division.div_id = 1 AND election_candidate.status = 1 ) AS Approved,
		SUM(election_candidate.pos_id AND division.div_id = 1 AND election_candidate.status = 2 ) AS Rejected,
		SUM(election_candidate.pos_id AND division.div_id = 1) AS Total

FROM election.program

		
LEFT OUTER JOIN course ON program.prog_id = course.prog_id
LEFT OUTER JOIN account ON course.course_id = account.course_id
LEFT OUTER JOIN election_candidate ON account.acct_id = election_candidate.acct_id
LEFT OUTER JOIN election ON election_candidate.elect_id = election.elect_id
LEFT OUTER JOIN position ON election_candidate.pos_id = position.pos_id
LEFT OUTER JOIN division ON position.div_id = division.div_id


GROUP BY program.prog_name
ORDER BY prog_id ASC
;