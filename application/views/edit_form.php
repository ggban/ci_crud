<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>編輯資料</title>

	<?php $this->load->view('script_lib')?>

</head>
<?php // Change the css classes to suit your needs    

foreach($form_row->result() as $row){
		//$student_id=$row->student_id;
		$id=$row->form_id;
		$data_1=$row->data1;
		$data_2=$row->data2;
			}
?>
<body bgcolor="#E6E6FA">
<div class="container">
	<form role="form" id="form_data" class="form-horizontal" method="post" action=<?php echo base_url("form/edit_form");?> onSubmit="alert('編輯資料已上傳');" >
	<input type='hidden' value="<?php echo $id?>" name='id' />
	<div id='page_devider' style='height: 30px;'></div>
		  	<div class="form-group">
				<label>資料1<label>
		  	 	<input type="text" class="form-control  input-lg" id="data1" name="data_1" value="<?php echo $data_1?>" required >
		  	</div>
		  	<div class="form-group">
				<label>資料2<label>
		  	 	<input type="text" class="form-control  input-lg" id="data2" name="data_2" value="<?php echo $data_2?>" required >
		  	</div>
	<div id='page_devider' style='height: 30px;'></div>
	<div >
		<input  id="submit" type="submit" class="btn btn-info" value="儲存"> 
		<button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url("/form/form_menu")?>'">離開</button> 
	</div>	

  </form>
  	
</div>
</div>

</body>
</html>