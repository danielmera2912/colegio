<h1 class="page-header">
    <?php echo $alm->nombreusuario != null ? $alm->nombreusuario : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Profesor">Usuarios</a></li>
  <li class="active"><?php echo $alm->nombreusuario != null ? $alm->nombreusuario : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-usuario" action="?c=Usuario&a=Guardar" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nombre usuario</label>
        <input type="text" name="nombreusuario" value="<?php echo $alm->nombreusuario; ?>" class="form-control" placeholder="Ingrese su nombre de usuario"  />
    </div>
    
    <div class="form-group">
        <label>Clave</label>
        <input type="password" name="clave" value="<?php echo $alm->clave; ?>" class="form-control" placeholder="Ingrese su contraseña"  />
    </div>
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $alm->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Apellidos</label>
        <input type="text" name="apellidos" value="<?php echo $alm->apellidos; ?>" class="form-control" placeholder="Ingrese sus apellidos" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Edad</label>
        <input type="text" name="edad" value="<?php echo $alm->edad; ?>" class="form-control" placeholder="Ingrese su edad" />
    </div>

    <div class="form-group">
        <label>Dirección</label>
        <input type="text" name="direccion" value="<?php echo $alm->direccion; ?>" class="form-control" placeholder="Ingrese su dirección" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-profesor").submit(function(){
            return $(this).validate();
        });
    })
</script>