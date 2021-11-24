<div class="container">
    <form class="container-addProd" action="agregarProducto" method="POST">
    
     <label for="producto"></label>
         <input type="text"  name="Parametro_producto"  class="form-control" 
                placeholder="Producto"
                aria-describedby="basic-addon1"  required >
         <label for="precio"></label>
         <input type="text"  name="Parametro_precio"  class="form-control" 
                placeholder="Precio"
                aria-describedby="basic-addon1"  required >
         <label for="detalle"></label>
         <input type="text"  name="Parametro_detalle"  class="form-control" 
                placeholder="Detalle"
                aria-describedby="basic-addon1"  required >
        <label for="categoria"></label>
         <select  name="Parametro_categoria" class="form-select" >
            <option selected>Categorias</option>
            {foreach from=$listaCategorias item=categoria}
                <option value="{$categoria->categoria}"> {$categoria->categoria}
                </option>
            {/foreach}
        </select>
   <button id="botonAgregar" class="btn btn-dark">Agregar</button>
    </form>
</div>
{if $error}
    <div class="alert alert-danger" role="alert">
        {$error}
    </div>
{/if}
