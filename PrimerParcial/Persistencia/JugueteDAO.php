<?php
class JugueteDAO{
    private $id;
    private $nombre;
    private $material;
    private $cantidad;
    
    function JugueteDAO($pid,$pnombre,$pmaterial,$pcantidad){
        $this->id = $pid;
        $this->nombre = $pnombre;
        $this->material = $pmaterial;
        $this->cantidad = $pcantidad;
    }
    
    function consultar () {
        return "select nombre, material,cantidad
                from Juguete
                where id = '" . $this -> id . "'";
    }
    
    function crear () {
        return "insert into Juguete (nombre, material, cantidad)
                values ('" . $this -> nombre . "', '" . $this -> material . "','". $this->cantidad . "')";
    }
    
    function consultarTodos () {
        return "select nombre, material,cantidad
                from Juguete";
    }
    
    function consultarPorPagina ($cantidad, $pagina) {
        return "select id, nombre, material, cantidad
                from Juguete
                limit " . strval(($pagina - 1) * $cantidad) . ", " . $cantidad;
    }
    
    function consultarTotalRegistros () {
        return "select count(id)
                from Juguete";
    }
}
?>