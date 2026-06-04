<?php

class Libro
{
    private $nLibro_id;
    private $cNombre;
    private $codigo;
    private $nAutor_fk;
    private $nPrograma_fk;
    private $lEstado;

    public function __construct($nLibro_id,$cNombre,$codigo,$nAutor_fk,$nPrograma_fk,$IEstado) 
    
    {
        $this->nLibro_id = $nLibro_id;
        $this->cNombre = $cNombre;
        $this->codigo = $codigo;
        $this->nAutor_fk = $nAutor_fk;
        $this->nPrograma_fk = $nPrograma_fk;
        $this->IEstado = $IEstado;
    }

    public function getNLibro_id()
    {
        return $this->nLibro_id;
    }

    public function setNLibro_id($nLibro_id)
    {
        $this->nLibro_id = $nLibro_id;
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

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
        return $this;
    }

    public function getNAutor_fk()
    {
        return $this->nAutor_fk;
    }

    public function setNAutor_fk($nAutor_fk)
    {
        $this->nAutor_fk = $nAutor_fk;
        return $this;
    }

    public function getNPrograma_fk()
    {
        return $this->nPrograma_fk;
    }

    public function setNPrograma_fk($nPrograma_fk)
    {
        $this->nPrograma_fk = $nPrograma_fk;
        return $this;
    }

    public function getIEstado()
    {
        return $this->IEstado;
    }

    public function setIEstado($IEstado)
    {
        $this->IEstado = $IEstado;
        return $this;
    }
}