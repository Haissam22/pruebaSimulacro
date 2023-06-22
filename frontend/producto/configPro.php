<?php
require_once("../../config/conectar.php");
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
class producto extends Conexion
{
    private $id;
    private $nombre;
    private $imagen;
    private $precio;
    private $img;
    protected $db;
    
    public function __construct($id=0,$nombre="",$imagen="",$precio=0,$img="")
    {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->imagen=$imagen;
        $this->precio=$precio;
        $this->img=$img;
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
    public function setImagen($imagen)
    {
        $this->imagen=$imagen;
    }
    public function getImagen()
    {
        return $this->imagen;
    }
    public function setImgTemp($tmp){
        $this->img=$tmp;
    }
    public function getImgTmp()
    {
        return $this->img;
    }
    public function setPrecio($precio)
    {
        $this->precio=$precio;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function insert()
    {
        try {
            $conectar=$this->db->prepare("INSERT INTO producto(nombre,imagen,precio) value (?,?,?)");
            $conectar->execute([$this->nombre,$this->imagen,$this->precio]);
            return true;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
    public function getAll()
    {
        try{
            $conectar=$this->db->prepare("SELECT * FROM producto");
            $conectar->execute();
            return $conectar->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $th){
            $th->getMessage();
        }
    }
    public function getOne()
    {
        try {
            $conectar=$this->db->prepare("SELECT * FROM producto WHERE id_producto=?");
            $conectar->execute([$this->id]);
            return $conectar->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function delete()
    {
        try{ 
            unlink("imagenes/".$this->img);
            $conectar=$this->db->prepare("DELETE FROM producto WHERE id_producto=?");
            $conectar->execute([$this->id]);
            return true;
        }catch(Exception $th){
            $th->getMessage();
        }
    }

    public function update()
    {
        try {
            $conectar=$this->db->prepare("UPDATE producto SET nombre=?, imagen=?, precio=?WHERE id_producto=?");
            $conectar->execute([$this->nombre,$this->imagen,$this->precio,$this->id]);
            return true;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

}
?>