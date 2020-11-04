<?php
require "Persistencia/JugueteDAO.php";

class Juguete{
    private $id;
    private $nombre;
    private $material;
    private $cantidad;
    private $conexion;
    private $JugueteDAO;
    
    
    
    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    
    /**
     * @return string
     */
    public function getMaterial()
    {
        return $this->material;
    }
    
    function Juguete ($pId="", $pNombre="", $pMaterial="" ,$pCantidad="") {
        $this -> id = $pId;
        $this -> nombre = $pNombre;
        $this -> apellido = $pMaterial;
        $this-> cantidad = $pCantidad;
        $this -> conexion = new Conexion();
        $this -> JugueteDAO = new JugueteDAO($pId, $pNombre, $pMaterial,$pCantidad);
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> JugueteDAO -> consultar());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        $this -> nombre = $resultado[0];
        $this -> material = $resultado[1];
        $this -> cantidad = $resultado[2];
    }
    
    function crear(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> JugueteDAO -> crear());
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> JugueteDAO -> consultarTodos());
        $this -> conexion -> cerrar();
        $juguetes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($juguetes, new Juguete($resultado[0], $resultado[1], $resultado[2]),$resultado[3]);
        }
        return $juguetes;
    }
    
    function consultarPorPagina($cantidad, $pagina){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> JugueteDAO -> consultarPorPagina($cantidad, $pagina));
        $this -> conexion -> cerrar();
        $juguetes = array();
        while(($resultado = $this -> conexion -> extraer()) != null){
            array_push($juguetes, new Juguete($resultado[0], $resultado[1], $resultado[2]),$resultado[3]);
        }
        return $juguetes;
    }
    
    function consultarTotalRegistros(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> JugueteDAO -> consultarTotalRegistros());
        $this -> conexion -> cerrar();
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
    
    
}

?>