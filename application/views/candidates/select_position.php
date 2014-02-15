<div id="content_header">CHANGE POSITION</div>
<div id="body">
	<?php
		for($x=0;$x<count($page_view_data);$x++)
		{
			$options [$page_view_data[$x]['pos_id']] = $page_view_data[$x]['pos_name'];
		}

		$id = $elect_cand_id;
		echo form_open('candidacy/update_position');
		echo form_dropdown('position', $options);
		echo form_hidden('elect_cand_id',$id);
		echo form_submit('mysubmit', 'Change Position');
		echo form_close();
		echo '</div>';
		echo '</div>';
	?>
	
</div>