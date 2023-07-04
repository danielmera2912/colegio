<?php
session_start();
require_once 'model/usuario.php';

class UsuarioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Usuario();
    }

    public function index(){
        if(isset($_SESSION['login'])){
            header("Location: alumno.php");
        }
        else{
            require_once 'view/usuario/usuario.php';
            require_once 'view/footer.php';
        }
        
    }
    public function Index_Gestion(){
        require_once 'view/header.php';
        require_once 'view/usuario/gestion_usuario.php';
        require_once 'view/footer.php';
    }
    public function Crud(){
        $alm = new Usuario();
        
        if(isset($_REQUEST['nombreusuario'])){
            $alm = $this->model->Obtener($_REQUEST['nombreusuario']);
        }
        
        require_once 'view/header.php';
        require_once 'view/usuario/usuario-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Autenticar(){
        $_usuario= trim($_POST['textousername']);
        $_clave= trim($_POST['textoclave']);
        $validar = $this->model->Verificar($_usuario, $_clave);
        if($validar){
            $_SESSION['login'] = $_usuario;
            header("location: alumno.php");
        }else{
            header("Location: index.php?error=Usuario y/o clave incorrectos");
        }

    }

    
    public function Guardar(){
        $alm = new Usuario();
        $alm->nombreusuario = $_REQUEST['nombreusuario'];
        $alm->clave = $_REQUEST['clave'];
        $alm->nombre = $_REQUEST['nombre'];
        $alm->apellidos = $_REQUEST['apellidos'];
        $alm->edad = $_REQUEST['edad'];
        $alm->direccion = $_REQUEST['direccion'];
        strlen($alm->nombreusuario)>0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: gestion_usuario.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['nombreusuario']);
        header('Location: gestion_usuario.php');
    }
}