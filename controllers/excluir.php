<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exclusão - resultado</title>
</head>
<body>
<?php
include_once "Aluno.php";
include_once "AlunoDao.php";
$dao = new AlunoDao();
$ra = $_GET["ra"];
$f = new Aluno($ra,NULL,NULL,NULL);
if ($dao->excluir($f)) {
    echo "excluído";
} else {
    echo "não encontrado";
}
?>
<br/>
<a href="/APSWEB">voltar</a>

</body>
</html>