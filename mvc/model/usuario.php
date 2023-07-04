<?php
class Usuario
{
	private $pdo;
    
    public $nombreusuario;
    public $clave;
    public $nombre;
    public $apellidos;
    public $edad;
    public $direccion;


	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM usuarios");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Verificar($nombreusuario,$clave){
        try{
            $sql = "SELECT nombreusuario,clave FROM usuarios WHERE nombreusuario=?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$nombreusuario]);
            $count = $stm->rowCount();
            if($count>0){
                $result = $stm->fetch();
                if(password_verify($clave,$result[1])){
                    return true;
                }
                else {
                    return false;
                }
            }
            else {
                return false;
            }
        } catch(Exception $ex){
            die($ex->getMessage());
        }
    }
	public function Obtener($nombreusuario)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuarios WHERE nombreusuario = ?");
			          

			$stm->execute(array($nombreusuario));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    

	public function Eliminar($nombreusuario)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM usuarios WHERE nombreusuario = ?");			          

			$stm->execute(array($nombreusuario));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE usuarios SET 
						clave        = ?,
                        nombre        = ?,
						apellidos            = ?, 
						edad = ?,
                        direccion = ?
				    WHERE nombreusuario = ?";

			$this->pdo->prepare($sql)
			->execute(
			array(
				$data->clave, 
				$data->nombre,
				$data->apellidos,
				$data->edad,
				$data->direccion,
				$data->nombreusuario
			)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Usuario $data)
	{
		try 
		{
			$sql = "INSERT INTO usuarios (nombreusuario,clave,nombre,apellidos,edad,direccion) 
			VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nombreusuario,
                    $data->clave,
					$data->nombre, 
                    $data->apellidos, 
                    $data->edad,
                    $data->direccion
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}