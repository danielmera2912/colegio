<h1 class="page-header">Usuarios</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Usuario&a=Crud">Nuevo usuario</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre usuario</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Dirección</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nombreusuario; ?></td>
            <td><?php echo $r->clave; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->apellidos; ?></td>
            <td><?php echo $r->edad; ?></td>
            <td><?php echo $r->direccion; ?></td>
            <td>
                <a href="?c=Usuario&a=Crud&nombreusuario=<?php echo $r->nombreusuario; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Usuario&a=Eliminar&nombreusuario=<?php echo $r->nombreusuario; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
