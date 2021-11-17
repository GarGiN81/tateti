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
$coleccionJuegos[0] = ["jugadorCruz"=> "MAXI" , "jugadorCirculo" => "JUAN", "puntosCruz"=> 5, "puntosCirculo" => 0];
$coleccionJuegos[1] =  ["jugadorCruz"=> "KEVIN" , "jugadorCirculo" => "LUANA", "puntosCruz"=> 4, "puntosCirculo" => 0];
$coleccionJuegos[2] =  ["jugadorCruz"=> "LUANA" , "jugadorCirculo" => "MAXI", "puntosCruz"=> 0, "puntosCirculo" => 3];
$coleccionJuegos[3] =  ["jugadorCruz"=> "NICO" , "jugadorCirculo" => "MARIA", "puntosCruz"=> 1, "puntosCirculo" =>1];
$coleccionJuegos[4] =  ["jugadorCruz"=> "JUAN" , "jugadorCirculo" => "MARTA", "puntosCruz"=> 0, "puntosCirculo" =>2];
$coleccionJuegos[5] =  ["jugadorCruz"=> "LUANA" , "jugadorCirculo" => "VICTOR", "puntosCruz"=> 1, "puntosCirculo" => 1];
$coleccionJuegos[6] = ["jugadorCruz"=> "LEO" , "jugadorCirculo" => "CIRO", "puntosCruz"=> 2, "puntosCirculo" =>0];
$coleccionJuegos[7] =  ["jugadorCruz"=> "MARTIN" , "jugadorCirculo" => "FABI", "puntosCruz"=> 0, "puntosCirculo" => 2];
$coleccionJuegos[8] =  ["jugadorCruz"=> "NICO" , "jugadorCirculo" => "KEVIN", "puntosCruz"=> 1, "puntosCirculo" => 1];
$coleccionJuegos[9] = ["jugadorCruz"=> "MARIA" , "jugadorCirculo" => "MAXI", "puntosCruz"=> 3, "puntosCirculo" => 0];;
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
 * @param array $coleccionJuegos
