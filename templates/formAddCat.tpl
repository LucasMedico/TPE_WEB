<div class="container">
    <form class="container-addCat" action="agregarCategoria" method="POST">
   <label for="nombre"></label>
         <input type="text"  name="Parametro_Nombre"   class="form-control" 
                placeholder="Categoria" 
                aria-describedby="basic-addon1"  required >
<label for="Unidades"></label>
         <input type="text"  name="Parametro_Unidades"  class="form-control" 
                placeholder="unidades por pack" 
                aria-describedby="basic-addon1"  required >
<label for="Apto-vegan"></label>
         <input type="text"  name="str_usuario"  class="form-control" 
                placeholder="apto-vegan?" 
                aria-describedby="basic-addon1"  required >

<button id="botonAgregar" class="btn btn-secondary">Agregar categoria</button>
            
    </form>
</div>
{if $error}
    <div class="alert alert-danger" role="alert">
        {$error}
    </div>
{/if}
