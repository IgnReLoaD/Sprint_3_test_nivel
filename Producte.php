
<!-- Producto:  
     - nombre, tipo (alim, hig, otros), precio, cant, marca  

     Compra de 5 productos: 
     - en cada compra: 
        - func PrecioTotal  
        - func ListadoProductos(tipo=higiene, precio > 3€) -->

<?php

class Producte {
    
    // 1. ATRIBUTS
    private $_codigo;
    private $_nombre;
    private $_precio;
    private $_tipus;   // alimentación, higiene, otros
    private $_quant;
    private $_marca;

    // 2. CONSTRUCTOR
    public function __construct($cod,$nom,$pre,$tip,$qua,$mar){
        $this->_codigo = $cod;
        $this->_nombre = $nom;
        $this->_precio = $pre;
        $this->_tipus  = $tip;
        $this->_quant  = $qua;
        $this->_marca  = $mar;
    }

    // 3. GETTERS-SETTERS
    public function getNombre(){
        return $this->_nombre;
    }    
    public function getPreu(){
        return $this->_precio;
    }    
    public function getTipus(){
        return $this->_tipus;
    }            
    public function getQuant(){
        return $this->_quant;
    }
    public function getMarca(){
        return $this->_marca;
    }    

    // 4. METODES ESPECIFICS - mostrar() en cas que Getters-Setters fossin privats
    public function mostrarProducte(){
        $msg = "Producte " . $this->getNombre() . "<br>";
        $msg += ", marca " . $this->getMarca() . "<br>";
        $msg += ", tipus " . $this->getTipus() . "<br>";
    }

    // public function calcularPreuTotal(){
    //     foreach($arrComanda as $objLinComanda){
    //         $preuLinia = $objLinComanda->getQuant() * $objLinComanda->getPreu();
    //         $preuTotal += $preuLinia;
    //     }
    //     return $preuTotal;
    // }

}

?>