<?php
$servidor = "fdb1028.awardspace.net";
$usuario = "3600452_test";
$password = "potatosMaximus-13";
$base_datos = "3600452_test";

// Crear conexión
$conn = new mysqli($servidor, $usuario, $password, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida - ERROR de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM Alumnos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabla desde MySQL</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>
<body>
    <table id="miTabla" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Sexo</th>
                <th>Calificaion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>'.$row["Id"].'</td>';
                    echo '<td>'.$row["Nombre"].'</td>';
                    echo '<td>'.$row["Sexo"].'</td>';
                    echo '<td>'.$row["Cal"].'</td>';
                    echo '</tr>';
                }
            }
            $conn->close();
            ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
    $(document).ready(function() {
        $('#miTabla').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
            }
        });
    });
    </script>
</body>
</html>
