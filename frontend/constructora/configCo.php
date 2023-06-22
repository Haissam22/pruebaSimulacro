<?php
require_once("../../config/conectar.php");
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
class constructora extends Conexion
{
    private $id;
    private $nombre;
    private $celular;
    private $direccion;
    protected $db;
    

    public function __construct($id=0,$nombre="",$celular=0,$direccion="")
    {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->celular=$celular;
        $this->direccion=$direccion;
        $this->db=parent::conectar();
    }

    public function setId($id)
    {
        $this->id=$id;

    }
    public function getId()
    {
       return $this->id;
    }
    public function setNombre($nombre)
    {
        $this->nombre=$nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setCelular($celular)
    {
        $this->celular=$celular;
    }
    public function getcelular()
    {
        return $this->celular;
    }
    public function setdireccion($direccion)
    {
        $this->direccion=$direccion;
    }
    public function getdireccion()
    {
        return $this->direccion;
    }

    public function insert()
    {

        try {
            $conectar=$this->db->prepare("INSERT INTO constructora(nombre_cons,direccion_cons,celular_cons) value (?,?,?)");
            $conectar->execute([$this->nombre,$this->direccion,$this->celular]);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
    public function getAll()
    {
        try{
            $conectar=$this->db->prepare("SELECT * FROM constructora");
            $conectar->execute();
            return $conectar->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $th){
            $th->getMessage();
        }
    }
    public function getOne()
    {
        try {
            $conectar=$this->db->prepare("SELECT * FROM constructora WHERE id_constructora=?");
            $conectar->execute([$this->id]);
            return $conectar->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function delete()
    {
        try{
            $conectar=$this->db->prepare("DELETE FROM constructora WHERE id_constructora=?");
            $conectar->execute([$this->id]);
            return $conectar->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $th){
            $th->getMessage();
        }
    }
    public function update()
    {
        try {
            $conectar=$this->db->prepare("UPDATE constructora SET nombre_cons=?, direccion_cons=?, celular_cons=? WHERE id_constructora=?");
            $conectar->execute([$this->nombre,$this->direccion,$this->celular,$this->id]);
            
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
?>