<div class="container">
    <h3>Cambiar contraseña</h3>


    <form action="<?= base_url('clientes/guardar_pass') ?>" method="post" class="form-horizontal">

        <input type="hidden" name="id_cliente" value="<?= $cliente->id_cliente ?>">

        <div class="form-group">
            <label class="col-sm-2 control-label">Usuario</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" value="<?= $cliente->usuario ?>" disabled>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Nueva contraseña</label>
            <div class="col-sm-4">
                <input type="password" name="clave" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>

    </form>
</div>
