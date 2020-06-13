<?php
class Usuario 
{
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $idPerfil;

    public function __construct($id,$nombre,$email){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
       
    }
   
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }
   
}

?>