<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detalle de Empleado</title>
    <style>
        .container {
            width: 500px;
            margin: 0 auto;
            text-align: center;
        }

        h1 {
            color: #859161;
        }

        form {
            margin: 20px 0;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalle de Empleado</h1>
        <form action="JsonTableDelete.php" method="GET">
            <label for="id">ID del Cliente a Eliminar</label>
            <input type="text" name="id" id="id">
            <input type="submit" value="Ver Detalles">
        </form>

        <?php
        // Verifica si se ha proporcionado un ID de cliente
        if (isset($_GET['id'])) {
            $customerId = $_GET['id'];

            // Realiza una solicitud DELETE a la API REST para eliminar el cliente con el ID especificado
            $ct = curl_init();
            curl_setopt($ct, CURLOPT_URL, "http://localhost/rest-master/public/index.php/api/customer/delete/$customerId");
            curl_setopt($ct, CURLOPT_CUSTOMREQUEST, "DELETE"); // Usamos DELETE en lugar de GET
            curl_setopt($ct, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ct, CURLOPT_HEADER, FALSE);
            curl_setopt($ct, CURLOPT_HTTPHEADER, array("Accept: application/json"));
            $response = curl_exec($ct);
            curl_close($ct);

            // Analiza la respuesta JSON de la API
            $responseData = json_decode($response);

            if (isset($responseData->notice->text)) {
                echo "Cliente eliminado: " . $responseData->notice->text;
            } else {
                echo "No se pudo eliminar el cliente. Asegúrate de que el ID sea válido.";
            }
        }
        ?>
    </div>
</body>
</html>
