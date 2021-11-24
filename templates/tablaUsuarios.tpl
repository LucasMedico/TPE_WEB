{include 'templates/header.tpl'}
<div class="tbl-productos">
    <h1 id="h1-users"> LISTA DE USUARIOS </h1>
    <div id="content-tbl-users" class=" col-auto m-2 text-center">
        <div class=" col-auto m-2 text-center">
            <table class="table">
                <thead>
                    <tr  id="head-tbl-users" class="align-middle">
                        <th style=" position: sticky; top: 0; z-index: 1; ">USUARIO</th>
                        <th style=" position: sticky; top: 0; z-index: 1; ">PERMISOS DE ADMINISTRACION</th>
                        <th style=" position: sticky; top: 0; z-index: 1; ">ACCIONES</th>
                        <th style=" position: sticky; top: 0; z-index: 1; ">BORRAR</th>
                    </tr>
                </thead>
                <tbody id="body-tbl-users">
                    {foreach from=$listaUsuarios item=user}
                        <tr class="align-middle">
                            {if (isset($userLogged) && $userLogged['admin'])}
                                <td>{$user->usuario}</td>
                                <td>{if {$user->esAdmin}==1} SI {else} NO {/if}</td>
                                {if {$user->esAdmin}==1}
                                    <td>
                                        <button onclick="location.href='bajaAdmin/{$user->ID_usuario}'">Quitar Permisos</button>
                                    </td>
                                {else}
                                    <td>
                                        <button onclick="location.href='altaAdmin/{$user->ID_usuario}'">Dar Permisos</button>
                                    </td>
                                {/if}
                                <td>
                                    <button onclick="location.href='eliminarUser/{$user->ID_usuario}'">BORRAR</button>
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