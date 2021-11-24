{include 'templates/header.tpl'}
<div  class="registro-container">
    <form action="registrar" method="POST">
        <label for="nombre"></label>
        <input type="text"  name="str_usuario"  class="form-control" 
                placeholder="Nombre de usuario" aria-label="Username" 
                aria-describedby="basic-addon1"  required >

{include 'templates/formPass.tpl'}

        <button id="botonRegistrar"  class="btn btn-secondary" >Unete ahora!</button>
     
    </form>
</div>
{include 'templates/footer.tpl'}