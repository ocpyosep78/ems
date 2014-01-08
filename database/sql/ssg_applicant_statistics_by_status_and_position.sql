SELECT 	position.pos_name,
		SUM(election_candidate.pos_id AND division.div_id = 1 AND election_candidate.status = 0 ) AS Pending,
		SUM(election_candidate.pos_id AND division.div_id = 1 AND election_candidate.status = 1 ) AS Approved,
		SUM(election_candidate.pos_id AND division.div_id = 1 AND election_candidate.status = 2 ) AS Rejected,
		SUM(election_candidate.pos_id AND division.div_id = 1) AS Total

FROM position
RIGHT OUTER JOIN election_candidate ON position.pos_id = election_candidate.pos_id
LEFT OUTER JOIN division ON position.div_id = division.div_id
INNER JOIN election ON election_candidate.elect_id = election.elect_id


WHERE election.status = 1
GROUP BY position.pos_name
ORDER BY order_no ASC;