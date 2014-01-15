<script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=600,width=1200,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>


<div id="left_nav">
	<ul>
		<li><a href="<?php echo base_url(); ?>index.php/Home">Home</a></li>
		<li>Profile</li>
		<li><a href="<?php echo base_url(); ?>index.php/apply_candidacy">Apply for Candidacy</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/ballot">Ballot</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/ssg_applicant_list">Applicant List</a></li> 
		<li><a href="<?php echo base_url(); ?>index.php/set_applicant_party">Set Applicant Party</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/add_party">Add Party</a></li>
		<li><a href="JavaScript:newPopup('<?php echo base_url(); ?>index.php/results');">SSG Election Results</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/program_result">Program Election Results</a></li>
</div>

<div id="sub_container1">
<div id="sub_container2">