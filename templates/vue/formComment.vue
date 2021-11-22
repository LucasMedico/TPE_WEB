{literal}
<section id="newComment" v-show="visible">
    <br>
      <div class="star-rating">
      <div class="star-rating__wrap">
        <input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5">
        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5" title="5 de 5 estrellas"></label>

        <input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4">
        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4" title="4 de 5 estrellas"></label>

        <input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3">
        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3" title="3 de 5 estrellas"></label>

        <input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2">
        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2" title="2 de 5 estrellas"></label>
        
        <input class="star-rating__input" id="star-rating-1" type="radio" name="rating" value="1">
        <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1" title="1 de 5 estrellas"></label>
      </div>
      </div>
    <br>
    <textarea v-model="userComment" id="userComment" placeholder="Ingrese el comentario aqui..."></textarea>
    <br>
    <button v-on:click="guardarComentario">Postear</button>
    <br>
</section>
{/literal}