<?php
// Iniciamos la sesión para poder acceder a las variables de sesión
session_start();

// Obtenemos el nombre del usuario de la sesión o de la cookie
$usuario = $_SESSION['usuario'] ?? ($_COOKIE['usuario'] ?? '');

// Si no hay un usuario en la sesión ni en la cookie, redirigimos a login.php
if ($usuario === '') {
    header('Location: login.php');
    exit;
}

// Guardamos el nombre del usuario en la sesión para asegurarnos de que esté disponible durante el quiz
$_SESSION['usuario'] = $usuario;

// Obtenemos el número de preguntas respondidas hasta ahora desde la sesión, por defecto es 0
// Con esto conseguimos que si el usuario vuelve a entrar al quiz, pueda continuar desde donde lo dejó
// Damos un valor por defecto de 0 si no hay respuestas guardadas en la sesión

$respondidas = isset($_SESSION['respuestas']) ? count($_SESSION['respuestas']) : 0;

?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <title>Quiz Nostalgia TV 2000</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>

  <!-- Creamos todo el formulario del quiz, con cada pregunta en un div separado y oculto, que se irá mostrando según el progreso del usuario -->
    <div class="tarjeta-principal">
      <div id="pantalla-quiz" class="activa">
        <form action="procesar.php" method="post" id="form-quiz">
          
          <!-- PREGUNTA 1 -->
          <div class="pregunta-bloque activa" id="bloque-1">
            <span class="texto-progreso">Pregunta 1 de 10</span>
            <div class="caja-imagen">
              <img src="imagenes/pokemon.png" alt="Pokémon" class="imagen-quiz" />
            </div>
            <h2 class="titulo-pregunta">¿A qué serie corresponde esta imagen?</h2>
            <div class="contenedor-opciones">
              <label class="item-opcion"><input type="radio" name="preg1" value="a" required /> Digimon</label>
              <label class="item-opcion"><input type="radio" name="preg1" value="b" /> Pokémon</label>
              <label class="item-opcion"><input type="radio" name="preg1" value="c" /> Beyblade</label>
              <label class="item-opcion"><input type="radio" name="preg1" value="d" /> Yu-Gi-Oh!</label>
            </div>
            <button type="button" class="btn btn-siguiente" data-next="2">Siguiente ➔</button>
          </div>

          <!-- PREGUNTA 2 -->
          <div class="pregunta-bloque oculto" id="bloque-2">
            <span class="texto-progreso">Pregunta 2 de 10</span>
            <div class="caja-imagen">
              <img src="imagenes/doraemon.jpg" alt="Doraemon" class="imagen-quiz" />
            </div>
            <h2 class="titulo-pregunta">¿A qué serie corresponde esta imagen?</h2>
            <div class="contenedor-opciones">
              <label class="item-opcion"><input type="radio" name="preg2" value="a" required /> Shin-Chan</label>
              <label class="item-opcion"><input type="radio" name="preg2" value="b" /> Ninja Hattori</label>
              <label class="item-opcion"><input type="radio" name="preg2" value="c" /> Doraemon</label>
              <label class="item-opcion"><input type="radio" name="preg2" value="d" /> Keroro</label>
            </div>
            <button type="button" class="btn btn-siguiente" data-next="3">Siguiente ➔</button>
          </div>

          <!-- PREGUNTA 3 -->
          <div class="pregunta-bloque oculto" id="bloque-3">
            <span class="texto-progreso">Pregunta 3 de 10</span>
            <div class="caja-imagen">
              <img src="imagenes/bobEsponja.jpg" alt="Bob Esponja" class="imagen-quiz" />
            </div>
            <h2 class="titulo-pregunta">¿A qué serie corresponde esta imagen?</h2>
            <div class="contenedor-opciones">
              <label class="item-opcion"><input type="radio" name="preg3" value="a" required /> Jimmy Neutron</label>
              <label class="item-opcion"><input type="radio" name="preg3" value="b" /> Bob Esponja</label>
              <label class="item-opcion"><input type="radio" name="preg3" value="c" /> CatDog</label>
              <label class="item-opcion"><input type="radio" name="preg3" value="d" /> Los Padrinos Mágicos</label>
            </div>
            <button type="button" class="btn btn-siguiente" data-next="4">Siguiente ➔</button>
          </div>

          <!-- PREGUNTA 4 -->
          <div class="pregunta-bloque oculto" id="bloque-4">
            <span class="texto-progreso">Pregunta 4 de 10</span>
            <div class="caja-imagen">
              <img src="imagenes/winx.jpg" alt="Las Winx" class="imagen-quiz" />
            </div>
            <h2 class="titulo-pregunta">¿A qué serie corresponde esta imagen?</h2>
            <div class="contenedor-opciones">
              <label class="item-opcion"><input type="radio" name="preg4" value="a" required /> Las Winx</label>
              <label class="item-opcion"><input type="radio" name="preg4" value="b" /> W.I.T.C.H.</label>
              <label class="item-opcion"><input type="radio" name="preg4" value="c" /> Sailor Moon</label>
              <label class="item-opcion"><input type="radio" name="preg4" value="d" /> Totally Spies</label>
            </div>
            <button type="button" class="btn btn-siguiente" data-next="5">Siguiente ➔</button>
          </div>

          <!-- PREGUNTA 5 -->
          <div class="pregunta-bloque oculto" id="bloque-5">
            <span class="texto-progreso">Pregunta 5 de 10</span>
            <div class="caja-imagen">
              <img src="imagenes/padrinosMagicos.jpg" alt="Los Padrinos Mágicos" class="imagen-quiz" />
            </div>
            <h2 class="titulo-pregunta">¿A qué serie corresponde esta imagen?</h2>
            <div class="contenedor-opciones">
              <label class="item-opcion"><input type="radio" name="preg5" value="a" required /> Johnny Test</label>
              <label class="item-opcion"><input type="radio" name="preg5" value="b" /> Danny Phantom</label>
              <label class="item-opcion"><input type="radio" name="preg5" value="c" /> Los Padrinos Mágicos</label>
              <label class="item-opcion"><input type="radio" name="preg5" value="d" /> Jimmy Neutron</label>
            </div>
            <button type="button" class="btn btn-siguiente" data-next="6">Siguiente ➔</button>
          </div>

          <!-- PREGUNTA 6 -->
          <div class="pregunta-bloque oculto" id="bloque-6">
            <span class="texto-progreso">Pregunta 6 de 10</span>
            <div class="caja-imagen">
              <img src="imagenes/phineasFerd.jpg" alt="Phineas y Ferb" class="imagen-quiz" />
            </div>
            <h2 class="titulo-pregunta">¿A qué serie corresponde esta imagen?</h2>
            <div class="contenedor-opciones">
              <label class="item-opcion"><input type="radio" name="preg6" value="a" required /> Gravity Falls</label>
              <label class="item-opcion"><input type="radio" name="preg6" value="b" /> Phineas y Ferb</label>
              <label class="item-opcion"><input type="radio" name="preg6" value="c" /> Kick Buttowski</label>
              <label class="item-opcion"><input type="radio" name="preg6" value="d" /> Kim Possible</label>
            </div>
            <button type="button" class="btn btn-siguiente" data-next="7">Siguiente ➔</button>
          </div>

          <!-- PREGUNTA 7 -->
          <div class="pregunta-bloque oculto" id="bloque-7">
            <span class="texto-progreso">Pregunta 7 de 10</span>
            <div class="caja-imagen">
              <img src="imagenes/zackCody.jpg" alt="Zack y Cody" class="imagen-quiz" />
            </div>
            <h2 class="titulo-pregunta">¿A qué serie corresponde esta imagen?</h2>
            <div class="contenedor-opciones">
              <label class="item-opcion"><input type="radio" name="preg7" value="a" required /> Drake & Josh</label>
              <label class="item-opcion"><input type="radio" name="preg7" value="b" /> Zack y Cody: Gemelos en acción</label>
              <label class="item-opcion"><input type="radio" name="preg7" value="c" /> Zoey 101</label>
              <label class="item-opcion"><input type="radio" name="preg7" value="d" /> Manual de supervivencia escolar de Ned</label>
            </div>
            <button type="button" class="btn btn-siguiente" data-next="8">Siguiente ➔</button>
          </div>

          <!-- PREGUNTA 8 -->
          <div class="pregunta-bloque oculto" id="bloque-8">
            <span class="texto-progreso">Pregunta 8 de 10</span>
            <div class="caja-imagen">
              <img src="imagenes/hannahMontana.jpg" alt="Hannah Montana" class="imagen-quiz" />
            </div>
            <h2 class="titulo-pregunta">¿A qué serie corresponde esta imagen?</h2>
            <div class="contenedor-opciones">
              <label class="item-opcion"><input type="radio" name="preg8" value="a" required /> Lizzie McGuire</label>
              <label class="item-opcion"><input type="radio" name="preg8" value="b" /> Hannah Montana</label>
              <label class="item-opcion"><input type="radio" name="preg8" value="c" /> Raven</label>
              <label class="item-opcion"><input type="radio" name="preg8" value="d" /> iCarly</label>
            </div>
            <button type="button" class="btn btn-siguiente" data-next="9">Siguiente ➔</button>
          </div>

          <!-- PREGUNTA 9 -->
          <div class="pregunta-bloque oculto" id="bloque-9">
            <span class="texto-progreso">Pregunta 9 de 10</span>
            <div class="caja-imagen">
              <img src="imagenes/teletubbies.jpg" alt="Teletubbies" class="imagen-quiz" />
            </div>
            <h2 class="titulo-pregunta">¿A qué serie corresponde esta imagen?</h2>
            <div class="contenedor-opciones">
              <label class="item-opcion"><input type="radio" name="preg9" value="a" required /> Los Tweenies</label>
              <label class="item-opcion"><input type="radio" name="preg9" value="b" /> Teletubbies</label>
              <label class="item-opcion"><input type="radio" name="preg9" value="c" /> Barrio Sésamo</label>
              <label class="item-opcion"><input type="radio" name="preg9" value="d" /> Los Lunnis</label>
            </div>
            <button type="button" class="btn btn-siguiente" data-next="10">Siguiente ➔</button>
          </div>

          <!-- PREGUNTA 10 -->
          <div class="pregunta-bloque oculto" id="bloque-10">
            <span class="texto-progreso">Pregunta 10 de 10</span>
            <div class="caja-imagen">
              <img src="imagenes/artAttack.jpg" alt="Art Attack" class="imagen-quiz" />
            </div>
            <h2 class="titulo-pregunta">¿A qué programa corresponde esta imagen?</h2>
            <div class="contenedor-opciones">
              <label class="item-opcion"><input type="radio" name="preg10" value="a" required /> Art Attack</label>
              <label class="item-opcion"><input type="radio" name="preg10" value="b" /> El Club de las Ideas</label>
              <label class="item-opcion"><input type="radio" name="preg10" value="c" /> Bricomanía</label>
              <label class="item-opcion"><input type="radio" name="preg10" value="d" /> Megatrix</label>
            </div>
            <button type="button" class="btn btn-siguiente">Terminar y ver puntos ➔</button>
          </div>

        </form>
      </div>
    </div>
     <script>
     
      const respondidas = <?= $respondidas ?>;

      // Al cargar el DOM, posicionamos automáticamente al usuario en la pregunta donde se quedó
      window.addEventListener("DOMContentLoaded", function () {
        const bloque1 = document.getElementById("bloque-1");

        // Si ya ha respondido algunas preguntas pero no todas (0 < respondidas < 10)
        if (respondidas > 0 && respondidas < 10) {
          // Ocultamos la primera pregunta por defecto
          bloque1.classList.remove("activa");
          bloque1.classList.add("oculto");

          // Calculamos a qué bloque/pregunta le toca aparecer
          const idSiguiente = respondidas + 1;
          const bloqueSiguiente = document.getElementById("bloque-" + idSiguiente);
          
          // Si el bloque existe, lo mostramos en pantalla
          if (bloqueSiguiente) {
            bloqueSiguiente.classList.remove("oculto");
            bloqueSiguiente.classList.add("activa");
          }
        } 
        // Si ya respondió las 10 preguntas previamente, enviamos directamente a procesar para ver su nota
        else if (respondidas >= 10) {
          document.getElementById("form-quiz").submit();
        }
      });

      document.querySelectorAll('input[type="radio"]').forEach((input) => {
        // Escuchamos el evento 'change' cuando el usuario seleccion a una opción de respuesta
        // Este evento se produce cuando el usuario hace click en un input radio y cambia su estado a "checked"
        input.addEventListener("change", async function () {
          const contenedorOpciones = this.closest(".contenedor-opciones");
          const bloqueActual = this.closest(".pregunta-bloque");

          // Con este if si el bloque ya fue respondido, evitamos duplicar peticiones
          if (contenedorOpciones.classList.contains("bloque-respondido")) return;

          // Marcamos el contenedor como respondido y bloqueamos los inputs para que no se pueda cambiar la respuesta
          contenedorOpciones.classList.add("bloque-respondido");
          contenedorOpciones.querySelectorAll('input[type="radio"]').forEach((r) => (r.disabled = true));

          // Actualizamos los estilos visuales de selección en los elementos label
          contenedorOpciones.querySelectorAll(".item-opcion").forEach((label) => label.classList.remove("opcion-seleccionada"));
          this.closest(".item-opcion").classList.add("opcion-seleccionada");

          // Capturamos los datos necesarios para enviar al servidor
          const nombrePregunta = this.name;    
          const valorRespuesta = this.value;   

          try {
            // Enviamos la respuesta a PHP en segundo plano sin recargar la página
            const peticion = await fetch("validarRespuesta.php", {
              method: "POST",
              headers: { "Content-Type": "application/json" },
              body: JSON.stringify({
                pregunta: nombrePregunta,
                respuesta: valorRespuesta,
              }),
            });

            // Parseamos la respuesta JSON que nos devuelve el servidor PHP
            //Con esto conseguimos que el servidor nos diga si la respuesta es correcta o no, y cuál era la respuesta correcta
            const resultado = await peticion.json();

            // Si PHP devuelve un error, deshacemos los cambios para permitir reintentar
            if (resultado.error) {
              console.error(resultado.error);
              contenedorOpciones.classList.remove("bloque-respondido");
              contenedorOpciones.querySelectorAll('input[type="radio"]').forEach((r) => {
                r.disabled = false;
                r.checked = false;
              });
              contenedorOpciones.querySelectorAll(".item-opcion").forEach((label) => label.classList.remove("opcion-seleccionada"));
              alert("No se pudo guardar la respuesta. Inténtalo de nuevo.");
              return;
            }

            const labelSeleccionado = this.closest(".item-opcion");

            //Pintamos según si el servidor confirma acierto o fallo
            if (resultado.esCorrecta) {
              // Si acierta, pintamos el label seleccionado de verde
              labelSeleccionado.classList.add("opcion-acierto");
            } else {
              // Si falla, pintamos su selección en rojo
              labelSeleccionado.classList.add("opcion-fallo");
              
              // Buscamos automáticamente cuál era la respuesta correcta para revelarla al usuario en verde
              const inputCorrecto = bloqueActual.querySelector(
                `input[value="${resultado.respuestaCorrecta}"]`,
              );
              if (inputCorrecto) {
                inputCorrecto.closest(".item-opcion").classList.add("opcion-acierto");
              }
            }
          } catch (error) {
            // Capturamos cualquier fallo de red o conexión con el servidor
            console.error("Error contactando con el servidor:", error);
          }
        });
      });

     
      document.querySelectorAll(".btn-siguiente").forEach((boton) => {
        boton.addEventListener("click", function () {
          const bloqueActual = this.closest(".pregunta-bloque");
          
          // Verificamos obligatoriamente que el usuario haya seleccionado una opción antes de avanzar
          const opcionSeleccionada = bloqueActual.querySelector(
            'input[type="radio"]:checked',
          );

          if (!opcionSeleccionada) {
            alert("¡Ups! Elige una respuesta antes de avanzar.");
            return;
          }

          // Obtenemos el identificador de la siguiente pregunta mediante el atributo data-next
          const idSiguiente = this.getAttribute("data-next");
          
          if (idSiguiente) {
            // Ocultamos el bloque actual y mostramos el siguiente
            bloqueActual.classList.remove("activa");
            bloqueActual.classList.add("oculto");

            const bloqueSiguiente = document.getElementById("bloque-" + idSiguiente);
            if (bloqueSiguiente) {
              bloqueSiguiente.classList.remove("oculto");
              bloqueSiguiente.classList.add("activa");
            }
          } else {
            // Si ya es la última pregunta, habilitamos los inputs temporalmente para el submit y enviamos a procesar.php
            document.querySelectorAll('input[type="radio"]').forEach((r) => (r.disabled = false));
            document.getElementById("form-quiz").submit();
          }
        });
      });
    </script>
  </body>
</html>