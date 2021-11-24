<label for="contraseña">Contraseña </label>
<input type="password" name="pass_contraseña" placeholder="" required  />
{if $error}
    <div class="alert alert-danger" role="alert">
        {$error}
    </div>
{/if}