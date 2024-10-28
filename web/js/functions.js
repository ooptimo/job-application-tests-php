function searchPostsByUser(idUser,nombreUser)
{
    try {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'http://localhost:8080/posts/search');
        xhr.onload = function() {
          if (xhr.status === 200) {
            const respuesta = JSON.parse(xhr.responseText);
            const resultadoDiv = document.getElementById('div_posts');
            let postsUsuario = "<ul>";
            respuesta.map(
                respuesta => { 
                  if (respuesta.userId == idUser)
                  {
                    postsUsuario += "<li>" + 
                        "<strong>" + respuesta.title + "</strong><br />" + 
                        " Post creado por: User <strong>" + nombreUser + "</strong><br />" + 
                        respuesta.body + 
                        "<hr />" + 
                        "</li>";
                  }
                }
            );
            postsUsuario += "</ul>";
            resultadoDiv.innerHTML = postsUsuario;
          } else {
            throw new Error(`Error en la solicitud: ${xhr.statusText}`);
          }
        };
  
        xhr.onerror = function() {
          throw new Error('Error al cargar los datos');
        };
  
        xhr.send();
    } 
    catch (error) {
        console.error('Error al buscar los posts solicitados');
        console.error(error.message);
    }
}