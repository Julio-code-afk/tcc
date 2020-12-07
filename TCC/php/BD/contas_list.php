<head>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>

<body>

    <div class="bg-contact2" style="background-image: url('images/bg-01.jpg');">
        <div class="container-contact2">
            <div class="wrap-contact2">


                <span class="contact2-form-title">
                    Contas Cadastradas
                </span>

                <table class="table">
                    <th>Numero</th>
                    <th>Titular</th>
                    <th>Saldo</th>
                    <th>Açao</th>

                    <?php
                    include "dao.php";
                    $dao = new Dao();
                    $contas = $dao->get_all();
                    foreach ($contas as $conta)
                    {
                        echo "<tr>";
                        echo "<td>";
                        echo $conta["NUMERO"];
                        echo "</td>";

                        echo "<td>";
                        echo $conta["TITULAR"];
                        echo "</td>";

                        echo "<td>";
                        echo $conta["SALDO"];
                        echo "</td>";

                        echo "<td>";
                        echo "<a href='contas_edit.php?numero=" . $conta["NUMERO"] . "'>Editar</a>  |";
                        echo "<a href='contas_delete.php?numero=" . $conta["NUMERO"] . "'>Excluir</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>

                </table>

                <div>
                    <a href="index.html"> Criar uma nova conta</a>
                </div>

            </div>
        </div>
    </div>s
</body>