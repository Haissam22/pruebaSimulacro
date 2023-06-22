<?php
require_once("../../config/conectar.php");
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
class cotizacion extends Conexion
{
    private $id;
    private $id_constructora;
    private $id_empleado;
    private $id_producto;
    private $fecha;
    private $hora;
    private $precio;
    private $duracion;
    private $horasExtras;
    private $totalPago;

    
    protected $db;
    
    public function __construct($id=0,$id_constructora=0,$id_empleado=0,$id_producto=0,$fecha="",$hora="",$precio=0,$duracion=0,$horasExtras=0,$totalPago=0)
    {
        $this->id=$id;
        $this->id_constructora=$id_constructora;
        $this->id_empleado=$id_empleado;
        $this->id_producto=$id_producto;
        $this->fecha=$fecha;
        $this->hora=$hora;
        $this->precio=$precio;
        $this->duracion=$duracion;
        $this->horasExtras=$horasExtras;
        $this->totalPago=$totalPago;
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
    public function setId_constructora($id_constructora)
    {
        $this->id_constructora=$id_constructora;
    }
    public function getId_constructora()
    {
       return $this->id_constructora;
    }
    public function setId_empleado($id_empleado)
    {
        $this->id_empleado=$id_empleado;
    }
    public function getId_empleado()
    {
       return $this->id_empleado;
    }
    public function setId_producto($id_producto)
    {
        $this->id_producto=$id_producto;
    }
    public function getId_producto()
    {
       return $this->id_producto;
    }
    public function setFecha($fecha)
    {
        $this->fecha=$fecha;
    }
    public function getFecha()
    {
       return $this->fecha;
    }
    public function setHora($hora)
    {
        $this->hora=$hora;
    }
    public function getHora()
    {
       return $this->hora;
    }
    public function setPrecio($precio)
    {
        $this->precio=$precio;

    }
    public function getPrecio()
    {
       return $this->precio;
    }
    public function setDuracion($duracion)
    {
        $this->duracion=$duracion;

    }
    public function getDuracion()
    {
       return $this->duracion;
    }
    public function sethorasExtras($horasExtras)
    {
        $this->horasExtras=$horasExtras;

    }
    public function gethorasExtras()
    {
       return $this->horasExtras;
    }
    public function settotalPago($totalPago)
    {
        $this->totalPago=$totalPago;

    }
    public function gettotalPago()
    {
       return $this->totalPago;
    }
   
    public function insertCotizacion()
    {
        try {
            $conectar=$this->db->prepare("INSERT INTO cotizacion(id_constructora,id_empleado,fecha) value (?,?,?)");
            $conectar->execute([$this->id_constructora,$this->id_empleado,$this->fecha]);
            return true;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
    public function insertDetalleCo()
    {
        try {
            $conectar=$this->db->prepare("INSERT INTO detalleCo(id_cotizacion,id_producto,fecha,hora,precio,duracion,horaExtra,totalPago) value (?,?,?,?,?,?,?,?)");
            $conectar->execute([$this->id,$this->id_producto,$this->fecha,$this->hora,$this->precio,$this->duracion,$this->horaExtra,$this->totalPago]);
            return true;
        } catch (Exception $th) {
            echo $th->getMessage();
        }

    }

    public function getAll()
    {
        try{
            $conectar=$this->db->prepare("SELECT * FROM cotizacion");
            $conectar->execute();
            return $conectar->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $th){
            $th->getMessage();
        }
    }
    public function getAllDet()
    {
        try{
            $conectar=$this->db->prepare("SELECT * FROM detalleCo WHERE id_cotizacion=?");
            $conectar->execute([$this->id]);
            return $conectar->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $th){
            $th->getMessage();
        }
    }

    public function getOne()
    {
        try {
            $conectar=$this->db->prepare("SELECT * FROM cotizacion WHERE id_cotizacion=?");
            $conectar->execute([$this->id]);
            return $conectar->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
    public function getOneDet()
    {
        try {
            $conectar=$this->db->prepare("SELECT * FROM detalleCo WHERE id_cotizacion=?");
            $conectar->execute([$this->id]);
            return $conectar->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function deleteDet()
    {
        try{ 
            $conectar=$this->db->prepare("DELETE FROM detalleCo WHERE id_cotizacion=?");
            $conectar->execute([$this->id]);
        }catch(Exception $th){
            $th->getMessage();
        }
    }
    public function delete()
    {
        try{ 
            $conectar=$this->db->prepare("DELETE FROM cotizacion WHERE id_cotizacion=?");
            $conectar->execute([$this->id]);
            return true;
        }catch(Exception $th){
            echo $th->getMessage();
        }
    }
    

    public function update()
    {
        try {
            $conectar=$this->db->prepare("UPDATE cotizacion SET id_constructora=?, id_empleado=?,fecha=? WHERE id_cotizacion=?");
            $conectar->execute([$this->id_constructora,$this->id_empleado,$this->fecha,$this->id]);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
    
    public function updateDet()
    {
        try {
            $conectar=$this->db->prepare("UPDATE detalleCo SET  id_producto=?,fecha=?,precio=?,duracion=?,horaExtra=?,totalPago=? WHERE id_cotizacion=?");
            $conectar->execute([$this->id_producto,$this->fecha,$this->precio,$this->duracion,$this->horaExtra,$this->totalPago]);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

}
?>