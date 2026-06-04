<?php

class Admin
{
    private $admin_id;
    private $nombre;
    private $clave;
    private $estado;

    public function __construct($admin_id, $nombre, $clave, $estado)
    {
        $this->admin_id = $admin_id;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->estado = $estado;
    }

    public function getAdmin_id()
    {
        return $this->admin_id;
    }

    public function setAdmin_id($admin_id)
    {
        $this->admin_id = $admin_id;
        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }
}