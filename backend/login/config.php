<?php
require_once("../config/conectar.php");

class Login extends Conexion
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
    public function setUsuario($usuario)
    {   
        $this->usuario=$usuario;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setPassword($password)
    {   
        $this->password=$password;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function selectAll()
    {
        try {
            $stm=$this->db->prepare("SELECT * FROM usuarios");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
    public function loginAd()
    {
        try {
            $stm=$this->db->prepare("SELECT * FROM usuarios WHERE usuario=? && password=?");
            $stm->execute([$this->usuario,md5($this->password)]);
            $user=$stm->fetchAll(PDO::FETCH_ASSOC);
            print_r($user);
            if(count($user)>0){
                $_SESSION['user']=$user[0]['usuario'];
                $_SESSION['id']=$user[0]['id_usuario'];
                return true;
            }else{
                return false;
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}


?>