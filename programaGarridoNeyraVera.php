<?php
include_once("tateti.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ... COMPLETAR ... */
/*Vera Guillermo, Legajo FAI-3602, Tecnicatura Universitaria en Desarrollo Web, guillermo.vera@est.fi.uncoma.edu.ar, Github: guilleV12*/
/**Garrido Gisela, Legajo: FAI-3463, Tecnicatura Universitaria en Desarrollo Web, gisela.garrido@est.fi.uncoma.edu.ar, Github: GarGiN81*/
/*Neyra Gustavo, Legajo FAI-2020, Tecnicatura Universitaria en Desarrollo Web, gustavo.neyra@est.fi.uncoma.edu.ar, Github: GENEY11*/



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
$coleccionJuegos=[];
$coleccionJuegos[0] = ["jugadorCruz"=> "MAXI" , "jugadorCirculo" => "JUAN", "puntosCruz"=> 5, "puntosCirculo" => 0];
$coleccionJuegos[1] =  ["jugadorCruz"=> "KEVIN" , "jugadorCirculo" => "LUANA", "puntosCruz"=> 4, "puntosCirculo" => 0];
$coleccionJuegos[2] =  ["jugadorCruz"=> "LUANA" , "jugadorCirculo" => "MAXI", "puntosCruz"=> 0, "puntosCirculo" => 3];
$coleccionJuegos[3] =  ["jugadorCruz"=> "NICO" , "jugadorCirculo" => "MARIA", "puntosCruz"=> 1, "puntosCirculo" =>1];
$coleccionJuegos[4] =  ["jugadorCruz"=> "JUAN" , "jugadorCirculo" => "MARTA", "puntosCruz"=> 0, "puntosCirculo" =>2];
$coleccionJuegos[5] =  ["jugadorCruz"=> "LUANA" , "jugadorCirculo" => "VICTOR", "puntosCruz"=> 1, "puntosCirculo" => 1];
$coleccionJuegos[6] = ["jugadorCruz"=> "LEO" , "jugadorCirculo" => "CIRO", "puntosCruz"=> 2, "puntosCirculo" =>0];
$coleccionJuegos[7] =  ["jugadorCruz"=> "MARTIN" , "jugadorCirculo" => "FABI", "puntosCruz"=> 0, "puntosCirculo" => 2];
$coleccionJuegos[8] =  ["jugadorCruz"=> "NICO" , "jugadorCirculo" => "KEVIN", "puntosCruz"=> 1, "puntosCirculo" => 1];
$coleccionJuegos[9] = ["jugadorCruz"=> "MARIA" , "jugadorCirculo" => "MAXI", "puntosCruz"=> 3, "puntosCirculo" => 0];
$coleccionJuegos = [];

$jg1 = ["jugadorCruz" => "AMARILIS", "jugadorCirculo" => "MILOS",    "puntosCruz" => 1, "puntosCirculo" => 1];
$jg2 = ["jugadorCruz" => "ZENDA",    "jugadorCirculo" => "AMARILIS", "puntosCruz" => 3, "puntosCirculo" => 0];
$jg3 = ["jugadorCruz" => "ZENDA",    "jugadorCirculo" => "MILOS",    "puntosCruz" => 0, "puntosCirculo" => 4];
$jg4 = ["jugadorCruz" => "CALIXTO",  "jugadorCirculo" => "TRUMAN",   "puntosCruz" => 1, "puntosCirculo" => 1];
$jg5 = ["jugadorCruz" => "AMARILIS", "jugadorCirculo" => "MILOS",    "puntosCruz" => 5, "puntosCirculo" => 0];
$jg6 = ["jugadorCruz" => "FEDORA",   "jugadorCirculo" => "CALIXTO",  "puntosCruz" => 0, "puntosCirculo" => 3];
$jg7 = ["jugadorCruz" => "TRUMAN",   "jugadorCirculo" => "AMARILIS", "puntosCruz" => 4, "puntosCirculo" => 0];
$jg8 = ["jugadorCruz" => "CALIXTO",  "jugadorCirculo" => "TRUMAN",   "puntosCruz" => 1, "puntosCirculo" => 1];
$jg9 = ["jugadorCruz" => "TRUMAN",   "jugadorCirculo" => "FEDORA",   "puntosCruz" => 2, "puntosCirculo" => 0];
$jg10= ["jugadorCruz" => "MILOS",    "jugadorCirculo" => "ZENDA",   "puntosCruz" => 1, "puntosCirculo" => 1];

array_push($coleccionJuegos, $jg1, $jg2, $jg3, $jg4, $jg5, $jg6, $jg7, $jg8, $jg9, $jg10);

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
    echo " (6) Mostrar listado de juegos Ordenados por jugador O \n";
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
 * @param array $coleccionDeJuegos
*/
//Punto 4)
function mostrarJuego ($coleccionDeJuegos,$nroJuego){ 
    //int $nroJuego, $cantidadDeJuegos
    //string $resultado
    $resultado = "";
    
    if($coleccionDeJuegos[$nroJuego]["puntosCruz"]!=$coleccionDeJuegos[$nroJuego]["puntosCirculo"]){
        if($coleccionDeJuegos[$nroJuego]["puntosCruz"]>$coleccionDeJuegos[$nroJuego]["puntosCirculo"]){
            $resultado = "gano X";
        }else{
            $resultado = "gano O";
        }
    }else{
        $resultado = "empate";
    }
    echo "**************************************** \n";
    echo "Juego TATETI: ". $nroJuego + 1 . " (" . $resultado . ") \n";
	echo "Jugador X: ".$coleccionDeJuegos[$nroJuego]["jugadorCruz"]." Obtuvo: ".$coleccionDeJuegos[$nroJuego]["puntosCruz"]." puntos .\n";
    echo "Jugador O: ".$coleccionDeJuegos[$nroJuego]["jugadorCirculo"]." Obtuvo: ".$coleccionDeJuegos[$nroJuego]["puntosCirculo"]." puntos .\n";
    echo "**************************************** \n";
}

/**
 * Modulo que recibe un coleccion de juegos y un juego, y retorna la coleccion modificada al agregarle ese juego
 * @param array $repertorioJuegos
 * @param array $unJuego
 * @return array
 */
//punto 5
function agregarJuego ($repertorioJuegos,$unJuego){
    //int $largoArreglo
    $largoArreglo = count($repertorioJuegos);
    $repertorioJuegos [$largoArreglo]= $unJuego;
    return $repertorioJuegos;
}

/** Modulo que toma por parametro una coleccion de juegos y el nombre de un jugador, retorna indice del primer juego ganado por el jugador indicado
 * si no gano  ningun juego, retorna -1 o -2 si no esta en la coleccion
 * @param array $serieJuegos
 * @param string $nombreJugadorSolicitado
 * @return int
 */
//punto 6
function primerJuegoGanador($serieJuegos, $nombreJugadorSolicitado) {
    //int $nroJuego, $cantElementosColeccion, $indiceGanador
    //boolean $juegoGanador, $banderaNombre
    $nroJuego=0;
    $juegoGanador=false;
    $cantElementosColeccion= count($serieJuegos);
    $indiceGanador=-2;
    while ($nroJuego<$cantElementosColeccion && $juegoGanador != true){
        if (($serieJuegos[$nroJuego]["jugadorCruz"] ==$nombreJugadorSolicitado&&$serieJuegos[$nroJuego]["puntosCruz"]>$serieJuegos[$nroJuego]["puntosCirculo"])||($serieJuegos[$nroJuego]["jugadorCirculo"] ==$nombreJugadorSolicitado && $serieJuegos[$nroJuego]["puntosCirculo"]>$serieJuegos[$nroJuego]["puntosCruz"])){
        $indiceGanador = $nroJuego;
        $juegoGanador = true;
        }
        $nroJuego ++;
        }
        if ($indiceGanador == -2){
          $nroJuego=0;
          $banderaNombre=false;
               while ($nroJuego < $cantElementosColeccion && $banderaNombre==false) {
                  if ($serieJuegos[$nroJuego]["jugadorCruz"]==$nombreJugadorSolicitado || $serieJuegos[$nroJuego]["jugadorCirculo"]==$nombreJugadorSolicitado){
                      $banderaNombre=true;
                      $indiceGanador=-1;
               }
                  $nroJuego++;
          }
          }
    return $indiceGanador;
      }

/**
 * Función que dada la colección de juegos y el nombre de un jugador, retorna el resumen del jugador
 * @param array $arrayColeccionJuegos
 * @param string $nombreIngresado
 * @return array
 */
//punto 7

function historialJugador($arrayColeccionJuegos, $nombreIngresado){
    //int $ganados, $puntajeTotal, $empatados, $perdidos
    $ganados=0;
    $puntajeTotal=0;
    $empatados=0;
    $perdidos=0;
    
    

    for ($numeroJuego=0;$numeroJuego<count($arrayColeccionJuegos);$numeroJuego++){
        if ($arrayColeccionJuegos[$numeroJuego]["jugadorCruz"]==$nombreIngresado){
            if($arrayColeccionJuegos[$numeroJuego]["puntosCruz"]>$arrayColeccionJuegos[$numeroJuego]["puntosCirculo"]){
                $ganados=$ganados+1;
                $puntajeTotal=$puntajeTotal+$arrayColeccionJuegos[$numeroJuego]["puntosCruz"];
            }elseif($arrayColeccionJuegos[$numeroJuego]["puntosCruz"]==$arrayColeccionJuegos[$numeroJuego]["puntosCirculo"]){
                $empatados=$empatados+1;
                $puntajeTotal=$puntajeTotal+1;
            }else{
                $perdidos=$perdidos+1;
            }
        }elseif($arrayColeccionJuegos[$numeroJuego]["jugadorCirculo"]==$nombreIngresado){
            if ($arrayColeccionJuegos[$numeroJuego]["puntosCruz"]<$arrayColeccionJuegos[$numeroJuego]["puntosCirculo"]){
                $ganados=$ganados+1;
                $puntajeTotal=$puntajeTotal+$arrayColeccionJuegos[$numeroJuego]["puntosCirculo"];
            }elseif($arrayColeccionJuegos[$numeroJuego]["puntosCruz"]==$arrayColeccionJuegos[$numeroJuego]["puntosCirculo"]){
                $empatados=$empatados+1;
                $puntajeTotal=$puntajeTotal+1;
            }else{
                $perdidos=$perdidos+1;
                }
        }
    }
$resumenJugador=[];
$resumenJugador["nombre"]=$nombreIngresado;
$resumenJugador["juegosGanados"]=$ganados;
$resumenJugador["juegosEmpatados"]=$empatados;
$resumenJugador["juegosPerdidos"]=$perdidos;
$resumenJugador["puntosAcumulados"]=$puntajeTotal;
return $resumenJugador;

}

/**
 * Modulo sin parametro formales que solicite al usuario un símbolo X o O, y retorne el símbolo elegido
 * @return string
 */
// punto 8
function ingresarSimbolo (){
    //string $simbolo
    echo "Ingrese un simbolo (x/o):";
    $simbolo = strtoupper(trim(fgets(STDIN)));
    while($simbolo!= "X" && $simbolo != "O"){
        echo "El símbolo ingresado no corresponde a un símbolo válido. \n";
        echo "Por favor ingrese un símbolo valido (x/o):";
        $simbolo = strtoupper(trim(fgets(STDIN)));
    }
    return $simbolo;
}

// punto 9
/** Modulo que toma por parametro una coleccion de juegos y retorna la cantidad de juegos ganados 
 * @param array $recopilacionJuegos
 * @return int 
 */
function cantidadJuegosGanadosColeccion ($recopilacionJuegos){
    //int $cantJuegosGanados
    $cantJuegosGanados=0;
    foreach ($recopilacionJuegos as $indice => $datos) {
        if ($recopilacionJuegos[$indice]["puntosCruz"] !== $recopilacionJuegos[$indice]["puntosCirculo"]){
            $cantJuegosGanados++;
        }
    }
    return $cantJuegosGanados;
}

/**
 * Modulo que dada una colección de juegos y un símbolo, recibidos por parámetros, retorna la cantidad de juegos ganados (por símbolo)
 * @param array $juegosTotales
 * @param string $simboloXo
 * @return int
 */
//punto 10
function ganadosSimbolo($juegosTotales,$simboloXo){
    //string $jugadorX,$jugadorO
    //int $ganadosXo
    $jugadorX="X";
    $jugadorO="O";
    $ganadosXo=0;
    
    for ($nroJuego=0;$nroJuego<count($juegosTotales);$nroJuego++){
      if($jugadorX==$simboloXo){
        if ($juegosTotales[$nroJuego]["puntosCruz"]>$juegosTotales[$nroJuego]["puntosCirculo"]){
            $ganadosXo=$ganadosXo+1;
        }
      }elseif($jugadorO==$simboloXo){
            if ($juegosTotales[$nroJuego]["puntosCruz"]<$juegosTotales[$nroJuego]["puntosCirculo"]){
                $ganadosXo=$ganadosXo+1;
            }
         }
        
    }
    return ($ganadosXo);
}

/**
 * Muestra el procentaje de juegos ganados, correspondiente al símbolo ingresado por usuario
 * @param array $totalJuegos
 * @param string $simbolOx
 * @return float
 */
//complemento opcion (4
//int $ganadosX, $ganadosO, $totalGanados
//float $porcentajeGanado
function porcentajeSimboloG($totalJuegos,$simbolOx){
    $ganadosX=ganadosSimbolo($totalJuegos,"X");
    $ganadosO=ganadosSimbolo($totalJuegos,"O");
    $totalGanados=$ganadosX+$ganadosO;
    $porcentajeGanado=0;
    if($simbolOx=="X"){
        $porcentajeGanado=$ganadosX*100/$totalGanados;
    }elseif($simbolOx=="O"){
        $porcentajeGanado=$ganadosO*100/$totalGanados;
    }
return round($porcentajeGanado,2); 

}
/**
 * Modulo que compara los nombres de los jugadores circulos
 * @param array $a
 * @param array $b
 * @return int
 */
function comparaNombreCirculo($a, $b) {
    return strcmp ($a["jugadorCirculo"],$b["jugadorCirculo"]);
}

/**
 * Modulo que muestra la coleccion de juegos ordenadas por el nombre del jugador circulo
 * @param array $acopioJuegos
 */
//punto 11
function ordenaNombreCirculo($acopioJuegos){
    //Ordena un array con una funcion de comparacion definida por el usuario y mantiene la asociacion de indices
    uasort($acopioJuegos, 'comparaNombreCirculo');
    //Muestra informacion sobre una variable en una forma que es legible por humanos
    print_r($acopioJuegos);
}



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
// array $arregloJuegos, $juego, $arregloResumen
// string $nombreJugador, $signoJugador, $simboloXoO
// int $indiceGanador, $opcion
// float $porcentaje

//Inicialización de variables:
$nombreJugador = "";
$signoJugador = "";
$simboloXoO = "";
$indiceGanador = 0;
$opcion = 0;
$porcentaje = 0;
$arregloJuegos = [];
$juego = [];
$arregloResumen = [];

//Proceso:
$arregloJuegos = cargarJuegos();

do {
    $opcion = seleccionarOpcion();

    // Estructura de control alternativa o de condicion. Similar a una serie de sentencias IF en la misma expresion. Compara el valor de una variable con muchos valores diferentes y ejecuta una parte de codigo distinta, dependiendo a que valor es igual.
    switch ($opcion) {
        case 1:
            $juego = jugar();
            $arregloJuegos = agregarJuego($arregloJuegos,$juego);
            break;
        case 2: 
            $cantidadDeJuegos = count($arregloJuegos);
	        echo "Ingrese un número de juego: ";
            $numIndice = solicitarNumeroEntre(1,$cantidadDeJuegos);
            $numIndice = $numIndice - 1;
            mostrarJuego($arregloJuegos,$numIndice);
            break;
        case 3: 
            echo "Ingrese nombre del jugador ";
            $nombreJugador = strtoupper(trim(fgets(STDIN)));
            $indiceGanador=primerJuegoGanador($arregloJuegos,$nombreJugador);
            if($indiceGanador==-1){
                echo"***************************************\n";
                echo "El jugador " . $nombreJugador . " no gano ningun juego. \n";
                echo"***************************************\n";
            }elseif ($indiceGanador==-2) {
                echo"****************************************************\n";
                echo " El nombre ".$nombreJugador. " no corresponde a ningun jugador. \n";
                echo"****************************************************\n";
            }else {
                mostrarJuego($arregloJuegos,$indiceGanador);
            }
            break;
        case 4:
            $simboloXoO = ingresarSimbolo();
            $porcentaje = porcentajeSimboloG($arregloJuegos,$simboloXoO);
            echo "El simbolo " . $simboloXoO . " gano el " . $porcentaje . "% de las partidas \n";
            break;
        case 5:
            echo "Ingrese nombre del jugador: ";
            $nombreJugador = strtoupper(trim(fgets(STDIN)));
            $indiceGanador=primerJuegoGanador($arregloJuegos,$nombreJugador);
            if($indiceGanador==-2){
                
                echo"**************************************.\n";
                echo "El nombre ingresado no corresponde a un jugador.\n";
                echo"**************************************.\n";
            }else{
                $arregloResumen = historialJugador($arregloJuegos,$nombreJugador);
                echo"**************************************.\n";
                
                echo "jugador: ". $arregloResumen["nombre"] .".\n";
                echo"\n";
                echo "Ganó: ".$arregloResumen["juegosGanados"]." juegos.\n";
                echo "Perdió: ".$arregloResumen["juegosPerdidos"]." juegos.\n";
                echo "Empató: ".$arregloResumen["juegosEmpatados"]." juegos.\n";
                echo "Total de puntos acumulados: ".$arregloResumen["puntosAcumulados"]." puntos.\n";
                echo"\n";
                echo"**************************************.\n";
            
            }
            break;
            
        case 6:
            ordenaNombreCirculo($arregloJuegos);
            break;
    }
}  while ($opcion != 7);

