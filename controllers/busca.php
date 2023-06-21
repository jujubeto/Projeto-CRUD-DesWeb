<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Busca/Alteração</title>
</head>

<body>
  <?php
  include_once "Aluno.php";
  include_once "AlunoDao.php";
  $ra = intval($_GET["ra"]);
  $dao = new AlunoDao();
  $f = $dao->buscarPeloRa($ra);
  $formato = "Y-m-d";
  $dataNascimento = DateTime::createFromFormat($formato, $f->getDataNascimento());
  ?>
  <form action="alterar.php">
    RA:<input type="text" name="ra" value="<?php echo $f->getRa() ?>" /><br />
    Nome:<input type="text" name="nome" value="<?php echo $f->getNome() ?>" /><br />
    Data Nascimento:<input type="text" name="dataNascimento" value="<?php echo $dataNascimento->format("d/m/Y") ?>" /><br />
    Renda:<input type="text" name="renda" value="<?php echo $f->getRenda() ?>" /><br />
    <input type="submit" value="alterar" />
  </form>
</body>

</html>