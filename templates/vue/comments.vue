{literal}
<section id="comments">
<br>
<h3>COMENTARIOS</h3>
<br>
    <div v-if="error">
        <p>No es posible obtener la información.</p>    
    </div>
<div v-if="notComment && usuario != null">
        <p>Soyez le premier!</p>    
    </div>
<div v-if="loading">Cargando...</div>
    <div v-if="!loading">
        <div v-for="(comentario, index) in productComments">
            <div class="comentarios-div">
                <h5>Usuario: {{comentario.usuario}}</h5>
                <h6>Puntuacion: </h6>   
                <div class="star-rating">
                <div class="star-rating__wrap" disabled="true">
                <div v-if="comentario.calificacion === '5'">
                    <input class="star-rating__input" id="star-rating-5" type="radio" :name="index" value="5" checked="true"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5" title="5 out of 5 stars" ></label>
                    <input class="star-rating__input" id="star-rating-4" type="radio" :name="index" value="4"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4" title="4 out of 5 stars"></label>
                    <input class="star-rating__input" id="star-rating-3" type="radio" :name="index" value="3">
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3" title="3 out of 5 stars"></label>
                    <input class="star-rating__input" id="star-rating-2" type="radio" :name="index" value="2"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2" title="2 out of 5 stars"></label>
                    <input class="star-rating__input" id="star-rating-1" type="radio" :name="index" value="1"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1" title="1 out of 5 stars" ></label>
                </div>
                <div v-else-if="comentario.calificacion === '4'">
                    <input class="star-rating__input" id="star-rating-5" type="radio" :name="index" value="5"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5" title="5 de 5 estrellas" ></label>
                    <input class="star-rating__input" id="star-rating-4" type="radio"  :name="index" value="4" checked="true" >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4" title="4 de 5 estrellas"></label>
                    <input class="star-rating__input" id="star-rating-3" type="radio" :name="index" value="3">
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3" title="3 de 5 estrellas"></label>
                    <input class="star-rating__input" id="star-rating-2" type="radio" :name="index" value="2"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2" title="2 de 5 estrellas"></label>
                    <input class="star-rating__input" id="star-rating-1" type="radio" :name="index" value="1"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1" title="1 de 5 estrellas" ></label>
                </div>
                <div v-else-if="comentario.calificacion === '3'">
                    <input class="star-rating__input" id="star-rating-5" type="radio" :name="index" value="5"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5" title="5 de 5 estrellas" ></label>
                    <input class="star-rating__input" id="star-rating-4" type="radio"  :name="index" value="4"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4" title="4 de 5 estrellas"></label>
                    <input class="star-rating__input" id="star-rating-3" type="radio" :name="index" value="3" checked="true">
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3" title="3 de 5 estrellas"></label>
                    <input class="star-rating__input" id="star-rating-2" type="radio" :name="index" value="2"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2" title="2 de 5 estrellas"></label>
                    <input class="star-rating__input" id="star-rating-1" type="radio" :name="index" value="1"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1" title="1 de 5 estrellas" ></label>
                </div>
                <div v-else-if="comentario.calificacion === '2'">
                    <input class="star-rating__input" id="star-rating-5" type="radio" :name="index" value="5"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5" title="5 de 5 estrellas" ></label>
                    <input class="star-rating__input" id="star-rating-4" type="radio"  :name="index" value="4"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4" title="4 de 5 estrellas"></label>
                    <input class="star-rating__input" id="star-rating-3" type="radio" :name="index" value="3">
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3" title="3 de 5 estrellas"></label>
                    <input class="star-rating__input" id="star-rating-2" type="radio" :name="index" value="2" checked="true" >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2" title="2 de 5 estrellas"></label>
                    <input class="star-rating__input" id="star-rating-1" type="radio" :name="index" value="1"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1" title="1 de 5 estrellas" ></label>
                </div>
                <div v-else>
                    <input class="star-rating__input" id="star-rating-5" type="radio" :name="index" value="5"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5" title="5 de 5 estrellas" ></label>
                    <input class="star-rating__input" id="star-rating-4" type="radio"  :name="index" value="4"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4" title="4 de 5 estrellas"></label>
                    <input class="star-rating__input" id="star-rating-3" type="radio" :name="index" value="3">
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3" title="3 de 5 estrellas"></label>
                    <input class="star-rating__input" id="star-rating-2" type="radio" :name="index" value="2"  >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2" title="2 de 5 estrellas"></label>
                    <input class="star-rating__input" id="star-rating-1" type="radio" :name="index" value="1" checked="true" >
                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1" title="1 de 5 estrellas" ></label>
                </div>
            </div>
            </div>
                <h5>Comentario: {{comentario.comentario}}</h5>
                <br>
                <button v-on:click="eliminarComentario(comentario.id_comentario)" v-show="visible" >Eliminar</button>    
                <br>
            </div>
        </div>
    </div>
</section>
{/literal}

