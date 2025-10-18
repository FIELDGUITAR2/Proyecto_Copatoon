<?php
class AdminDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;

    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = ""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
    }

    public function autenticar(){
        return "SELECT idAdministrador 
                FROM Administrador 
                WHERE correo = '{$this->correo}' 
                AND contrasenia = MD5('{$this->clave}')";
    }
    public function consultar()
    {
        return "select * from Administrador where idAdministrador = " . $this->id;
    }
}
