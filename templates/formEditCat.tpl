{include 'templates/header.tpl'}
<div class="container">
    <form action="editarCategoria/{$id}" method="POST">
        <label for="Nombre">Nombre </label>
        <input type="text" name="Parametro_Nombre" required />
        <button id="botonEditar">Editar Categoria</button>
    </form>
</div>
{if $error}
    <div class="alert alert-danger" role="alert">
        {$error}
    </div>
{/if}
{include 'templates/footer.tpl'}