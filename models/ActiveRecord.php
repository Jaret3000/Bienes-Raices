<?php

namespace Model;

class ActiveRecord{
    protected static  $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    //Errores
    protected static $errores = [];

    //Definir la conexion a la base de datos
    public static function setDB($database){
        self::$db = $database;
    }

    public function guardar(){
        if(!is_null($this->Id)){
            //actualizar
            return $this->actualizar();
        } else{
            //Crear un nuevo registro
            return $this->crear();
        }
    }

    public function crear(){

        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        //Insertar en la base de datos
        $query = "INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);
        if($resultado){
            //redireccionar al usuario
            header('Location: /admin?resultado=1');
        }
    }

    public function actualizar(){
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE Id = '" . self::$db->escape_string($this->Id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);
        if($resultado){
            //Redireccionar al usuario
            header('Location: /admin?resultado=2');
        }
    }

    //Eliminar registros
    public function eliminar(){
        $query = "DELETE FROM " . static::$tabla . " WHERE Id = " . self::$db->escape_string($this->Id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if($resultado){
                $this->borrarImagen();
                header('location: /admin?resultado=3');
            }
    }

    public function atributos(){
        $atributos = [];
        foreach(static::$columnasDB as $columna){
            if($columna === 'Id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos(){
        $atributos = $this->atributos(); 
        $sanitizado = [];

        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    //Subida de archivos
    public function setImagen($imagen){
        //Elimina la imagen previa
        if(!is_null($this->Id)){
            $this->borrarImagen();
        }

        //Asignar al atributo de imagen un nombre
        if($imagen){
            $this->imagen = $imagen;
        }
    }

    //Eliminar el archivo
    public function borrarImagen(){
    //Comprobar si existe el archivo
            $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
            if($existeArchivo){
                unlink(CARPETA_IMAGENES . $this->imagen);
            }
    }

    //Validacion
    public static function getErrores(){
        return static::$errores;
    }

    public function validar(){
        static::$errores = [];
        return static::$errores;
    }

    //Listar propiedades
    public static function all(){
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    //Obtiene determinado numero de registros
    public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    //Busca una propiedad por su ID
    public static function find($Id){
        $query = "SELECT * FROM " . static::$tabla . " WHERE Id = $Id";
        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    public static function consultarSQL($query){
        //Consultar la DB
        $resultado = self::$db->query($query);

        //Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }

        //Liberar la memoria
        $resultado->free();

        //Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    //Sincronizar el objeto en memoria con los cambios realizados
    public function sincronizar($args = []) {
        foreach ($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}