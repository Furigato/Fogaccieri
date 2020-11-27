<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fogaccieri</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="../styles/nav.css">

        <link rel="stylesheet" href="../styles/menu.css">
            <!--favicon-->
                        <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
                        <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
                        <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
                        <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
                        <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
                        <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
                        <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
                        <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
                        <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
                        <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
                        <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
                        <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
                        <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
                        <link rel="manifest" href="favicon/manifest.json">
                        <meta name="msapplication-TileColor" content="#ffffff">
                        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
                        <meta name="theme-color" content="#ffffff">

</head>
<body>

    <!--navbar-->

    <header>
        <img class="logo" src="../images/logo.png" alt="Logo">
        <nav>
            <ul class="nav__links">
                <li><a href="index.html"><b>Home</b></a></li>
                <li><div class="sel"><a href="cardapio.html"><b>Cardápio</b></a></div></li>
                <li><a href="blog.html"><b>Blog</b></a></li>
            </ul>
        </nav>
        <a class="cta" href="parcerias.html"><button>Parcerias</button></a>
    </header>

    <div id="page-menu">
    <h1 class="cardapio-h1"><b> Cardápio</b></h1>

        <form method="POST" >

            <div class="form">
                <label for="categoria"> <b> Escolha uma categoria </b> </label>

                <select id="categoria" name="categoria">
                <option value="null">Selecione...</option>
                <option value="pao">Pão</option>
                <option value="macarrao">Macarrão</option>
                <option value="pizza">Pizza</option>
                <!-- <option value="todos">Todos</option> -->

                </select>
                <button type="submit" value="enviar" name="acao"> <b> Filtrar Busca </b> </button>
                
                <div class="botaoezap">

                        <a href="https://api.whatsapp.com/send?phone=5511950678895" target="_blank">
                            <div class="imgzapzap">
                                <img src="../images/zapzap.png" alt="Faça seu pedido" class="imgzap">
                                <p> Faça seus pedidos via WhatsApp! </p>
                            </div>
                        </a>
                </div>
            </div>
            
        </form>

    <?php

        include("connection.php");

        @$categoria=$_POST["categoria"];
        @$pao=$_POST["pao"];
        @$macarrao=$_POST["macarrao"];
        @$pizza=$_POST["pizza"];
        @$null=$_POST["null"];
        @$todos=$_POST["todos"];
        @$acao=$_POST["acao"];

            switch ($categoria) {
                case 'pao':
                        @$name = $_REQUEST ["name"];
                        $busca = mysqli_query($con, "select * from pao");
                        $dados = mysqli_fetch_assoc($busca);
                        $total = mysqli_num_rows($busca);
                    break;
                
                case 'macarrao':
                        @$name = $_REQUEST ["name"];
                        $busca = mysqli_query($con, "select * from macarrao");
                        $dados = mysqli_fetch_assoc($busca);
                        $total = mysqli_num_rows($busca);
                    break;

                case 'pizza':
                        @$name = $_REQUEST ["name"];
                        $busca = mysqli_query($con, "select * from pizza");
                        $dados = mysqli_fetch_assoc($busca);
                        $total = mysqli_num_rows($busca);
                    break;

                case 'null':
                    $total = 0;
                break;

                // case 'todos':
                //         @$name = $_REQUEST ["name"];
                //         $busca = mysqli_query($con, "select * from pao", "select * from macarrao", "select * from pizza");
                //         $dados = mysqli_fetch_assoc($busca);
                //         $total = mysqli_num_rows($busca);
                //     break;
                
            }
            ?>

                <?php
                // $busca2 = mysqli_query($con, "select * from idtotal");
                // $dados2 = mysqli_fetch_assoc($busca2);
                // $totalnow = mysqli_num_rows($busca2);

                if ($acao == "enviar" && $total>0){
                    ?>
                    <div class="list1">
                        <p style="text-align: justify;">Nome do prato </p> <p> Descrição </p> <p> Preço (R$)</p>
                    </div>
                    <?php
                    if($total > 0){
                        do {
                ?>

                    <div class="list">
                        <p><?=$dados['name']?> </p> <p> <?=$dados['description']?> </p> <p style="text-align: center;"> <?=$dados['price']?></p>
                    </div>

            <?php
                    }while($dados = mysqli_fetch_assoc($busca));
                }
            }
    ?>
    </div>
<!-- 
            <div class="cadastrados">
                <?=$totalnow?> produtos cadastrados
            </div> -->
  </body>
  </html>

  <?php            @mysqli_free_result($busca); ?>