<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */





/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/




/**
 * muestra los datos de un juego elegido por el usuario
 * @param array $coleccionJuegos
*/
//Punto 4)
function mostrarJuego ($coleccionJuegos){ 
    //int $nroJuego
	echo "Ingrese un número de juego: ";
	$nroJuego=trim(fgets(STDIN));
	echo "Jugador X:".$coleccionJuegos[$nroJuego]["jugadorCruz"]." Obtuvo: ".$coleccionJuegos[$nroJuego]["puntosCruz"]."puntos .\n".
    "JugadorO: ".$coleccionJuegos[$nroJuego]["jugadorCirculo"]." Obtuvo: ".$coleccionJuegos[$nroJuego]["puntosCirculo"]." puntos .\n";
}







/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$juego = jugar();
//print_r($juego);
//imprimirResultado($juego);



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/