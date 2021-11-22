{include 'templates/header.tpl'}

<div class="form-container">
    <form action="verify" method="POST">
   
         <label for="nombre"></label>
         <input type="text"  name="str_usuario"  class="form-control" 
                placeholder="Nombre de usuario" aria-label="Username" 
                aria-describedby="basic-addon1"  required >
  
{include 'templates/formPass.tpl'}
       
        <button class="btn1-form">Ingresar</button>
  
    </form>
    <p>¿No tiene cuenta?</p>

     <button id="botonCrearCuenta" onclick="location.href='registro'"  
            type="button" class="btn btn-secondary">Crear cuenta</button>

</div>

{include 'templates/footer.tpl'}