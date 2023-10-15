<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Operaciones de Empleados</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }
        h1 {
            color: #859161;
        }
        .container {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
        }
        .operation {
            width: 200px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f2f2f2;
            margin: 10px;
            text-align: center;
        }
        a {
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Operaciones de Empleados</h1>

    <div class="container">
        <div class="operation">
            <a href="JsonTable.php">Ver Todos los Empleados</a>
        </div>
        <div class="operation">
            <a href="JsonTableID.php">Ver un Empleado por ID</a>
        </div>
        <div class="operation">
            <a href="JsonTableUPDATE.php">Actualizar Empleado</a>
        </div>
        <div class="operation">
            <a href="JsonTableADD.php">Agregar Empleado</a>
        </div>
        <div class="operation">
            <a href="JsonTableDELETE.php">Eliminar Empleado</a>
        </div>
    </div>
</body>
</html>
