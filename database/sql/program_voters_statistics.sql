SELECT program.prog_id,prog_code,prog_name ,

(SELECT count(*) FROM course WHERE program.prog_id=course.prog_id AND account.course_id = course.course_id AND program.prog_id=course.prog_id ) AS Voters


FROM election.program,election.course,account

;