<?php
class Aluno {
    private $ra;
    private $nome;
    private $dataNascimento;
    private $renda;
    function __construct($ra,$nome,$dataNascimento,$renda) {
        $this->ra = $ra;
        $this->nome = $nome;
        $this->dataNascimento = $dataNascimento;
        $this->renda= $renda;
    }
    function getRa() {
        return $this->ra;
    }
    function setRa($ra) {
        $this->ra = $ra;
    }
    function getNome() {
        return $this->nome;
    }
    function setNome($nome) {
        $this->nome = $nome;
    }
    function getDataNascimento() {
        return $this->dataNascimento;
    }
    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }
    function getRenda() {
        return $this->renda;
    }
    function setRenda($renda) {
        $this->renda = $renda;
    }
}
?>