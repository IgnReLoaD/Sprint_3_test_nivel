<?php

// POO Class Producte
include('./Producte.php');

$arrComanda = array();

// ENTRADA DE DADES
// __construct($cod,$nom,$pre,$tip,$qua,$mar){
$producte = new Producte('1','galletas',2,'AL',3,'Oreo');
array_push($arrComanda, $producte);
$producte = new Producte('2','cepillos',8,'HG',1,'Colgate');
array_push($arrComanda, $producte);
$producte = new Producte('3','manzanas',1,'AL',5,'Marlene');
array_push($arrComanda, $producte);
$producte = new Producte('4','jabonnes',3,'HG',2,'Marsella');
array_push($arrComanda, $producte);
$producte = new Producte('5','libretas',8,'OT',1,'Hoffmann');
array_push($arrComanda, $producte);

// DEBUG:
//var_dump($arrComanda);

// ---------------------------------------------------------------------------------

// 1. - Calcular Preu Total Comanda:
function calcularPreuTotal($arrComanda){
    $preuTotal = $preuLinia = 0;
    foreach($arrComanda as $objLinComanda){
        $preuLinia = $objLinComanda->getQuant() * $objLinComanda->getPreu();
        $preuTotal += $preuLinia;
    }    
    return $preuTotal;
}

// 2. - Listar Productes Filtrats (ex.: tipo=higiene, precio > 3€)
function llistarProductes($arrComanda,$tipo,$cuyoPrecioMin){

    $precioFiltrado = 0;

    $grid  = '<br>';
    $grid .= '<p style="font-family:courier;">PRODUCTE &nbsp; &nbsp;&nbsp; TIPUS &nbsp; &nbsp; QT. &nbsp; &nbsp; Pr/Un. &nbsp; &nbsp; PREU </p>';
    $grid .= '<p style="font-family:courier;">-------------------------------------------------</p>';

    if ($tipo === 'TT'){
        foreach($arrComanda as $objLinComanda){    
            if ($objLinComanda->getPreu() > $cuyoPrecioMin){
                $grid .= '<p style="font-family:courier;">' . $objLinComanda->getNombre();
                $grid .= ' &nbsp; &nbsp; &nbsp; ' . $objLinComanda->getTipus();
                $grid .= ' &nbsp; &nbsp; &nbsp; ' . $objLinComanda->getQuant();
                $grid .= ' &nbsp; &nbsp; &nbsp; ' . $objLinComanda->getPreu() . '€ &nbsp; '; 
                $grid .= ' &nbsp; &nbsp; &nbsp; ' . $objLinComanda->getPreu() * $objLinComanda->getQuant() . '€ <br>'; 
                $precioFiltrado += $objLinComanda->getPreu() * $objLinComanda->getQuant();                  
            }
        }    
    }else{
        foreach($arrComanda as $objLinComanda){    
            if (($objLinComanda->getTipus()===$tipo) && ($objLinComanda->getPreu() > $cuyoPrecioMin)){
                $grid .= '<p style="font-family:courier;">' . $objLinComanda->getNombre();
                $grid .= ' &nbsp; &nbsp; &nbsp; ' . $objLinComanda->getTipus();
                $grid .= ' &nbsp; &nbsp; &nbsp; ' . $objLinComanda->getQuant();                
                $grid .= ' &nbsp; &nbsp; &nbsp; ' . $objLinComanda->getPreu() . '€ &nbsp; ';
                $grid .= ' &nbsp; &nbsp; &nbsp; ' . $objLinComanda->getPreu() * $objLinComanda->getQuant() . '€ <br>';                 
                $precioFiltrado += $objLinComanda->getPreu() * $objLinComanda->getQuant();                 
            }
        }
    }
    $arrDatos = [$grid,$precioFiltrado];
    return $arrDatos;
}

// 1. PREU TOTAL:
echo '<br> <p style="font-family:courier;">El preu total de la comanda (sense filtrar) és: ' . calcularPreuTotal($arrComanda)  . '€ </p><br>';
// outputs:  3 x 2€ + 1 x 8€ + 5 x 1€ + 2 x 3€ + 1 x 8€ = 33€

// 2. LLISTAT FILTRAT:
if (isset($_POST['cmbTipo']) && isset($_POST['inpPrecio'])){
    $tipo = $_POST['cmbTipo'];
    $preu = $_POST['inpPrecio'];
    $list = llistarProductes($arrComanda,$tipo,$preu);
    echo '<p style="font-family:courier;"> ' . $list[0] . '</p>';
    echo '<p style="font-family:courier;">-------------------------------------------------</p>';
    echo '<p style="font-family:courier;">Preu segons filtre .............. : &nbsp; &nbsp; &nbsp; &nbsp;<b>' . $list[1] . '€</b></p>';
}
