<?php

namespace Model;

class Propiedad extends ActiveRecord{
    protected static $tabla = 'propiedades';
    protected static $columnasDB =  ['Id', 'titulo', 'precio', 'imagen', 'descripcion', 
    'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_Id'];

    public $Id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_Id;

    public function __construct($args = []){
        $this->Id = $args['Id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_Id = $args['vendedores'] ?? '';
    }

    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "Debes añadir un titulo";
        }

        if(!$this->precio){
            self::$errores[] = "Debes añadir un precio";
        }

        if(strlen( $this->descripcion ) < 15 ){
            self::$errores[] = "Debes colocar una descripcion de al menos 15 caracteres";
        }

        if(!$this->habitaciones){
            self::$errores[] = "Debes añadir el numero de habitaciones";
        }

        if(!$this->wc){
            self::$errores[] = "Debes añadir el numero de baños";
        }

        if(!$this->estacionamiento){
            self::$errores[] = "Debes añadir el numero de estacionamientos";
        }

        if(!$this->vendedores_Id){
            self::$errores[] = "Selecciona un vendedor";
        }

        if(!$this->imagen){
            self::$errores[] = "Es necesario subir una imagen";  
        }

        return self::$errores;
    }
}