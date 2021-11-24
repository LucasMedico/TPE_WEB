'use strict';

//Obtiene el ID desde el url
 function getProductID() {
    let urlParts = window.location.href.split('/');
    return parseInt(urlParts[urlParts.length - 1]);
}

// Recupera el valor de las estrellas, si todavia no se eligio ninguna devuelve 0
function getStarValue()
{
    let star = document.querySelector('input[name="rating"]:checked');
    if ( star != null)
        return star.value;
    else
        return 0;
}

//Limpia los datos del comentario
function resetData()
{
    //Limpia el textarea
    document.getElementById("userComment").value= "";
    //Limpia las estrellas
    document.querySelector('input[name="rating"]:checked').checked = false;
}

/*ZONA DE API REST*/

function getProductComments() {
    //Inicio de mi lista de comentarios
    listaComentarios.error = false;
    listaComentarios.loading = true;
    listaComentarios.notComment=false;
    listaComentarios.productComments = [];
    //Obtengo de que Producto se cargan los comentarios
    let productID = getProductID();
    fetch('api/comments/'+productID)
    .then( response =>{ 
        if (response.status == 200)
        {
            return response.json();
            
        }else{
            return null;
        }
    })
    .then (productComments => {
        if (productComments == null)
        {
            // Hubo un error
            listaComentarios.error = true;
        }
        else{
            if (productComments == "Sin comentarios") {
            listaComentarios.notComment=true;
            }
            else {
                // Obtengo todos los comentarios de un producto y lo guardo en la lista de comentarios
                listaComentarios.productComments = productComments;
            }
        }
        // Termina la carga de informacion
        listaComentarios.loading = false;
        
    })
    .catch(exception => console.log(exception));
}

function newProductComment(comment) {
    fetch('api/comment', {
        method: 'POST',
        headers: {'Content-Type':'application/json'},
        mode: 'cors',
        body: JSON.stringify(comment)
    })
    .then( response =>{ 
        if (response.status == 200)
        {
            getProductComments();
            alert('El comentario fue agregado');
            
        }else{
            alert('El comentario no se agrego');
        }
    })
    .catch(exception => console.log(exception));
}

function deleteProductComment(commentID) {
    fetch('api/comment/'+commentID,{
        method: 'DELETE',
        mode: 'cors'
    }) 
    .then( response =>{ 
        if (response.status == 200)
        {
            getProductComments();
            alert('El comentario fue eliminado');
            
        }else{
            if (response.status == 405){
                alert('El comentario no pudo ser eliminado por que el usuario ingresado no es Administrador');
            }else{
                alert('El comentario no pudo ser eliminado');
            }
        }
    })
    .catch(exception => console.log(exception));
}

/*FIN ZONA DE API REST*/
// carga los comentarios ni bien se carga la página (se llama desde producto)
$(document).ready(function (){
    getProductComments();
});

/* ZONA DE VUE*/
let listaComentarios = new Vue({
    //nombre del div donde se carga
    el: '#comments', 
    data: {
        error: false,
        //lo pone en true ya que los metodos se encargaran de ponerlo en false cuando terminen
        loading: true,
        notComment: false,
         // Muestra si la sesion es de un admin
        visible: document.querySelector("#seccionComentario").getAttribute('visible') == 1,
        //arreglo de recepcion de la informacion
        productComments: []
    },
    methods: {
         //Funcion de eliminar del boton en el template
         eliminarComentario: function (commentID) {
        deleteProductComment(commentID);
        }
    }
});

let nuevoComentario = new Vue({
    //nombre del div donde se carga
    el:'#newComment',
    data: {
        userComment: null,
        //Oculta si no hay una sesion activa
        visible: document.querySelector("#seccionComentario").getAttribute('visible')
    },
    methods: 
    {
        // Responde al botón en el formulario de Vue
        guardarComentario: function(e) {
            // Previene la recarga automática de la página
            e.preventDefault(e);
            // Prepara un json
            let comment = {
                product: getProductID(), 
                calificacion: getStarValue(),
                comentario: userComment.value
            }
            // Envía el JSON al método para postear el comentario asegurando que se puso una valoracion        
            if ( comment.calificacion != 0)
            {
                newProductComment(comment);
                // Limpia los campos en la pagina
                resetData();
            }
            else{
                alert('No olvides dar una nota ;-)');
            }
        },
    },
});
/*FIN ZONA DE VUE*/
