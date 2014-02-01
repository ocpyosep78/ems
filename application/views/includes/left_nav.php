<div id="nav">
	<ul>
		<li><a href="<?php echo base_url(); ?>index.php/Home">Home</a></li>
		<li><a href=#>Profile</a></li>
		<?php
			if(!$is_election_officer)
			{
				echo '<li><a href="'.base_url().'index.php/apply_candidacy">Apply for Candidacy</a></li>';
			}
		
			if(isset($election_schedule))
			{
				echo '<li><a href="'.base_url().'index.php/ballot">Ballot</a></li>';
			}

			// echo '<li><a href="'.base_url().'index.php/ballot">Ballot</a></li>';
		
			if($is_election_officer)
			{
				echo '<li><a href="'.base_url().'index.php/ballot">Ballot</a></li>'; // remove this line when election schedule is activated
				echo '<li><a href="'.base_url().'index.php/ssg_applicant_list">Applicant List</a></li>'; 
				echo '<li><a href="'.base_url().'index.php/set_applicant_party">Set Applicant Party</a></li>'; 
				echo '<li><a href="'.base_url().'index.php/add_party">Add Party</a></li>';
				echo '<li><a href="'.base_url().'index.php/results">SSG Election Results</a></li>'; // remove this line when election schedule is activated
				echo '<li><a href="'.base_url().'index.php/program_result">Program Election Results</a></li>'; // remove this line when election schedule is activated
			}

			if(isset($election_schedule))
			{
				echo '<li><a href="'.base_url().'index.php/results">SSG Election Results</a></li>';
				echo '<li><a href="'.base_url().'index.php/program_result">Program Election Results</a></li>';
			}
		?>
	</ul>
</div>

<div id="content">
<div id="sub_content">