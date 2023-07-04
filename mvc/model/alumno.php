<?php
class Alumno
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

			$stm = $this->pdo->prepare("SELECT a.id, a.Nombre, a.Apellido, a.Sexo, a.FechaNacimiento, a.Correo, c.id as idCurso, c.Nombre as nombreCurso FROM alumnos a, cursos c, alumno_curso ac WHERE a.id = ac.Alumno_id AND ac.Curso_id = c.id");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar2()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT id, Nombre from cursos");
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
			          ->prepare("SELECT a.id, a.Nombre, a.Apellido, a.Sexo, a.FechaNacimiento, a.Correo, c.id as idCurso, c.Nombre as nombreCurso FROM 
					  alumnos a, cursos c, alumno_curso ac WHERE a.id = ac.Alumno_id AND ac.Curso_id = c.id and a.id=?");
			          

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
			            ->prepare("DELETE FROM alumnos WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data, $curso)
	{
		try 
		{
			$sql = "UPDATE alumnos a, alumno_curso ac SET 
						a.Nombre          = ?, 
						a.Apellido        = ?,
                        a.Correo        = ?,
						a.Sexo            = ?, 
						a.FechaNacimiento = ?,
						ac.Curso_id = ?
				    WHERE a.id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Nombre, 
                        $data->Apellido,
                        $data->Correo,
                        $data->Sexo,
                        $data->FechaNacimiento,
						$curso,
						$data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Alumno $data)
	{
		try 
		{
		$sql = "INSERT INTO alumnos (Nombre,Correo,Apellido,Sexo,FechaNacimiento,FechaRegistro) 
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