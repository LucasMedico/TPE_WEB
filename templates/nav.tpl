<ul id="navBar" class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link " aria-current="page" href="inicio">Inicio</a></li>
    </li>
    <li class="nav-item">
             <a class="nav-link" href="tablaProductos">Productos</a></li>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="tablaCategorias">Categorias</a></li>
    </li>
<li>
 <!--SI HAY UN USUARIO ACTIVO-->
  {if isset($userLogged) && $userLogged}        
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      {$userLogged['user']}
    </a>        
<!--SI EL USUARIO ACTIVO NO ES ADMINISTRADOR-->
 <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
  {if (!($userLogged['admin']))}       
        <li><a class="dropdown-item" href="perfilUsuario">Tu perfil</a><span class="sr-only"></span></li>
      {else}
        <li><a class="dropdown-item" href="usuarios">Lista de users<span class="sr-only"></span></a></li>
      {/if}
      <li >
            <a class="dropdown-item" href="logout">Salir<span class="sr-only"></span></a>
</li>
</ul>
  </li>
    {else}
    <!--SI NO HAY UN USUARIO ACTIVO-->
    <li class="nav-item">
      <a class="nav-link" href="login">Login<span class="sr-only"></span></a></li>
    </li>
    <li class="nav-item">
          <a class="nav-link" href="registro">Registrar<span class="sr-only"></span></a></li>
    </li>
            {/if}
        </li>            
      </ul>
    </ul>
</nav>
