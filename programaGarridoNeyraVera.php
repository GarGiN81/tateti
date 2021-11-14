<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */
/*Vera Guillermo, Legajo FAI-3602, Tecnicatura Universitaria en Desarrollo Web, guillermo.vera@est.fi.uncoma.edu.ar, Github: guilleV12*/




/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/
/**
 * inicializa una estructura de datos con ejemplos de juegos y retorna una colección de juegos

 * @return array coleccion de juegos
 */
//punto 1
function cargarJuegos (){
//array $coleccionJuegos
$coleccionJuegos[0] = ["jugadorCruz"=> "Maxi" , "jugadorCirculo" => "Juan", "puntosCruz"=> 5, "puntosCirculo" => 0];
$coleccionJuegos[1] =  ["jugadorCruz"=> "Kevin" , "jugadorCirculo" => "Luana", "puntosCruz"=> 4, "puntosCirculo" => 0];
$coleccionJuegos[2] =  ["jugadorCruz"=> "Luana" , "jugadorCirculo" => "Maxi", "puntosCruz"=> 0, "puntosCirculo" => 3];
$coleccionJuegos[3] =  ["jugadorCruz"=> "Nico" , "jugadorCirculo" => "Maria", "puntosCruz"=> 1, "puntosCirculo" =>1];
$coleccionJuegos[4] =  ["jugadorCruz"=> "Juan" , "jugadorCirculo" => "Marta", "puntosCruz"=> 0, "puntosCirculo" =>2];
$coleccionJuegos[5] =  ["jugadorCruz"=> "Luana" , "jugadorCirculo" => "Victor", "puntosCruz"=> 1, "puntosCirculo" => 1];
$coleccionJuegos[6] = ["jugadorCruz"=> "Leo" , "jugadorCirculo" => "Ciro", "puntosCruz"=> 2, "puntosCirculo" =>0];
$coleccionJuegos[7] =  ["jugadorCruz"=> "Martin" , "jugadorCirculo" => "Fabi", "puntosCruz"=> 0, "puntosCirculo" => 2];
$coleccionJuegos[8] =  ["jugadorCruz"=> "Nico" , "jugadorCirculo" => "Kevin", "puntosCruz"=> 1, "puntosCirculo" => 1];
$coleccionJuegos[9] = ["jugadorCruz"=> "Maria" , "jugadorCirculo" => "Maxi", "puntosCruz"=> 3, "puntosCirculo" => 0];
return $coleccionJuegos;
}

/**
 * 
 */
//punto 2

/** Modulo que pide al usuario un numero entre el rango del menu, si el numero no es valido, vuelve a pedrilo. Retorna un numero valido
 * @return int
 */
//punto 3
function solicitarOpcion (){
    //int $opcionMenu 

    echo "Ingrese una opcion del menu: ";
    $opcionMenu=trim(fgets(STDIN));
    if ($opcionMenu<1 && $opcionMenu>7){
        echo "Error, debe ser un numero valido del menu de opciones ";
        echo "Ingrese una opcion del menu: ";
        $opcionMenu=trim(fgets(STDIN));
    } 
    return ($opcionMenu);
}


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


/** Modulo que toma por parametro una coleccion de juegos y el nombre de un jugador, retorna indice del primer juego ganado por el jugador indicado
 * si no gano  ningun juego, retorna -1
 * @param array $coleccion
 * @param string $nombreJugadorSolicitado
 * @return int
 */
//punto 6
function primerJuegoGanador($coleccionJuegos, $nombreJugadorSolicitado) {
    //int $nroJuego, $cantElementosColeccion, $indiceGanador
    //boolean $juegoGanador
    $nroJuego=1;
    $juegoGanador=false;
    $cantElementosColeccion= count($coleccionJuegos[$nombreJugadorSolicitado]);
    $indiceGanador=-1;
    $signoJugador="";
    if ($coleccionJuegos[$nroJuego]["jugadorCruz"]==$nombreJugadorSolicitado){
        $signoJugador="jugadorCruz";
    }else {
        $signoJugador="jugadorCirculo";
    }
    while ($coleccionJuegos[$nroJuego][$signoJugador]<=$cantElementosColeccion && $juegoGanador=false ) {
        if ($coleccionJuegos[$nroJuego][$signoJugador]=="jugadorCruz"){
            if ($coleccionJuegos[$nroJuego]["puntosCruz"]>0){
                $juegoGanador=true;
            }
        }else {
            if ($coleccionJuegos[$nroJuego]["puntosCirculo"]>0){
                $juegoGanador=true;
            }
        }
        $nroJuego=$nroJuego+1;
    }
    $indiceGanador=$nroJuego;
    return ($indiceGanador);
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