<div id="content_header">CHANGE PARTY</div>
<div id="body">
	<?php
		for($x=0;$x<count($page_view_data);$x++)
		{
			$partylist[$page_view_data[$x]['party_id']] = $page_view_data[$x]['party_name'];
		}
		$partylist['selected'] = 'Select party';
		$partylist_attributes = array( 
									'id' 		=> 'myform',
									'method' 	=> 'post'
								);

		$hidden['ecid'] = $elect_cand_id;
		$id = $elect_cand_id;
		echo '<div id="applicant_container_label">Party: </div>';
		echo '<div>';
		echo form_open('add_party/update_party',$partylist_attributes,$hidden);
		echo form_dropdown('party', $partylist,'selected');
		echo form_hidden('elect_cand_id',$id);
		echo form_submit('mysubmit', 'Change Party');
		echo form_close();
	?>
	
</div>