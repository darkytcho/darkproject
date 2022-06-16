<?php

class Usuario {
    private $id;
    private $nome;
    private $senha;
    private $email;
    private $nascimento;
    private $telefone;
    private $registro;
    private $admin;

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

    public function getNascimento() {
        $r = new DateTime($this->nascimento);
        $this->nascimento = $r->format('d/m/Y');
        return $this->nascimento;

    }

    public function setNascimento($n) {
        $this->nascimento = $n; 
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($t) {
        $this->telefone = $t;
    }

    public function getRegistro() {
        $r = new DateTime($this->registro);
        $this->registro = $r->format('d/m/Y H:i:s');
        return $this->registro;
    }

    public function setRegistro($r) {
        $this->registro = $r;
    }
    
    public function setAdmin($a) {
        $this->admin = (boolean) $a;
    }

    public function getAdmin() {
        return $this->admin;
    }
}

interface UsuarioDao {
    public function generateUser($array);
    public function add(Usuario $u);
    public function login($pass, $email);
    public function findAll($id);
    public function findById($id);
    public function findByEmail($email);
    public function update(Usuario $u);
    public function delete($id);
}
