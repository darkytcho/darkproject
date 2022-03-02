<?php

class Usuario {
    private $id;
    private $nome;
    private $senha;
    private $email;

    public function getId() {
        return $this->id;
    }

    public function setId($i) {
        $this->id = trim($i);
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($n) {
        $this->nome = ucwords(trim($n));
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($s) {
        $this->senha = password_hash($s, PASSWORD_DEFAULT);
    }

    public function setSenhaLogin($s) {
        $this->senha = $s;
    }

    public function getEmail() {
        return $this->email;     
    }

    public function setEmail($e) {
        $this->email = strtolower(trim($e));

    }
}

interface UsuarioDao {
    public function add(Usuario $u);
    public function login(Usuario $u);
    public function findAll();
    public function findById($id);
    public function findByEmail($email);
    public function update(Usuario $u);
    public function delete($id);
}

?>