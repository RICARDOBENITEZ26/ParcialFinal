<?php


/*if(file_exists('file.json'))
{	
	$filename = 'file.json';
	$data = file_get_contents($filename); //data read from json file
	print_r($data);  
	$users = json_decode($data);  //decode a data 
	
	print_r($users); //array format data printing
	 $message = "<h3 class='text-success'>JSON file data</h3>";
}else{
	 $message = "<h3 class='text-danger'>JSON file Not found</h3>";
	 
	 
	 
}*/

$ct = curl_init();
curl_setopt($ct, CURLOPT_URL, "http://localhost/rest-master-main/public/index.php/api/customers");
curl_setopt($ct, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ct, CURLOPT_HEADER, FALSE);
curl_setopt($ct, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$responserest = curl_exec($ct);
curl_close($ct);
$empleados = json_decode($responserest);


?>
<!DOCTYPE html>  
 <html>
<head>         
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
  <title>Read a JSON File</title>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<style>
#tbstyle {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

#tbstyle td, #tbstyle th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tbstyle tr:nth-child(even){background-color: #f2f2f2;}

#tbstyle tr:hover {background-color: #ddd;}

#tbstyle th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #859161;
  color: White;
}
</style>
      </head>
	  <body>  
	   <div class="container" style="width:500px;">  
	   <div class="table-container">
	   <?php  
			if(isset($empleados))  
			 {  
				  //echo $empleados;  
			  
			 ?>
		<table id="tbstyle">
			<tbody>
				<tr>
					<th>Id</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Phone</th>
					<th>Email</th>
				</tr>
				<?php foreach ($empleados as $user) { ?>
				<tr>
					<td> <?= $user->id; ?> </td>
					<td> <?= $user->first_name; ?> </td>
					<td> <?= $user->last_name; ?> </td>
					<td> <?= $user->phone; ?> </td>
					<td> <?= $user->email; ?> </td>
				</tr>
				<?php } 
			 }
			 else
				//echo $empleados; 
			 ?>
    </tbody>
</table>
</div>
</div>
</body>
</html>

<!--


