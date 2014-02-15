<div id="content_header">CHANGE POSITION</div>
<div id="body">
	<?php
		for($x=0;$x<count($page_view_data);$x++)
		{
			$options [$page_view_data[$x]['div_id']] = $page_view_data[$x]['div_name'];
		}

		$id = $elect_cand_id;
		echo form_open('ssg_applicant_list/select_position');
		echo form_dropdown('division', $options);
		echo form_hidden('elect_cand_id',$id);
		echo form_submit('mysubmit', 'Submit Option!');
		echo form_close();
		echo '</div>';
		echo '</div>';
	?>
	
</div>