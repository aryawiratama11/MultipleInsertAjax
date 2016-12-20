<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript">
	var counter=1;
		//Add fields using jquery
		$(document).ready(function() {
			var maxField = 10; //Input fields increment limitation
			var wrapper = $('#TextBoxesGroup'); //Input field wrapper
			//var counter = 2;
			$('.add-fields').click(function(){

				var sid = '<div><label>Enter Student Id '+ counter + ' </label><input type="text" name="sid[]" id="sid[]" value=""/></div><br>'; //New input field html
				var sname = '<div><label>Enter Student Name '+ counter + ' </label><input type="text" name="sname[]" id="sname[]" value=""/></div><br>'; //New input field html

				if (counter < maxField) { //Check maximum number of input fields
					counter++;
					$('#count').val(counter);
					$(wrapper).append(sid); // Add field html
					$(wrapper).append(sname); // Add field html
				}
			});
		});

	$(document).ready(function() {
		$(".insert-all").click(function () {
			var serial=$('#studForm').serialize();
			console.log(serial);

			jQuery.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "Welcome/insert_all",
				dataType: 'json',
				data : $('#studForm').serialize(),
				success: function (res)
				{
					$.each(res,function (i,val) {
						var rowdata = "<tr><td>" + val.sid + "</td><td>" + val.sname + "</td></tr>";
						$("table tbody").append(rowdata);
					})
				}
			});
		});
	});
		</script>
</head>
<body>

	<h1>Welcome to CodeIgniter!</h1>
		<form action="" method="post" id="studForm">
		<div id="TextBoxesGroup">
		<input type="hidden" value="1" name="count" id="count">
		<label>Enter Student Id 1: </label>
		<input type="text" id="sid[]" name="sid[]"><br><br>
		<label>Enter Student Name 1: </label>
		<input type="text" id="sname[]" name="sname[]"><br><br>
		</div>
		<input type="submit" value="Submit"><br>
		<input type="button" class="add-fields" value="Add Fileds"><br>
		<input type="button" class="insert-all" value="Insert All"><br>
		</form>
				<table border="2">
					<thead>
					<tr>
						<td>Student Id</td>
						<td>Student Name</td>
					</tr>
					</thead>
					<tbody>
					<?php
					foreach($Students as $student){?>
					<tr>
						<td><?=$student->sid;?></td>
						<td><?=$student->sname;?></td>
					</tr>
					<?php } ?>
					</tbody>
				</table>
</body>
</html>