<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>資料列表</title>

	<?php $this->load->view('script_lib')?>
	<style type="text/css">
   		body {}	  		
	</style>
	<script>
		function delete_click(id)
		{
			if(confirm('確定要刪除資料？'))
			{
				//console.log(cc_or_cp);
				$.ajax({
				type: "POST", 
				url: "./delete_form",
				data:{
					id:id
				},
				success: function(){
					document.location.reload(true);
				},
				error: function(){
					alert("刪除失敗");
				}
							
				});
			}
		}

		function edit_click(id)
		{
			
  			$('#id').val(id);
  			document.forms["demo_form"].submit();
		}
	</script>
</head>
<body>	
	<div class="container" >
		<?php // Change the css classes to suit your needs    
			$attributes = array( 'id' => 'demo_form');
			echo form_open('form/edit_form',$attributes);
		?>
		 	<input type="hidden" name="id" id="id">
		<?php echo form_close();?>	

		<a href="<?php echo base_url("/form/create_form")?>" class="btn btn-info" role="button">新增資料</a>
		<div id='page_devider ' style='height: 15px;'></div>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th align="center" valign="middle">資料1</th>
					<th align="center" valign="middle">資料2</th>
					
					<th align="center" valign="middle">功能</th>
					
				</tr>
			</thead>
			<tbody>	
				<?php
					if(!empty($results))
					{
						foreach($results->result() as $row)
						{	
							?>
							<tr>
									<td  valign="middle"><?php echo $row->data1?></td>
									<td  valign="middle"><?php echo $row->data2?></td>
									<td  valign="middle">
										<img src="<?php echo base_url('/images/file_edit.png')?>" width="15px" height="15px" style="cursor:pointer;" title="編輯" onclick="edit_click(<?php echo $row->form_id?>)">&#160 
										<img src="<?php echo base_url('/images/file_delete.png')?>" width="15px" height="15px" style="cursor:pointer;" title="刪除" type="button" onclick="delete_click(<?php echo $row->form_id ?>)">&#160 
										
									</td>
							</tr>		
							<?php
						}
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>

	