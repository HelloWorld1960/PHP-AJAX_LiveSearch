<?php
header("Content-Type: text/html;charset=utf-8");
include('conexion.php');

$query  = "SELECT * FROM t_libros ORDER BY ID_Libro";
$salida = "";

/*isset() comprueba si una variable esta definida y no es NULL. */
if (isset($_POST['consulta'])) { //Si es que la consulta existe, entonces ...
    /*mysqli_real_escape_string() escapa caracteres especiales de una cadena para su uso en una instruccion SQL. */
    $q     = $conexion->real_escape_string($_POST['consulta']);
    /*Like se usa para hallar coincidencias dentro de una cadena bajo un patron dado.
     *'%".$q."%' indica que si $q coincide en cualquier posicion de dicha consulta. */
    $query = "SELECT ID_Libro,Titulo,Autor,Editorial FROM t_libros WHERE
               Titulo LIKE '%" . $q . "%' OR
               Autor LIKE '%" . $q . "%' OR
               Editorial LIKE '%" . $q . "%' ";
} else {
    /*echo "</br>Not succesfull";*/
}

/*Enviamos la consulta a la base de datos.
 *$resultado extrae toda la informacion de la tabla t_libros. */
$resultado = $conexion->query($query);

/*Evaluamos si es que se encuantran resultados*/
if ($resultado AND $resultado->num_rows > 0) {
    /*si num_rows es mayor a cero, significa que si encontro filas*/
    $salida .= "<table class='tablesorter table table-hover tabla_datos' id='myTable'>
                <thead>
                  <tr>
                    <th>ID#</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Editorial</th>
                  </tr>
                </thead>
              <tbody>";
    while ($fila = $resultado->fetch_assoc()) {
        $salida .= "<tr>
                  <td>" . $fila['ID_Libro'] . "</td>
                  <td>" . $fila['Titulo'] . "</td>
                  <td>" . $fila['Autor'] . "</td>
                  <td>" . $fila['Editorial'] . "</td>
                </tr>";
    }
    $salida .= "</tbody></table>";
} else {
    $salida .= "</br>No hay dato";
}

echo $salida;

$conexion->close(); //Cerrar conexion.

?>