*/
//Punto 4)
function mostrarJuego ($coleccionJuegos){ 
    //int $nroJuego, $cantidadDeJuegos
    //string $resultado
    $resultado = "";
    $cantidadDeJuegos = count($coleccionJuegos);
	echo "Ingrese un número de juego: ";
    $nroJuego = solicitarNumeroEntre(1,$cantidadDeJuegos);
    $nroJuego = $nroJuego - 1;
    if($coleccionJuegos[$nroJuego]["puntosCruz"]!=$coleccionJuegos[$nroJuego]["puntosCirculo"]){
        if($coleccionJuegos[$nroJuego]["puntosCruz"]>$coleccionJuegos[$nroJuego]["puntosCirculo"]){
            $resultado = "gano X";
        }else{
            $resultado = "gano O";
        }
    }else{
        $resultado = "empate";
    }
    echo "**************************************** \n";
    echo "Juego TATETI: ". $nroJuego + 1 . " (" . $resultado . ") \n";
	echo "Jugador X: ".$coleccionJuegos[$nroJuego]["jugadorCruz"]." Obtuvo: ".$coleccionJuegos[$nroJuego]["puntosCruz"]." puntos .\n";
    echo "Jugador O: ".$coleccionJuegos[$nroJuego]["jugadorCirculo"]." Obtuvo: ".$coleccionJuegos[$nroJuego]["puntosCirculo"]." puntos .\n";
    echo "**************************************** \n";
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
    //boolean $juegoGanador, $banderaNombre
    $nroJuego=0;
    $juegoGanador=false;
    $cantElementosColeccion= count($coleccionJuegos);
    $indiceGanador=-2;
    while ($nroJuego<$cantElementosColeccion && $juegoGanador != true){
        if (($coleccionJuegos[$nroJuego]["jugadorCruz"] ==$nombreJugadorSolicitado&&$coleccionJuegos[$nroJuego]["puntosCruz"]>$coleccionJuegos[$nroJuego]["puntosCirculo"])||($coleccionJuegos[$nroJuego]["jugadorCirculo"] ==$nombreJugadorSolicitado && $coleccionJuegos[$nroJuego]["puntosCirculo"]>$coleccionJuegos[$nroJuego]["puntosCruz"])){
        $indiceGanador = $nroJuego;
        $juegoGanador = true;
        }
        $nroJuego ++;
        }
        if ($indiceGanador == -2){
          $nroJuego=0;
          $banderaNombre=false;
               while ($nroJuego < $cantElementosColeccion && $banderaNombre==false) {
                  if ($coleccionJuegos[$nroJuego]["jugadorCruz"]==$nombreJugadorSolicitado || $coleccionJuegos[$nroJuego]["jugadorCirculo"]==$nombreJugadorSolicitado){
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
 * 
 */
//punto 7

function historialJugador($arrayColeccionJuegos, $nombreIngresado){
    //int $ganados, $puntajeTotal, $empatados, $perdidos, $noExiste
    $ganados=0;
    $puntajeTotal=0;
    $empatados=0;
    $perdidos=0;
    $noExiste=0;
    
    $resumenJugador=[];

    for ($numeroJuego=0;$numeroJuego<count($arrayColeccionJuegos);$numeroJuego++){
        if ($arrayColeccionJuegos[$numeroJuego]["jugadorCruz"]==$nombreIngresado){
            if($arrayColeccionJuegos[$numeroJuego]["puntosCruz"]>$arrayColeccionJuegos[$numeroJuego]["puntosCirculo"]){
                $ganados=$ganados+1;
                $puntajeTotal=$puntajeTotal+$arrayColeccionJuegos[$numeroJuego]["puntosCruz"];
            }elseif($arrayColeccionJuegos[$numeroJuego]["puntosCruz"]=$arrayColeccionJuegos[$numeroJuego]["puntosCirculo"]){
                $empatados=$empatados+1;
                $puntajeTotal=$puntajeTotal+1;
            }else{
                $perdidos=$perdidos+1;
            }
        }elseif($arrayColeccionJuegos[$numeroJuego]["jugadorCirculo"]==$nombreIngresado){
            if ($arrayColeccionJuegos[$numeroJuego]["puntosCruz"]<$arrayColeccionJuegos[$numeroJuego]["puntosCirculo"]){
                $ganados=$ganados+1;
                $puntajeTotal=$puntajeTotal+$arrayColeccionJuegos[$numeroJuego]["puntosCirculo"];
            }elseif($arrayColeccionJuegos[$numeroJuego]["puntosCruz"]=$arrayColeccionJuegos[$numeroJuego]["puntosCirculo"]){
                $empatados=$empatados+1;
                $puntajeTotal=$puntajeTotal+1;
            }else{
                $perdidos=$perdidos+1;
                }
        }elseif($arrayColeccionJuegos[$numeroJuego]["jugadorCruz"]!=$nombreIngresado&&$arrayColeccionJuegos[$numeroJuego]["jugadorCirculo"]!=$nombreIngresado){
            $noExiste=$noExiste+1;
            
        }
    }
$resumenJugador["nombre"]=$nombreIngresado;
$resumenJugador["juegosGanados"]=$ganados;
$resumenJugador["juegosEmpatados"]=$empatados;
$resumenJugador["juegosPerdidos"]=$perdidos;
$resumenJugador["puntosAcumulados"]=$puntajeTotal;
echo"**************************************.\n";
if($noExiste==count($arrayColeccionJuegos)){
    echo "El nombre ingresado no corresponde a un jugador.\n";

}else{
echo "jugador: ". $resumenJugador["nombre"] .".\n";

echo "Ganó: ".$resumenJugador["juegosGanados"]." juegos.\n";
echo "Perdió: ".$resumenJugador["juegosPerdidos"]." juegos.\n";
echo "Empató: ".$resumenJugador["juegosEmpatados"]." juegos.\n";
echo "Total de puntos acumulados: ".$resumenJugador["puntosAcumulados"]." puntos.\n";
echo"**************************************.\n";
}

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
        echo "Ingrese un simbolo valido (x/o):";
        $simbolo = strtoupper(trim(fgets(STDIN)));
    }
    return $simbolo;
}

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

/**
 * Modulo que dada una colección de juegos y un símbolo, recibidos por parámetros, retorna la cantidad de juegos ganados (por símbolo)
 * @param array $juegosTotales
 * @param string $simnoloXo
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
return $porcentajeGanado; 

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
 * @param array $coleccionJuegos
 */
//punto 11
function ordenaNombreCirculo($coleccionJuegos){
    uasort($coleccionJuegos, 'comparaNombreCirculo');
    print_r($coleccionJuegos);
}
/**
 * Modulo que verifica si un jugador en X o O
 * @param array $coleccionJuegos
 * @param int $indice
 * @param string $nombre
 * @return string
 */
function verTipo ($coleccionJuegos,$indice,$nombre){
    if($coleccionJuegos[$indice]["jugadorCruz"]==$nombre){
        $tipo = "X";
    }else{
        $tipo = "O";
    }
    return $tipo;
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
// array $arregloJuegos
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

//Proceso:
$arregloJuegos = cargarJuegos();

do {
    $opcion = seleccionarOpcion();

    
    switch ($opcion) {
        case 1:
            $juego = jugar();
            $arregloJuegos = agregarJuego($arregloJuegos,$juego);
            break;
        case 2: 
            mostrarJuego($arregloJuegos);
            break;
        case 3: 
            echo "Ingrese nombre del jugador ";
            $nombreJugador = strtoupper(trim(fgets(STDIN)));
            $indiceGanador=primerJuegoGanador($arregloJuegos,$nombreJugador);
            if($indiceGanador==-1){
                echo "El jugador " . $nombreJugador . " no gano ningun juego. \n";
            }elseif ($indiceGanador==-2) {
                echo " El jugador ".$nombreJugador. " no jugo ningun juego. \n";
            }else{
                $signoJugador = verTipo($arregloJuegos,$indiceGanador,$nombreJugador);
                echo "**************************************** \n";
                echo "Juego TATETI: ". $indiceGanador + 1 . " ( gano " . $signoJugador . ") \n";
                echo "Jugador X: ".$arregloJuegos[$indiceGanador]["jugadorCruz"]." Obtuvo: ".$arregloJuegos[$indiceGanador]["puntosCruz"]." puntos .\n";
                echo "Jugador O: ".$arregloJuegos[$indiceGanador]["jugadorCirculo"]." Obtuvo: ".$arregloJuegos[$indiceGanador]["puntosCirculo"]." puntos .\n";
                echo "**************************************** \n";
                }
            break;
        case 4:
            $simboloXoO = ingresarSimbolo();
            $porcentaje = porcentajeSimboloG($arregloJuegos,$simboloXoO);
            echo "El simbolo " . $simboloXoO . " gano el " . $porcentaje . "% de las partidas \n";
            break;
        case 5:
            echo "Ingrese nombre del jugador ";
            $nombreJugador = strtoupper(trim(fgets(STDIN)));
            historialJugador($arregloJuegos,$nombreJugador);
            break;
        case 6:
            ordenaNombreCirculo($arregloJuegos);
            break;
    }
}  while ($opcion != 7);

