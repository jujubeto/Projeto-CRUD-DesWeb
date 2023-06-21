<?php
include_once "../Aluno.php";
include_once "../configuration/Conexao.php";
class AlunoDao {
    function inserir( Aluno $Aluno ) {
        global $conn;
        $sql = $conn->prepare("INSERT INTO Alunos VALUES(?,?,?,?)");
        $p1 = $Aluno->getRa();
        $p2 = $Aluno->getNome();
        $p3 = $Aluno->getDataNascimento();
        $p4 = $Aluno->getRenda();
        $sql->bind_param("issd",$p1,$p2,$p3,$p4);
        $sql->execute();
        if($sql->affected_rows>0) {
            return true;
        }
    }
    function excluir( Aluno $Aluno ) {
        global $conn;
        $sql = $conn->prepare("DELETE FROM Alunos WHERE Ra=?");
        $p1 = $Aluno->getRa();
        $sql->bind_param("i",$p1);
        $sql->execute();
        if($sql->affected_rows>0) {
            return true;
        }
    }
    function alterar( Aluno $Aluno ) {
        global $conn;
        $sqlStr = "UPDATE Alunos SET NOME=?,DATANASCIMENTO=?,RENDA=? WHERE Ra=?";
        $sql = $conn->prepare($sqlStr);
        $p1 = $Aluno->getRa();
        $p2 = $Aluno->getNome();
        $p3 = $Aluno->getDataNascimento();
        $p4 = $Aluno->getRenda();
        $sql->bind_param("ssdi",$p2,$p3,$p4,$p1);
        $sql->execute();
        if($sql->affected_rows>0) {
            return true;
        }
    }
    function lista() {
        global $conn;
        $sql = "SELECT * FROM Alunos";
        $result = $conn->query($sql);
        $lista = array();
        while ($row = $result->fetch_assoc())
          array_push($lista,new Aluno($row["Ra"],
          $row["nome"],$row["dataNascimento"],$row["renda"]));
        return $lista;
    }
    function buscarPeloRa($ra) {
        global $conn;
        $nome="";
        $dataNascimento="";
        $renda=0.0;
        $sql = "SELECT * FROM Alunos WHERE Ra=?";
        $query = $conn->prepare($sql);
        $result=$query->bind_param("i",$ra);
        $query->execute();
        $query->bind_result($ra,$nome,$dataNascimento,$renda);
        if( $query->fetch()) {
            return new Aluno($ra,$nome,$dataNascimento,$renda);
        }
    }

}

?>