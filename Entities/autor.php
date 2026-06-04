<?php

class Autor
{
    private $nAutor_id;
    private $cNombre;
    private $cApellido;
    private $cNacionalizada;

    public function __construct(
        $nAutor_id,
        $cNombre,
        $cApellido,
        $cNacionalizada
    ) {
        $this->nAutor_id = $nAutor_id;
        $this->cNombre = $cNombre;
        $this->cApellido = $cApellido;
        $this->cNacionalizada = $cNacionalizada;
    }

    public function getNAutor_id()
    {
        return $this->nAutor_id;
    }

    public function setNAutor_id($nAutor_id)
    {
        $this->nAutor_id = $nAutor_id;
        return $this;
    }

    public function getCNombre()
    {
        return $this->cNombre;
    }

    public function setCNombre($cNombre)
    {
        $this->cNombre = $cNombre;
        return $this;
    }

    public function getCApellido()
    {
        return $this->cApellido;
    }

    public function setCApellido($cApellido)
    {
        $this->cApellido = $cApellido;
        return $this;
    }

    public function getCNacionalizada()
    {
        return $this->cNacionalizada;
    }

    public function setCNacionalizada($cNacionalizada)
    {
        $this->cNacionalizada = $cNacionalizada;
        return $this;
    }
}