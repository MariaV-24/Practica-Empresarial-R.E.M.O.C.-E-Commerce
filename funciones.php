<?php

//funciones
    require('database/ConexionDB.php');

/*****************************************************************************************************************************************/
    /*FUNCION PARA OBTENER PRODUCTOS X PAG*/
    /* CONTENEDOR PRODUCTOS  */
    $sql = 'SELECT producto.IDProd,producto.NombreProd,producto.Size,producto.Precio,producto.CantidadTotalP, imagen_producto.Imagen,
            (SELECT COUNT(*)FROM producto WHERE producto.IDProd = producto.IDProd)
                FROM producto 
                INNER JOIN imagen_producto ON
            producto.IDProd =imagen_producto.IDProd';
    $sentencia = $cnn->prepare($sql);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    //var_dump($resultado);

    $producto_por_pagina = 21;

    $total_de_productos = $sentencia->rowCount();
    //echo $total_de_productos;

    $paginas = $total_de_productos / 21;
    $paginas = ceil($paginas)+1; //redondear la cuenta de las paginas 
    //echo $paginas;

/*****************************************************************************************************************************************/
    /*FUNCION PARA OBTENER artesana*/
    $datos_artesana = 'SELECT artesanas_imagen.Imagen, artesana.CodigoArtesana, 
                        artesana.NombreArtesana, artesana.ApellidoArtesana, 
                        (SELECT COUNT(*)FROM artesana where artesana.IDArtesana = artesana.IDArtesana)
                        from artesana 
                        inner join artesanas_imagen
                        on artesanas_imagen.IDArtesana = artesana.IDArtesana
                        where artesanas_imagen.IDImagenArtesana != 1 and artesanas_imagen.IDImagenArtesana != 0
                        order by artesana.CodigoArtesana asc;'
    ;

    $sentenciaArt = $cnn->prepare($datos_artesana);
    $sentenciaArt->execute();

    $resultadoArt = $sentenciaArt->fetchAll();
    //var_dump($resultadoArt);


    
    /*****************************************************************************************************************************************/
    /*FUNCION PARA OBTENER Eventos*/
    $datos_Eventos = 
        'SELECT * from Evento where IDEvento >= 1;'
    ;

    $sentenciaArt = $cnn->prepare($datos_Eventos);
    $sentenciaArt->execute();

    $resultadoEventos = $sentenciaArt->fetchAll();
    //var_dump($resultadoEventos);


 /*****************************************************************************************************************************************/
    /*FUNCION PARA PRODUCTOS DESTACADOS*/
    $ProdDestacados = 
    'SELECT 
        imagen_producto.IDProd, 
        imagen_producto.Imagen, 

        producto.NombreProd,
        producto.IDProd,
        producto.CantidadTotalP,
        producto.Precio,
        producto.Size,
        producto.Categoria
        
    FROM imagen_producto

    INNER JOIN producto
    ON producto.IDProd = imagen_producto.IDProd

    WHERE producto.Categoria = "Destacados"
    order by producto.IDProd desc
    '
    ;

    $sentenciaArt = $cnn->prepare($ProdDestacados);
    $sentenciaArt->execute();

    $resultado_destacados = $sentenciaArt->fetchAll();
    //var_dump($resultadoArt);

    /*****************************************************************************************************************************************/
    /*FUNCION PARA PRODUCTOS NUEVOS*/
    $ProdNuevos = 
    'SELECT 
        imagen_producto.IDProd, 
        imagen_producto.Imagen, 

        producto.NombreProd,
        producto.IDProd,
        producto.CantidadTotalP,
        producto.Precio,
        producto.Size,
        producto.Categoria
    from imagen_producto

    INNER JOIN producto
    ON producto.IDProd = imagen_producto.IDProd

    WHERE producto.Categoria = "Nuevo"
    order by producto.IDProd desc;'
    ;

    $sentenciaArt = $cnn->prepare($ProdNuevos);
    $sentenciaArt->execute();

    $resultado_nuevos = $sentenciaArt->fetchAll();
    //var_dump($resultadoArt);


/********************************************************************************************************************************************/





























?>