<?php
require_once("../../config/conectar.php");
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
class Empleado extends Conexion
{
    private $id;
    private $nombre;
    private $cedula;
    protected $db;
    

    public function __construct($id=0,$nombre="",$cedula=0)
    {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->cedula=$cedula;
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
    public function setCedula($cedula)
    {
        $this->cedula=$cedula;
    }
    public function getcedula()
    {
        return $this->cedula;
    }

    public function insert()
    {

        try {
            $conectar=$this->db->prepare("INSERT INTO empleado(nombre_emp,cedula) value (?,?)");
            $conectar->execute([$this->nombre,$this->cedula]);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
    public function getAll()
    {
        try{
            $conectar=$this->db->prepare("SELECT * FROM empleado");
            $conectar->execute();
            return $conectar->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $th){
            $th->getMessage();
        }
    }
    public function getOne()
    {
        try {
            $conectar=$this->db->prepare("SELECT * FROM empleado WHERE id_empleado=?");
            $conectar->execute([$this->id]);
            return $conectar->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function delete()
    {
        try{
            $conectar=$this->db->prepare("DELETE FROM empleado WHERE id_empleado=?");
            $conectar->execute([$this->id]);
            return $conectar->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $th){
            $th->getMessage();
        }
    }

    public function update()
    {
        try {
            $conectar=$this->db->prepare("UPDATE empleado SET nombre_emp=?, cedula=? WHERE id_empleado=?");
            $conectar->execute([$this->nombre,$this->cedula,$this->id]);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
?>