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
 * Modulo que muestra las opciones del menú en la pantalla, le solicite al usuario una opción válida y retorne el número de la opción
 * @return int
 */

//punto 2
function seleccionarOpcion(){
    // int $opcion
    echo " (1) Jugar al tateti \n";
    echo " (2) Mostrar un juego \n";
    echo " (3) Mostrar el primer juego ganador \n" ;
    echo " (4) Mostrar el porcentaje de juegos ganados \n";
    echo " (5) Mostrar resumen de Jugador \n";
    echo " (6) Jugar al tateti \n";
    echo " (7) Salir \n";
    $opcion = solicitarOpcion();
    return $opcion; 

}

//punto 3
/** Modulo que pide al usuario un numero entre el rango del menu, si no es valido vuelve a pedirlo. Retorna un numero entero
 * @return int
 */
function solicitarOpcion(){
    //int $numeroOpcion, $min, $max
    $min=1;
    $max=7;
    echo "Ingrese una numero entre la opcion " . $min. " y la opcion ".$max." : ";
    $numeroOpcion=solicitarNumeroEntre($min, $max);
    return $numeroOpcion;
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

/**
 * Modulo que recibe un coleccion de juegos y un juego, y retorna la coleccion modificada al agregarle ese juego
 * @param array $coleccionJuegos
 * @param array $unJuego
 * @return array
 */
//punto 5
function agregarJuego ($coleccionJuegos,$unJuego){
    //int $largoArreglo
    $largoArreglo = count($coleccionJuegos);
    $coleccionJuegos [$largoArreglo]= $unJuego;
    return $coleccionJuegos;
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
    $cantElementosColeccion= count($coleccionJuegos);
    $indiceGanador=-1;
    while ($nroJuego<$cantElementosColeccion && $juegoGanador != true){
        if (($coleccionJuegos[$nroJuego]["jugadorCruz"] ==$nombreJugadorSolicitado&&$coleccionJuegos[$nroJuego]["puntosCruz"]>$coleccionJuegos[$nroJuego]["puntosCirculo"])||($coleccionJuegos[$nroJuego]["jugadorCirculo"] ==$nombreJugadorSolicitado && $coleccionJuegos[$nroJuego]["puntosCirculo"]>$coleccionJuegos[$nroJuego]["puntosCruz"])){
        $indiceGanador = $nroJuego;
        $juegoGanador = true;
        }
        $nroJuego ++;
        }
    return $indiceGanador;
        
}
/**
 * Modulo sin parametro formales que solicite al usuario un símbolo X o O, y retorne el símbolo elegido
 * @return string
 */
// punto 8
function ingresarSimbolo (){
    //string $simbolo
    echo "Ingrese un simbolo (x/o):";
    $simbolo = trim(fgets(STDIN));
    while(strtolower($simbolo)!= "x" && strtolower($simbolo) != "o"){
        echo "Ingrese un simbolo valido (x/o):";
        $simbolo = trim(fgets(STDIN));
    }
    return $simbolo;
}
<<<<<<< HEAD
/**
 * Modulo que compara los nombres de los jugadores circulos
 * @param array $a
 * @param array $b
 * @return int
 */
function comparaNombreCirculo($a, $b) {
    return strcmp ($a["jugadorCirculo"],$b["jugadorCirculo"]);
}
=======

// punto 9
/** Modulo que toma por parametro una coleccion de juegos y retorna la cantidad de juegos ganados 
 * @param array $coleccionJuegos
 * @return int 
 */
function cantidadJuegosGanadosColeccion ($coleccionJuegos){
    //int $cantJuegosGanados
    $cantJuegosGanados=0;
    foreach ($coleccionJuegos as $indice => $datos) {
        if ($coleccionJuegos[$indice]["puntosCruz"] !== $coleccionJuegos[$indice]["puntosCirculo"]){
            $cantJuegosGanados++;
        }
    }
    return $cantJuegosGanados;
}

>>>>>>> f760fe80f435c752a721f47ff8f0eda62cc17466
/**
 * Modulo que muestra la coleccion de juegos ordenadas por el nombre del jugador circulo
 * @param array $coleccionJuegos
 */
//punto 11
function ordenaNombreCirculo($coleccionJuegos){
    uasort($coleccionJuegos, 'comparaNombreCirculo');
    print_r($coleccionJuegos);
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

//$juego = jugar();
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
}  while ($opcion != X);

*/