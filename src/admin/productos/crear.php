
<?php 
/**
 * Create a new product in the database. The data was sent from the form. 
*/

echo $_FILES['img']['name']; 

$nombre_de_archivo = $_FILES['img']['tmp_name']; 
$ruta_de_imagen = "img/"."{$_FILES['img']['name']}";
move_uploaded_file($nombre_de_archivo, "../../".$ruta_de_imagen);  

$conn = mysqli_connect('localhost', 'root', '', 'paleteria');

$nombre = $_POST['nombre']; 
$descripcion = $_POST['descripcion']; 
$precio = $_POST['precio']; 
//Solo es la ruta de la imagen
$id_categoria = $_POST['categoria']; 

$consulta = "INSERT INTO producto VALUES(NULL, '$nombre', '$descripcion', $precio, '$ruta_de_imagen', $id_categoria);"; 
$resultado = mysqli_query($conn, $consulta); 

//Si la consulta fue exitosa, resultado tendrá el valor TRUE
if($resultado) {
    header('Location: http://localhost/proyecto-pw/src/admin/productos/productos.php'); 
} else {
    print_r($resultado);
}

?>