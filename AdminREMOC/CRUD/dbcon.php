<?php 

require('db.php');


//header + envio.php
if($_POST['opcion'] == 'consulta'){
	$query = "SELECT * FROM producto_ventas
			inner join ventas
			on producto_ventas.VentasIDVentas = ventas.IDVenta

			inner join producto
			on producto_ventas.ProductoIDProd = producto.IDProd

			where producto_ventas.VentasIDVentas='".$_POST['id']."';";

	$datos = mysqli_query($cnn,$query) or die(mysqli_errno($cnn));

	$response = array();
	$aux = array();
	$producto=array();
	
	while($row = mysqli_fetch_array($datos)){
		array_push($aux, $row);
		array_push($producto, array("ProductoIDProduct"=> $row['ProductoIDProd'],"NombreProd"=> $row['NombreProd']));
	}
					//$response['res'] = mysqli_fetch_array($datos);
					//
	$response['producto']=$producto;
	$response['res']=$aux;
	echo json_encode($response);
}



//artesana + codigo artesana
if ($_POST['opcion'] == 'consultaArtesana') {
	$id = $_POST['id'];
	$consulta = "SELECT CodigoArtesana FROM artesana WHERE IDArtesana = $id";
    $listaID = mysqli_query($cnn, $consulta) or die(mysqli_errno($cnn));

	$response = array();
	$producto=array();

	while($row = mysqli_fetch_array($listaID)){
		array_push($producto, $row);
		// array_push($producto, array("CodigoArtesana"=> $row['CodigoArtesana']));
	}

	// $response['producto']=$producto;
	$response['res']=$producto;
	echo json_encode($response);




}


?>