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
curl_setopt($ct, CURLOPT_URL, "http://localhost/rest-master-main/public/index.php/api/customers/add");
curl_setopt($ct, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ct, CURLOPT_HEADER, FALSE);
curl_setopt($ct, CURLOPT_HTTPHEADER, array("Accept: application/json"));
$responserest = curl_exec($ct);
curl_close($ct);
$empleados = json_decode($responserest);


?>
<!DOCTYPE html>  
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Agregar Cliente</title>
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

        #tbstyle tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #tbstyle tr:hover {
            background-color: #ddd;
        }

        #tbstyle th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #859161;
            color: white;
        }
    </style>
</head>
<body>
    <h1 style="color: #859161;">Agregar Cliente</h1>

    <form action="http://localhost/rest-master-main/public/index.php/api/customer/add" method="post">
        <table id="tbstyle">
            <tr>
                <th>Campos</th>
                <th>Valores</th>
            </tr>
            <tr>
                <td><label for="first_name">Nombre:</label></td>
                <td><input type="text" name="first_name" id="first_name"></td>
            </tr>
            <tr>
                <td><label for="last_name">Apellido:</label></td>
                <td><input type="text" name="last_name" id="last_name"></td>
            </tr>
            <tr>
                <td><label for="phone">Teléfono:</label></td>
                <td><input type="text" name="phone" id="phone"></td>
            </tr>
            <tr>
                <td><label for="email">Correo Electrónico:</label></td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td><label for="address">Dirección:</label></td>
                <td><input type="text" name="address" id="address"></td>
            </tr>
            <tr>
                <td><label for="city">Ciudad:</label></td>
                <td><input type="text" name="city" id="city"></td>
            </tr>
            <tr>
                <td><label for="state">Estado:</label></td>
                <td><input type="text" name="state" id="state"></td>
            </tr>
        </table>
        <br>
        <input type="submit" value="Agregar Cliente" style="background-color: #859161; color: white; border: none; padding: 10px 20px; cursor: pointer;">
    </form>
</body>
</html>
