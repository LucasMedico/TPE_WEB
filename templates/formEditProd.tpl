{include 'templates/header.tpl'}
<div class="container">
    <form action="editarProducto/{$id}" method="POST">
        <label for="producto">Producto </label>
        <input type="text" name="Parametro_producto" required />
        <label for="precio">Precio</label>
        <input type="number" name="Parametro_precio" required  />
        <label for="detalle">Detalle</label>
        <input type="text" name="Parametro_detalle" required  />
        <label for="categoria">Categoria:</label>
        <select name="Parametro_categoria">
            {foreach from=$listaCategorias item=categoria}
                <option value="{$categoria->categoria}"> {$categoria->categoria}
                </option>
            {/foreach}
        </select>
<button id="botonEditar" class="btn btn-dark">Dark</button>
    </form>
</div>
{if $error}
    <div class="alert alert-danger" role="alert">
        {$error}
    </div>
{/if}
{include 'templates/footer.tpl'}