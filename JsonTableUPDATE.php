<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Actualizar Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }

        h1 {
            color: #859161;
        }

        /* Estilos para el formulario */
        form {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #859161;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        /* Estilos para la tabla de datos */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #859161;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1>Actualizar Cliente</h1>

    <!-- Formulario para ingresar el ID del cliente a actualizar -->
    <form action="JsonTableUPDATE.php" method="GET">
        <label for="id">ID del Cliente:</label>
        <input type="text" name="id" id="id">
        <input type="submit" value="Buscar Cliente">
    </form>

    <?php
    // Verifica si se ha proporcionado un ID de cliente
    if (isset($_GET['id'])) {
        $customerId = $_GET['id'];

        // Realiza una solicitud GET a la API REST para obtener los datos del cliente con el ID especificado
        $ct = curl_init();
        curl_setopt($ct, CURLOPT_URL, "http://localhost/rest-master/public/index.php/api/customer/update/$customerId");
        curl_setopt($ct, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ct, CURLOPT_HEADER, FALSE);
        curl_setopt($ct, CURLOPT_HTTPHEADER, array("Accept: application/json"));
        $response = curl_exec($ct);
        curl_close($ct);

        $customerData = json_decode($response);

        if ($customerData) {
    ?>
        <!-- Formulario para actualizar los datos del cliente -->
        <form action="procesar_actualizacion.php" method="post">
            <input type="hidden" name="id" value="<?php echo $customerId; ?>">
            
            <label for="first_name">Nombre:</label>
            <input type="text" name="first_name" id="first_name" value="<?php echo $customerData->first_name; ?>">
            
            <label for="last_name">Apellido:</label>
            <input type="text" name="last_name" id="last_name" value="<?php echo $customerData->last_name; ?>">
            
            <label for="phone">Teléfono:</label>
            <input type="text" name="phone" id="phone" value="<?php echo $customerData->phone; ?>">
            
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" value="<?php echo $customerData->email; ?>">
            
            <label for="address">Dirección:</label>
            <input type="text" name="address" id="address" value="<?php echo $customerData->address; ?>">
            
            <label for="city">Ciudad:</label>
            <input type="text" name="city" id="city" value="<?php echo $customerData->city; ?>">
            
            <label for="state">Estado:</label>
            <input type="text" name="state" id="state" value="<?php echo $customerData->state; ?>">
            
            <input type="submit" value="Actualizar Cliente">
        </form>
    <?php
        } else {
            echo "No se encontraron datos para el cliente especificado.";
        }
    }
    ?>
</body>
</html>
