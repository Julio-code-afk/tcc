<?php
include "./dao.php";
$dao = new Dao();
$conta = $dao->get_by_id($_GET["numero"]);
?>

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
                <form action="crud_Contas.php" method="POST" class="contact2-form validate-form">

                    <span class="contact2-form-title">
                        Manutenção de contas
                    </span>

                    <div class="wrap-input2 validate-input" data-validate="Um número para conta é necessário">
                        <?php
                        echo "<input class=\"input2\" type=\"number\" min=\"1\" name=\"txtNumero\" value=\"" .
                            $conta->NUMERO. "\">";
                        ?>
                        <span class="focus-input2"></span>
                    </div>

                    <div class="wrap-input2 validate-input" data-validate="Informe o dato inicial da conta">
                        <input class="input2" type="text" step="any" name="txtSaldo" value="<?php echo $conta->SALDO;?>">
                        <span class="focus-input2"></span>
                    </div>

                    <div class="wrap-input2 validate-input" data-validate="Informe o titular da conta">
                        <input class="input2" name="txtTitular" value="
                        <?php
                            echo $conta->TITULAR;
                        ?>
                        ">
                        <span class="focus-input2"></span>
                    </div>
                    <input type="hidden" name="acao" value="atualizar">

                    <div class="container-contact2-form-btn">
                        <div class="wrap-contact2-form-btn">
                            <div class="contact2-form-bgbtn"></div>

                            <button class="contact2-form-btn" onclick="document.submit()" ;> Atualizar </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>