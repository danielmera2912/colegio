<?php
class Profesor
{
	private $pdo;
    
    public $id;
    public $Nombre;
    public $Apellido;
    public $Sexo;
    public $FechaRegistro;
    public $FechaNacimiento;
    public $Foto;
    public $Correo;

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

			$stm = $this->pdo->prepare("SELECT * FROM profesores");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM profesores WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM profesores WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE profesores a SET 
						a.Nombre          = ?, 
						a.Apellido        = ?,
                        a.Correo        = ?,
						a.Sexo            = ?, 
						a.FechaNacimiento = ?
				    WHERE a.id = ?";

			$this->pdo->prepare($sql)
			->execute(
			array(
				$data->Nombre, 
				$data->Apellido,
				$data->Correo,
				$data->Sexo,
				$data->FechaNacimiento,
				$data->id
			)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Profesor $data)
	{
		try 
		{
			$sql = "INSERT INTO profesores (Nombre,Correo,Apellido,Sexo,FechaNacimiento,FechaRegistro) 
			VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->Nombre,
                    $data->Correo, 
                    $data->Apellido, 
                    $data->Sexo,
                    $data->FechaNacimiento,
                    date('Y-m-d')
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}