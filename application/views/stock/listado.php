<div class="container">
    <h3>Listado de Productos</h3>

    <!-- Buscador -->
    <div class="row">
        <div class="col-md-4">
            <input type="text" id="buscador" class="form-control" placeholder="Buscar por nombre...">
        </div>
    </div>

    <br>

    <!-- Tabla -->
    <table class="table table-bordered table-striped" id="tablaProductos">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($productos as $p): ?>
                <tr>
                    <td><?= $p->bodega ?></td>
                    <td class="nombre"><?= $p->nombre ?></td>
                    <td><?= $p->q ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
// Buscador en vivo
document.getElementById("buscador").addEventListener("keyup", function() {
    let filtro = this.value.toLowerCase();
    let filas = document.querySelectorAll("#tablaProductos tbody tr");

    filas.forEach(function(fila) {
        let nombre = fila.querySelector(".nombre").textContent.toLowerCase();
        fila.style.display = nombre.includes(filtro) ? "" : "none";
    });
});
</script>
