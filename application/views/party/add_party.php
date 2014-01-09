<h1>Add Party</h1>
<div id="body">

	<table>
		<tr>
			<th>Party List</th>
		</tr>
		<?php
			for($x=0;$x<count($page_view_data);$x++)
			{
				$party_name = 	$page_view_data[$x]['party_name'];

				echo '<tr>';
				echo '<td>'.$party_name.'</td>';
				echo '</tr>';
			}
		?>
	</table>
	
	<?php
	
		$attributes = array( 
							'id' 		=> 'myform',
							'method' 	=> 'post'
							);

		$this->load->helper('url');
		$this->load->helper('form');

		echo "<br />";
		echo form_open('add_party/insert_party',$attributes);
		echo form_input('pt_name', '', 'placeholder="Party Name"');
		echo form_submit('mysubmit', 'Add');
		echo form_close();
	?>
	
</div>