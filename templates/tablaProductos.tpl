{include 'templates/header.tpl'}
<div class="tbl-productos">
    <h1> LISTA DE PRODUCTOS </h1>
    <!--SI ES ADMINISTRADOR -->
    {if (isset($userLogged) && $userLogged['admin'])}
        {include 'templates/formAddProd.tpl'}
    {/if} 
    <form class="tblProds-form" action="verPorCategoria" method="POST">
       <select  name="Parametro_filtro" class="form-select" aria-label="Default select example">
            <option selected>Categorias</option>
            {foreach from=$listaCategorias item=categoria}
                <option value="{$categoria->categoria}"> {$categoria->categoria}
                </option>
            {/foreach}
       </select>
      <button id="botonFiltro" class="btn btn-dark">Filtrar</button>
    </form>
<div class="m-0 row justify-content-center">
    <div class=" col-auto m-2 text-center" style="height: 540px; overflow: scroll;">
        <table class="table  table-dark">
            <thead>
                <tr id="tbl-prods" class="align-middle">
                    <th style=" position: sticky; top: 0; z-index: 1; ">#</th>
                    <th style=" position: sticky; top: 0; z-index: 1; ">PRODUCTO</th>
                    <th style=" position: sticky; top: 0; z-index: 1; ">PRECIO</th>
                    <th style=" position: sticky; top: 0; z-index: 1; ">DETALLE</th>
                    <th style=" position: sticky; top: 0; z-index: 1; ">CATEGORIA</th>  
                    <th style=" position: sticky; top: 0; z-index: 1; ">VER</th> 
                    <!--SI ES ADMINISTRADOR -->
                    {if (isset($userLogged) && $userLogged['admin'])}       
                        <th style=" position: sticky; top: 0; z-index: 1; ">EDITAR</th>        
                        <th style=" position: sticky; top: 0; z-index: 1; ">ELIMINAR</th>     
                    {/if}                           
                </tr>
            </thead>
            <tbody>
                {foreach from=$listaProductos item=producto}
                    <tr class="align-middle">
                        <td class="content-prod">{$producto->id_prod}</td>
                        <td>{$producto->producto}</td>
                        <td>{$producto->precio}</td>
                        <td>{$producto->detalle}</td>
                        <td>{$producto->categoria}</td>
                        <td>
                            <button id="botonVer"
                                onclick="location.href='verProducto/{$producto->id_prod}'">Ver</button>
                         </td>
                        <!--SI ES ADMINISTRADOR -->
                        {if (isset($userLogged) && $userLogged['admin'])}
                            <td>
                                <button id="botonEditar"
                                    onclick="location.href='formProducto/{$producto->id_prod}'">Editar</button>
                            </td>  
                            <td>
                                <button id="botonEliminar"
                                    onclick="location.href='borrarProducto/{$producto->id_prod}'">Eliminar</button>
                            </td>  
                        {/if}
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>
</div>
{include 'templates/footer.tpl'}