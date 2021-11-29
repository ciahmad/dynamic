<!DOCTYPE html>
<html>
<head>
	<title>Dynamic Add Input field</title>

<!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
	 $(document).ready(function(){

	 	html='<tr><td><input class="form-control" type="text" name="textName[]"> </td><td><input class="form-control" type="text" name="textEmail[]"> </td><td><input type="text" class="form-control" name="textPhone[]"> </td><td><input class="form-control" type="text" name="textAdress[]" required> </td><td><input class="btn btn-danger" type="button" name="add" id="remove" value="remove"> </td></tr>';
	 	var max = 3;
	 	var x  = 1;
	 	$('#add').click(function(){
	 		if(x <= max){
	 			$('#table_field').append(html);
	 			x++;
	 		}
	 	});

	 	$('#table_field').on('click','#remove', function(){
	 		$(this).closest('tr').remove();
	 		x--;
	 	});


	 });
</script>
</head>
<body>
	
	
	
	<div class="container">

		<form action="" method="post" class="form-control" accept-charset="utf-8">
		
		
		<hr>

		
		<h1 class="text-center">Dynamic add input field & Insert Data</h1>
		<hr>
		<div class="input-field">
			<table class="table table-bordered" id="table_field">
				<caption>table title and/or explanatory text</caption>
				<tr>
					<th>Full Name</th>
					<th>E-mail</th>
					<th>Phone No</th>
					<th>Addrress</th>					
					<th>Add or Remove</th>					
				</tr>
				<?php
					$conn = mysqli_connect('localhost','root','','dbdymanic');
					if(isset($_POST['save'])) {
						$textName = $_POST['textName'];
						$textEmail = $_POST['textEmail'];
						$textPhone = $_POST['textPhone'];
						$textAdress = $_POST['textAdress'];
						foreach ($textName as $key => $value) {
							$save ="INSERT INTO users(`fullname`, `email`, `phone`, `address`)  VALUES('".$value."','".$textEmail[$key]."','".$textPhone[$key]."','".$textAdress[$key]."')";
							$query =mysqli_query($conn,$save);
							// $data=array(
							// 	'name'=>$textName,
							// 	'email'=>$textEmail[$key],
							// 	'phone'=>$textPhone[$key],
							// 	'address'=>$textAdress[$key],
							// ); 
							//print_r($data); die();

							
						}
						//print_r($save); die();
						
					}
				?>
				<tr>
					<td><input class="form-control" type="text" name="textName[]"> </td>
					<td><input class="form-control" type="text" name="textEmail[]"> </td>
					<td><input type="text" class="form-control" name="textPhone[]"> </td>
					<td><input class="form-control" type="text" name="textAdress[]" required> </td>
					<td><input class="btn btn-warning" type="button" name="add" id="add" value="Add"> </td>
				</tr>

				<!-- <thead>
					<tr>
						<th>header</th>
					</tr>
				</thead> -->
				<!-- <tbody>
					<tr>
						<td>data</td>
					</tr>
				</tbody> -->
			</table>
			<center><input class="btn btn-success" type="submit" name="save" id="save" value="save data"></center>
		</div>
		</form>
	</div>
	

</body>
</html>