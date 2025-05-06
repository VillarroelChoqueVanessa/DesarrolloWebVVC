<?php include("conexion.php"); ?>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Fecha de Nacimiento</th>
            <th>Sexo</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM personas";
        $result = $con->query($sql);
        
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['nombres']."</td>";
            echo "<td>".$row['apellidos']."</td>";
            echo "<td>".$row['fecha_nacimiento']."</td>";
            echo "<td>".($row['sexo'] == 'M' ? 'Masculino' : 'Femenino')."</td>";
            echo "<td>".$row['correo']."</td>";
            echo "<td>
                    <button class='btn btn-sm btn-warning' onclick='editPerson(".$row['id'].")'>Editar</button>
                    <button class='btn btn-sm btn-danger' onclick='deletePerson(".$row['id'].")'>Eliminar</button>
                  </td>";
            echo "</tr>";
        }
        $con->close();
        ?>
    </tbody>
</table>
 