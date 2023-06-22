<?php
require_once("../../config/conectar.php");
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
class usuario extends Conexion
{
    private $id;
    private $usuario;
    private $password;
    
    protected $db;
    
    public function __construct($id=0,$usuario="",$password="")
    {
        $this->id=$id;
        $this->usuario=$usuario;
        $this->password=$password;
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
    public function setusuario($usuario)
    {
        $this->usuario=$usuario;
    }
    public function getusuario()
    {
        return $this->usuario;
    }
    public function setpassword($password)
    {
        $this->password=$password;
    }
    public function getpassword()
    {
        return $this->password;
    }
    public function insert()
    {
        try {
            $conectar=$this->db->prepare("INSERT INTO usuarios(id_empleado,usuario,password) value (?,?,?)");
            $conectar->execute([$this->id,$this->usuario,md5($this->password)]);
            return true;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function getAll()
    {
        try{
            $conectar=$this->db->prepare("SELECT * FROM usuarios");
            $conectar->execute();
            return $conectar->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $th){
            $th->getMessage();
        }
    }

    public function getOne()
    {
        try {
            $conectar=$this->db->prepare("SELECT * FROM usuarios WHERE id_empleado=?");
            $conectar->execute([$this->id]);
            return $conectar->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function delete()
    {
        try{ 
            $conectar=$this->db->prepare("DELETE FROM usuarios WHERE id_empleado=?");
            $conectar->execute([$this->id]);
        }catch(Exception $th){
            $th->getMessage();
        }
    }

    public function update()
    {
        try {
            $conectar=$this->db->prepare("UPDATE usuarios SET usuario=?, password=? WHERE id_empleado=?");
            $conectar->execute([$this->usuario,md5($this->password),$this->id]);
            
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

}
?>