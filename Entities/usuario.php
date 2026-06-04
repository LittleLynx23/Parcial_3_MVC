<?php

class Usuario
{
    private $nUsuario_id;
    private $cNick;
    private $cClave;
    private $lestado;

    public function __construct($nUsuario_id, $cNick, $cClave, $lestado)
    {
        $this->nUsuario_id = $nUsuario_id;
        $this->cNick = $cNick;
        $this->cClave = $cClave;
        $this->estado = $estado;
    }

    public function getnUsuario_id()
    {
        return $this->nUsuario_id;
    }

    public function setnUsuario_id($nUsuario_id)
    {
        $this->admin_id = $admin_id;
        return $this;
    }

    public function getcNick()
    {
        return $this->cNick;
    }

    public function setcNick($cNick)
    {
        $this->cNick = $cNick;
        return $this;
    }

    public function getcClave()
    {
        return $this->cClave;
    }

    public function setcClave($cClave)
    {
        $this->cClave = $cClave;
        return $this;
    }

    public function getlestado()
    {
        return $this->lestado;
    }

    public function setlestado($lestado)
    {
        $this->lestado = $lestado;
        return $this;
    }
}