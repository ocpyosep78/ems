SELECT 	election_candidate.status,
		COUNT(election_candidate.status) AS TOTAL
 
FROM election_candidate
	LEFT OUTER JOIN election ON election_candidate.elect_id = election.elect_id

WHERE election.status = 1
GROUP BY election_candidate.status;