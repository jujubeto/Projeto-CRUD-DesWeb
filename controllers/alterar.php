<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>
<?php
include_once "Aluno.php";
include_once "AlunoDao.php";
$ra = intval($_GET["ra"]);
$nome = $_GET["nome"];
$formato = "d/m/Y";
$dataNascimento = 
  DateTime::createFromFormat($formato,$_GET["dataNascimento"]);
$renda = floatval($_GET["renda"]);
$Aluno = new Aluno($ra,$nome,
  $dataNascimento->format("Y-m-d")
  ,$renda);
$dao = new AlunoDao();
if($dao->alterar($Aluno)) {
    echo "alterado";
} else {
    echo "não alterado";
}
?>
<br/>
<a href="/APSWEB">voltar</a>

</body>
</html>