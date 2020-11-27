<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Formulário</title>
  </head>
  <body>
<form method="POST">
  <label>Nome</label><br>
  <input type="varchar" name="name"><br><br>

  <label>Descrição</label><br>
  <textarea type="text" name="description"></textarea><br><br>

  <label>Preço</label><br>
  <input type="varchar" name="price"><br><br>

  <button type="submit" value="enviar" name="acao" style="width: 200px; height: 30px"> Enviar Pão </button> <br>
  <button type="submit" value="enviar1" name="acao" style="width: 200px; height: 30px"> Enviar Macarrão </button> <br>
  <button type="submit" value="enviar2" name="acao" style="width: 200px; height: 30px"> Enviar Pizza </button> <br>

     <br>     <br>

    <button type="reset"  value="cancelar"> Limpar </button>
</form>

<?php

include("connection.php");
@$name=$_POST["name"];
@$description=$_POST["description"];
@$price=$_POST["price"];

@$acao=$_POST["acao"];

if ($acao == "enviar"){
   mysqli_query($con, "INSERT INTO pao(name,description,price) values('$name','$description','$price')");
   @$consulta = mysqli_query($con, "select * from pao where name = '$name'");
        @$dados = mysqli_fetch_array($consulta);
        @$dadosid = $dados["id"];
   mysqli_query($con, "INSERT INTO idtotal(id_pao) value('$dadosid')");
        echo "<script>alert('DADOS ENVIADOS COM SUCESSO!'),history.back()</script>";


    } else if ($acao == "enviar1") {
      mysqli_query($con, "INSERT INTO macarrao(name,description,price) values('$name','$description','$price')");
      @$consulta = mysqli_query($con, "select * from macarrao where name = '$name'");
           @$dados = mysqli_fetch_array($consulta);
           @$dadosid = $dados["id"];
      mysqli_query($con, "INSERT INTO idtotal(id_macarrao) value('$dadosid')");
           echo "<script>alert('DADOS ENVIADOS COM SUCESSO!'),history.back()</script>";


    } else if ($acao == "enviar2") {
      mysqli_query($con, "INSERT INTO pizza(name,description,price) values('$name','$description','$price')");
      @$consulta = mysqli_query($con, "select * from pizza where name = '$name'");
           @$dados = mysqli_fetch_array($consulta);
           @$dadosid = $dados["id"];
      mysqli_query($con, "INSERT INTO idtotal(id_pizza) value('$dadosid')");
           echo "<script>alert('DADOS ENVIADOS COM SUCESSO!'),history.back()</script>";
    }

?>

</body>
</html>