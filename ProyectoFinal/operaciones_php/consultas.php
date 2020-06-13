<?php
require_once "conexion.php";
require_once "claseUsuario.php";
class Consultas extends Conexion
{
    public function iniciarSesion($email, $password, $hash)
    {
        try {
            $con = new Conexion();
            $result = $con->prepare("SELECT * FROM login WHERE login.email=:email AND login.password=:password AND login.hash=:hash; ");
            $result->bindParam(':email', $email);
            $result->bindParam(':password', $password);
            $result->bindParam(':hash', $hash);
            $result->execute();
            if ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                session_start();
                $usuario = new Usuario($rows['idLogin'], $rows['nombre'], $rows['email']);
                $_SESSION['usuario'] = serialize($usuario); //Pasar objeto usuario a sesion                
                echo 1;
                return $rows;
            } else {
                echo 0;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }

    public function comprobarCorreo($correo)
    {
        try {
            $con = new Conexion();
            $result = $con->prepare("SELECT * FROM login WHERE login.email=:correo; ");
            $result->bindParam(':correo', $correo);
            $result->execute();
            if ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                return $rows;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }

    public function verClasificacion()
    {
        try {
            $con = new Conexion();
            $result = $con->prepare("SELECT * FROM clasificacion;");

            $result->execute();
            if ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
                return $rows;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }

    public function verIdiomas()
    {
        try {
            $con = new Conexion();
            $result = $con->prepare("SELECT * FROM idioma ORDER BY
            idioma.nombreIdioma ASC;");

            $result->execute();
            if ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
                return $rows;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }

    public function verTodoContenidoTOP()
    {
        try {
            $con = new Conexion();
            $result = $con->prepare("SELECT * FROM contenido WHERE
            contenido.tipoContenido BETWEEN 1 AND 2 LIMIT 10;");

            $result->execute();
            if ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
                return $rows;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }
    public function verTodoContenido()
    {
        try {
            $con = new Conexion();
            $result = $con->prepare("SELECT * FROM contenido WHERE
            contenido.tipoContenido BETWEEN 1 AND 2;");

            $result->execute();
            if ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
                return $rows;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }
    public function verContenido($id)
    {
        try {
            $con = new Conexion();
            $result = $con->prepare("SELECT * FROM contenido WHERE
            contenido.tipoContenido=:Id;");
            $result->bindParam(':Id', $id);
            $result->execute();
            if ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
                return $rows;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }

    public function verProgramaskids($id1, $id2)
    {
        try {
            $con = new Conexion();
            $result = $con->prepare("SELECT * FROM contenido WHERE contenido.Clasificacion_idClasificacion<=:id1 AND contenido.tipoContenido=:id2;");
            $result->bindParam(':id1', $id1);
            $result->bindParam(':id2', $id2);
            $result->execute();
            if ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
                return $rows;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }
    public function verPeliculaskids($id1, $id2)
    {
        try {
            $con = new Conexion();
            $result = $con->prepare("SELECT * FROM contenido WHERE contenido.Clasificacion_idClasificacion<=:id1 AND contenido.tipoContenido=:id2;");
            $result->bindParam(':id1', $id2);
            $result->bindParam(':id2', $id1);
            $result->execute();
            if ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
                return $rows;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }

    public function verContenidoFamilia($id2)
    {
        try {
            $con = new Conexion();
            $result = $con->prepare("SELECT * FROM contenido WHERE  contenido.tipoContenido=:id2;");
            $result->bindParam(':id2', $id2);
            $result->execute();
            if ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
                return $rows;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }

    public function verPeliculasFamilia($id2)
    {
        try {
            $con = new Conexion();
            $result = $con->prepare("SELECT * FROM contenido WHERE  contenido.tipoContenido=:id2;");
            $result->bindParam(':id2', $id2);
            $result->execute();
            if ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
                return $rows;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }

    public function verPeliculasAleatorio($id2)
    {
        try {
            $con = new Conexion();
            $result = $con->prepare("SELECT * FROM contenido WHERE  contenido.tipoContenido=:id2 AND contenido.Clasificacion_idClasificacion >2;");
            $result->bindParam(':id2', $id2);
            $result->execute();
            if ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
                return $rows;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }

    public function verContenidoAleatorio($id2)
    {
        try {
            $con = new Conexion();
            $result = $con->prepare("SELECT * FROM contenido WHERE  contenido.tipoContenido=:id2 AND contenido.Clasificacion_idClasificacion >2;");
            $result->bindParam(':id2', $id2);
            $result->execute();
            if ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
                return $rows;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }


    public function verPerfilEditar($id,$perfil)
    {
        try {
            $con = new Conexion();
            $result = $con->prepare("SELECT * FROM clasificacion INNER JOIN perfil ON clasificacion.idClasificacion = perfil.Clasificacion_idClasificacion
             INNER JOIN idioma ON idioma.idIdioma = perfil.Idioma_idIdioma WHERE perfil.Login_idLogin =:Id AND perfil.nombrePerfil =:perfil;");
            $result->bindParam(':Id', $id);
            $result->bindParam(':perfil', $perfil);
            $result->execute();
            if ($rows = $result->fetch(PDO::FETCH_ASSOC)) {
                return $rows;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }
    public function getCategoria()
    {
        try {
            $con = new Conexion();
            $result = $con->prepare("SELECT * FROM categoria;");
            $result->execute();
            if ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
                return $rows;
            } 
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }
    public function busqueda($nombre)
    {
        try {
            $con = new Conexion();
            $result = $con->prepare("SELECT * FROM contenido WHERE contenido.nombre LIKE '$nombre%';");
            $result->execute();
            if ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
                return $rows;
            } else {
                die('<center><h1>No se encontro ninguna conincidencia</h1></center>');
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }
    public function verPerfil($id)
    {
        try {
            $con = new Conexion();
            $result = $con->prepare("SELECT perfil.idPerfil,perfil.nombrePerfil, perfil.foto,idioma.nombreIdioma,clasificacion.nombreClasificacion FROM clasificacion 	INNER JOIN perfil ON clasificacion.idClasificacion = perfil.Clasificacion_idClasificacion
	        INNER JOIN idioma ON idioma.idIdioma = perfil.Idioma_idIdioma WHERE	perfil.Login_idLogin =:Id;");
            $result->bindParam(':Id', $id);
            $result->execute();
            if ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
                return $rows;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }

    public function perfilDefault($id)
    {
        $con = new Conexion();
        $sql = "SELECT idLogin,nombre FROM login WHERE idLogin=$id";
        $result = $con->query($sql);
        // output data of each row
        $row = $result->fetch();
        //echo "id: " . $row["idLogin"] . " - Name: " . $row["nombre"] . "<br>";
        $perfil = "INSERT INTO perfil (idPerfil,nombrePerfil,Idioma_idIdioma,Clasificacion_idClasificacion,foto,Login_idLogin) VALUES 
        (NULL, 'Familiar', '5', '5','../icono/user.png', $row[idLogin]),
        (NULL, 'Kids', '1', '1', '../icono/user.png', $row[idLogin])";
        $con->query($perfil);
    }

    public function getEndUser()
    {
        try {
            $con = new Conexion();
            $sql = "SELECT MAX(idLogin) AS idLogin FROM login";
            $query = $con->prepare($sql);
            $query->execute();
            $row = $query->fetch();
            if ($row > 0) {
                return $row['idLogin'];
            } else {
                echo 0;
            }
        } catch (PDOException $th) {
            return 'Ha ocurrido un error!!';
        }
    }

    public function buscarPerfil($id, $cuenta)
    {
        try {
            $con = new Conexion();
            $result = $con->prepare("SELECT * FROM perfil INNER JOIN login ON perfil.Login_idLogin = login.idLogin WHERE login.email=:cuenta AND perfil.nombrePerfil=:perfil;");
            $result->bindParam(':perfil', $id);
            $result->bindParam(':cuenta', $cuenta);
            $result->execute();
            if ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
                return $rows;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }
    public function registrarPerfil($nombre,$clasificacion,$idioma,$id,$foto)
    {       
        try {
            $con = new Conexion();
            $insert = $con->prepare("INSERT INTO perfil (perfil.nombrePerfil,perfil.Idioma_idIdioma,perfil.Clasificacion_idClasificacion,perfil.foto,perfil.Login_idLogin) 
            VALUES (:nombre,:idioma,:clasificacion,:foto,:id)");
            $insert->bindParam(':nombre', $nombre);
            $insert->bindParam(':idioma', $idioma);
            $insert->bindParam(':clasificacion', $clasificacion);
            $insert->bindParam(':foto',$foto);
            $insert->bindParam(':id', $id);
            $insert->execute();

            if ($insert->rowCount() > 0) {

                echo 1;
                return $insert;
            } else {
                echo 0;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }

    public function registrarUsuario($nombre, $email, $password, $hash, $estado)
    {
        try {
            $con = new Conexion();
            $insert = $con->prepare("INSERT INTO login (login.nombre,login.email,login.password,login.hash,login.estado) VALUES (:nombre,:email,:password,:hash,:estado)");
            $insert->bindParam(':nombre', $nombre);
            $insert->bindParam(':email', $email);
            $insert->bindParam(':password', $password);
            $insert->bindParam(':hash', $hash);
            $insert->bindParam(':estado', $estado);
            $insert->execute();

            if ($insert->rowCount() > 0) {

                echo 1;
                return $insert;
            } else {
                echo 0;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }

    public function actualizarPerfil($nombre, $idIdioma, $clasificacion, $foto, $idLogin,$perfil)
    {
        try {
            $con = new Conexion();
            $insert = $con->prepare("UPDATE perfil SET perfil.nombrePerfil =:nombre ,perfil.Idioma_idIdioma=:idioma, perfil.Clasificacion_idClasificacion=:clasif, perfil.foto=:foto 
            WHERE perfil.nombrePerfil =:IdP AND perfil.Login_idLogin=:IdLogin;");
            $insert->bindParam(':nombre', $nombre);
            $insert->bindParam(':idioma', $idIdioma);
            $insert->bindParam(':clasif', $clasificacion);
            $insert->bindParam(':foto', $foto);
            $insert->bindParam(':IdP', $perfil);
            $insert->bindParam(':IdLogin', $idLogin);
            $insert->execute();

            if ($insert->rowCount() > 0) {
                echo 1;
                return $insert;
            } else {
                echo 0;
            }
        } catch (PDOException $e) {
            return 'Ha ocurrido un error!!';
        }
    }
}//Fin clase
