<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navegacion.css">
    <title>Navegación</title>
  </head>
  <body>
    <!-- inicio barra de navegación -->
    <div class="site-nav">
      <!-- agregado testa monti -->
      <nav class="navegacion">
        <a class="login" >
          <span id="main1"  onclick="openNav()"> &#9776; Login
          </span>
        </a>
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
            &times;
          </a>
          <a href="./session/login.php">
            Login
          </a>
        </div>

        <ul class="menu">
          <li><a href="index.php">Institucional</a>
            <ul class="submenu1">
              <li><a href="#">* El IFTS 4 (Historia)</a> </li>
              <li><a href="#">* El IFTS 4 (Misión - Visión)</a> </li>
              <li><a href="autoridades.php">* Autoridades</a> </li>
              <li><a href="docentes.php">* Equipo Docente</a> </li>
              <li><a href="bedelia.php">* Bedelía</a> </li>
              <li><a href="#">* Reglamento orgánico de los IFTS</a></li>
              <li><a href="contacto.php">* Contacto</a> </li>
            </ul>
          </li>
          <li><a href="carreras.php">Carreras</a>
            <ul class="submenu2">
              <li><a href="carreras.php">* Técnico Superior en Desarrollo de Software</a> 
              <ul class="submenuA">
                <li><a target='blank' href="/pdf/Plan-aprobado-Tecnicatura-superior-en-Desarrollo-de-Software.pdf">-Plan de estudios.</a></li>
                <li><a href="carreras.php">-Régimen de correlativas</a></li>
                <li><a href="carreras.php">-Información sobre equivalencias</a></li>
                <li><a target = "blank" href="mostrar_pdf.php?titulo=horario-d-s" name="horario-d-s">- Horarios de cursada</a></li>
              </ul>
              </li>
              <li><a href="carreras.php">* Técnico Superior en Análisis de Sistemas</a> 
              <ul class="submenuB">
                <li><a target='blank' href="/pdf/ResolucionAS.pdf">-Plan de estudios</a></li>
                <li><a href="carreras.php">-Régimen de correlativas</a></li>
                <li><a href="carreras.php">-Información sobre equivalencias</a></li>
                <li><a target = "blank" href="mostrar_pdf.php?titulo=horario-a-s-viejo" name="horario-a-s-viejo">- Horarios de cursada</a></li>
              </ul>
              </li>
              <li><a href="carreras.php">* Técnico Superior en Análisis de Sistemas (Plan Nuevo)</a> 
              <ul class="submenuB">
                <li><a target='blank' href="/pdf/ResolucionAS.pdf">-Plan de estudios</a></li>
                <li><a href="carreras.php">-Régimen de correlativas</a></li>
                <li><a href="carreras.php">-Información sobre equivalencias</a></li>
                <li><a target = "blank" href="mostrar_pdf.php?titulo=horario-a-s-nuevo" name="horario-a-s-nuevo">- Horarios de cursada</a></li>
              </ul>
              </li>
            </ul>
          </li>
          <li><a href="index.php">Estudiantes</a>
            <ul class="submenu3">
              <li><a href="/php/2c2024-main/horarios_cursada.php">* Horarios de cursada</a></li>
              <li><a target='blank' href="https://aulasvirtuales.bue.edu.ar">* Acceso al aula virtual</a></li>
              <li><a target='blank' href="https://guarani-autogestionagencia.bue.edu.ar">* Acceso al SIU Guaraní</a></li>
              <li><a href="./formulario_inscripcion.php">* Formulario de inscripción a exámenes - Error SIU</a></li>
              <li><a href="contacto.php">* Reportar problemas de acceso al aula/siu</a></li>
              <li><a href="contacto.php">* Otros Trámites</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
    <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main1").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
      }

      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main1").style.marginLeft = "0";
        document.body.style.backgroundColor = "white";
      }
      // agregado testa monti
      document.addEventListener("click", (event) => {
        const menuBtn = document.getElementById("main1");
        let target = event.target;
        do {
          if (target == menuBtn) {
            openNav();
            return;
          }
          target = target.parentNode;
        } while (target);
        closeNav();
      });
      // fin agregado testa monti
    </script>
  </body>

</html>