{include 'templates/header.tpl'}
<div class="tbl-categorias">
<h1> LISTA DE CATEGORIAS </h1>
<!--SI ES ADMINISTRADOR -->
{if (isset($userLogged) && $userLogged['admin'])}
    {include 'templates/formAddCat.tpl'}
{/if} 
<div class="m-0 row justify-content-center">
    <div class=" col-auto m-2 text-center" style="height: 540px; overflow: scroll;">
        <table class="table  table-dark">
        <thead>
            <tr id="firstRowCat" class="align-middle">
                <th style=" position: sticky; top: 0; z-index: 1; ">Categoria</th>
                <th style=" position: sticky; top: 0; z-index: 1; ">Unidades por pack</th>  
                <th style=" position: sticky; top: 0; z-index: 1; ">Apto-vegan</th>  
                <!--SI ES ADMINISTRADOR -->
                {if (isset($userLogged) && $userLogged['admin'])}
                    <th style=" position: sticky; top: 0; z-index: 1; ">EDITAR</th>        
                    <th style=" position: sticky; top: 0; z-index: 1; ">ELIMINAR</th>     
                {/if}   
            </tr>
        </thead>
        <tbody>
            {foreach from=$listaCategorias item=categoria}
                <tr class="align-middle">
                    <td>{$categoria->categoria}</td>
                    <td>{$categoria->package}</td>
                    <td>{$categoria->aptovegan}</td>
                    <!--SI ES ADMINISTRADOR -->
                    {if (isset($userLogged) && $userLogged['admin'])}
                        <td>
                            <button id="botonEditar"
                                onclick="location.href='formCategoria/{$categoria->categoria}'">Editar</button>
                        </td>  
                        <td>
                            <button id="botonEliminar"
                                onclick="location.href='eliminarCategoria/{$categoria->categoria}'">Eliminar</button>
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