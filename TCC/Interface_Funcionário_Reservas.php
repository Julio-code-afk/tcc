<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      Casa Móveis
    </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/styleinter.css">
    <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
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
      $(document).ready(function () {
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
        <a href="index.php"><img src="img/Logo.png" alt="Logo"></a>
      </div>
      <!---->

      <div class="menuopcoes">
        <ul>
          <a href="Interface_Funcionário_Catálogo.html">
            <li>
              <i class="large material-icons">assignment_ind</i>
              Catálogo
            </a>
          </li>
        </ul>
        <ul>
          <a href="Interface_Funcionário_Reservas.html">
            <li id="selecionado">
              <i class="large material-icons">dashboard</i>
              Reserva
            </a>
          </li>
        </ul>
        <ul>
          <a href="Interface_Funcionário_Entrega.html">
            <li>
              <i class="large material-icons">dashboard</i>
              Entregas
            </a>
          </li>
        </ul>
        <ul>
          <a href="Interface_Funcionário_Montagem.html">
            <li>
              <i class="large material-icons">dashboard</i>
              Montagem
            </a>
          </li>
        </ul>
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
    <main>
    <table class="table">
                    <th>Código da Reserva&nbsp;</th>
                    <th>&nbsp;Data da Reserva&nbsp; </th>
                    <th>&nbsp;Código do móvel&nbsp; </th>
                    <th>&nbsp;CPF do Cliente&nbsp; </th>

                    <?php
                    include "php/daoRev.php";
                    $dao = new Dao();
                    $reserva = $dao->get_all();
                    foreach ($reserva as $reserva)
                    {
                        echo "<tr>";
                        echo "<td>";
                        echo $reserva["rev_cod"];
                        echo "</td>";

                        echo "<td>";
                        echo $reserva["rev_data"];
                        echo "</td>";

                        echo "<td>";
                        echo $reserva["mov_cod"];
                        echo "</td>";

                        echo "<td>";
                        echo $reserva["cli_cpf"];
                        echo "</td>";

                        echo "<td>";
                        echo "<a href='php/reserva_edit.php?codRev=" . $reserva["rev_cod"] . "'> Editar </a>  |";
                        echo "<a href='php/reserva_delete.php?codRev=" . $reserva["rev_cod"] . "'> Excluir </a> |";
                        echo "<a href='php/montagem_criar.php?codRev=" . $reserva["rev_cod"] . "'> Agendar Montagem </a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>

                </table>
    </main>
    <!---->
  </body>
</html>