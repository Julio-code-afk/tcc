<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>
    Casa Móveis
  </title>

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<body>
  <!-- JS -->
  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="slick/slick.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.slider').slick({
        dots: true,
        // $('.single-item').slick();
      });
    });
  </script>
  <!---->
  <!-- Menu -->

  <nav class="menuvertical">

    <!-- Logo -->
    <div class="logo">
      <a href="Index.html"><img src="img/Logo.png" alt="Logo"></a>
    </div>
    <!---->

    <div class="menuopcoes">

      <!-- Pesquisa -->

      <!---->
      <ul>
        <a href="Cadastro.html">
          <li>
            <i class="medium material-icons">assignment</i>
            Cadastro
        </a>
        <a href="Login.html">
          <li>
            <i class="medium material-icons">assignment_ind</i>
            Login
        </a>
      </ul>

      <!-- Catálogo -->
      <ul>
        <a href="Index.html">
          <li>
            <i class="large material-icons">dashboard</i>
            Catálogo
        </a>
        <ul id="submenu">
          <a href="#sala">
            <li>
              Sala
            </li>
          </a>
          <a href="#cozinha">
            <li>
              Cozinha
            </li>
          </a>
          <a href="#banheiro">
            <li>
              Banheiro
            </li>
          </a>
        </ul>
      </ul>
      <!---->
    </div>
    <footer class="footer">
      <a href="https://www.facebook.com/casamoveisvr/">
        <i class="fa fa-facebook-square" style="font-size:24px"></i>
      </a>
      <p>
        Site desenvolvido pela equipe La Casa Muables, 2020.</p>
    </footer>
  </nav>
  <!---->
  <!-- Slide -->
  <header>
    <div class="slider">
      <img src="img/promoc1.png" alt="imagem01" title="imagem01" />
      <img src="img/promoc2.png" alt="imagem02" title="imagem02" />
      <img src="img/promoc3.jpg" alt="imagem03" title="imagem03" />
    </div>
    <!--FIM DIV IMAGENS-->
  </header>

  <!-- Grid -->
  <main>

  <section class='grid'>
    <?php
    include "php/dao.php";
    $dao = new Dao();
    $moveis = $dao->get_all();

    foreach ($moveis as $moveis) {


      echo "<div class='item-grid' >";
        echo "<img src='" . $moveis["mov_img"] . "'>";
        echo "<strong>R$ " . $moveis["mov_price"] . "</strong><br>";
        echo $moveis["mov_desc"];
        echo "<br><a href='php/reserva_criar.php?cod=" . $moveis["mov_cod"] . "'>Reservar</a>";
      echo "</div>";


    }
    ?>
      </section>
      
  </main>

</body>

</html>