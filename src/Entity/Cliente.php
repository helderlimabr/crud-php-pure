<?php

namespace FiecCrudPhp\Entity;

/**
 * @Entity
 * @Table(name="clientes")
 */
class Cliente
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $nome;

    /**
     * @Column(type="string")
     */
    private $sobreNome;

    /**
     * @Column(type="string")
     */
    private $email;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getSobreNome(): string
    {
        return $this->sobreNome;
    }

    public function setSobreNome(string $sobreNome): void
    {
        $this->sobreNome = $sobreNome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
