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
    <div class="container" style="width:500px;">
        <h1>Detalle de Empleado</h1>
        <form action="JsonTableID.php" method="GET">
            <label for="id">ID del Cliente:</label>
            <input type="text" name="id" id="id">
            <input type="submit" value="Ver Detalles">
        </form>

        <?php
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $customerId = $_GET['id'];

            // Realiza una solicitud a tu API REST para obtener los datos del cliente con el ID especificado
            $ct = curl_init();
            curl_setopt($ct, CURLOPT_URL, "http://localhost/rest-master-main/public/index.php/api/customer/$customerId");
            curl_setopt($ct, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ct, CURLOPT_HEADER, FALSE);
            curl_setopt($ct, CURLOPT_HTTPHEADER, array("Accept: application/json"));
            $response = curl_exec($ct);
            curl_close($ct);

            $customerData = json_decode($response);

            if ($customerData) {
            ?>
                <!-- Mostrar detalles del cliente -->
                <table>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                    </tr>
                    <tr>
                        <td><?= $customerData->id; ?></td>
                        <td><?= $customerData->first_name; ?></td>
                        <td><?= $customerData->last_name; ?></td>
                        <td><?= $customerData->phone; ?></td>
                        <td><?= $customerData->email; ?></td>
                    </tr>
                </table>
            <?php
            } else {
                echo "No se encontró un empleado válido con el ID proporcionado.";
            }
        }
        ?>
    </div>
</body>
</html>
