<?php

require_once("persistencia/AdminDAO.php");
require_once("persistencia/Conexion.php");

class Admin
{

    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;

    public function __construct($id = "", $nombre = "", $apellido = "", $correo = "", $clave = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of correo
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of clave
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Set the value of clave
     *
     * @return  self
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    public function autenticar()
    {
        $conexion = new Conexion();
        $adminDAO = new AdminDAO("", "", "", $this->correo, $this->clave);
        $consulta = $adminDAO->autenticar();

        $conexion->abrir();
        $conexion->ejecutar($consulta);

        if ($conexion->filas() == 1) {
            $registro = $conexion->registro();
            $this->id = $registro[0];
            $conexion->cerrar();
            return true;
        }

        $conexion->cerrar();
        return false;
    }

    public function consultar()
    {
        $conexion = new Conexion();
        $adminDAO = new AdminDAO($this->id);
        $consulta = $adminDAO->consultar();

        $conexion->abrir();
        $conexion->ejecutar($consulta);

        if ($conexion->filas() == 1) {
            $registro = $conexion->registro();
            $this->nombre = $registro[1];
            $this->apellido = $registro[2];
            $this->correo = $registro[3];
        }

        $conexion->cerrar();
    }
}
