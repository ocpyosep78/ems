SELECT position.pos_name,
SUM(election_candidate.pos_id AND position.div_id = 1 AND election_candidate.status = 0 AND program.prog_id = 1 ) AS Pending,
SUM(election_candidate.pos_id AND position.div_id = 1 AND election_candidate.status = 1 AND program.prog_id = 1) AS Approved,
SUM(election_candidate.pos_id AND position.div_id = 1 AND election_candidate.status = 2 AND program.prog_id = 1) AS Rejected,
SUM(election_candidate.pos_id AND position.div_id = 1 AND program.prog_id = 1) AS Total

FROM position

LEFT OUTER JOIN election_candidate ON position.pos_id = election_candidate.pos_id
INNER JOIN division ON position.div_id = division.div_id  AND position.div_id = 1
LEFT OUTER JOIN election ON election_candidate.elect_id = election.elect_id AND election.status = 1
LEFT OUTER JOIN account ON election_candidate.acct_id = account.acct_id
LEFT OUTER JOIN course ON account.course_id = course.course_id
LEFT OUTER JOIN program ON course.prog_id = program.prog_id 



GROUP BY position.pos_name
ORDER BY pos_name ASC;