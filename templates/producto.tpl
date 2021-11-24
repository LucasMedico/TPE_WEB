{include 'templates/header.tpl'}
<div class="tbl-productos">
    <h1 id="h1-singleProd">PRODUCTO</h1>
<div class="m-0 row justify-content-center">
    <div class=" col-auto m-2 text-center" style="height: 540px; overflow: scroll;">
        <table class="table  table-dark">
            <thead id="singleProd">
                <tr class="align-middle">
                    <th style=" position: sticky; top: 0; z-index: 1; ">#</th>
                    <th style=" position: sticky; top: 0; z-index: 1; ">PRODUCTO</th>
                    <th style=" position: sticky; top: 0; z-index: 1; ">PRECIO</th>
                    <th style=" position: sticky; top: 0; z-index: 1; ">DETALLE</th>
                    <th style=" position: sticky; top: 0; z-index: 1; ">CATEGORIA</th> 
                    <!--SI ES ADMINISTRADOR -->
                    {if (isset($userLogged) && $userLogged['admin'])} 
                        <th style=" position: sticky; top: 0; z-index: 1; ">EDITAR</th>        
                        <th style=" position: sticky; top: 0; z-index: 1; ">ELIMINAR</th>
                    {/if}
                </tr>
            </thead>
            <tbody>
                    <tr class="align-middle">
                        <td>{$producto->id_prod}</td>
                        <td>{$producto->producto}</td>
                        <td>{$producto->precio}</td>
                        <td>{$producto->detalle}</td>
                        <td>{$producto->categoria}</td>
                        <!--SI ES ADMINISTRADOR -->
                        {if (isset($userLogged) && $userLogged['admin'])}
                            <td>
                                <button id="botonEditar" class="btn btn-dark"
                                    onclick="location.href='formProducto/{$producto->id_prod}'">Editar</button>
                            </td>  
                            <td>
                                <button id="botonEliminar" class="btn btn-dark"
                                    onclick="location.href='borrarProducto/{$producto->id_prod}'">Eliminar</button>
                            </td> 
                        {/if}
                    </tr>
            </tbody>
        </table>
        <section id = seccionComentario visible= {isset($userLogged)}>
            {include 'templates/vue/formComment.vue'}
            {include 'templates/vue/comments.vue'}
        </section>
        <script src="js/comments.js"></script> 
    </div>
</div>

{include 'templates/footer.tpl'}