<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UtenteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=UtenteRepository::class)
 */
class Utente
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Cognome;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Soprannome;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Indirizzo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Citta;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Provincia;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Stato;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CodiceFiscale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Telefono1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Telefono2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CodiceUtente;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $Nota;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $Nota1;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $Nota2;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $Nota3;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->Nome;
    }

    public function setNome(string $Nome): self
    {
        $this->Nome = $Nome;

        return $this;
    }

    public function getCognome(): ?string
    {
        return $this->Cognome;
    }

    public function setCognome(string $Cognome): self
    {
        $this->Cognome = $Cognome;

        return $this;
    }

    public function getSoprannome(): ?string
    {
        return $this->Soprannome;
    }

    public function setSoprannome(?string $Soprannome): self
    {
        $this->Soprannome = $Soprannome;

        return $this;
    }

    public function getIndirizzo(): ?string
    {
        return $this->Indirizzo;
    }

    public function setIndirizzo(?string $Indirizzo): self
    {
        $this->Indirizzo = $Indirizzo;

        return $this;
    }

    public function getCitta(): ?string
    {
        return $this->Citta;
    }

    public function setCitta(?string $Citta): self
    {
        $this->Citta = $Citta;

        return $this;
    }

    public function getProvincia(): ?string
    {
        return $this->Provincia;
    }

    public function setProvincia(?string $Provincia): self
    {
        $this->Provincia = $Provincia;

        return $this;
    }

    public function getStato(): ?string
    {
        return $this->Stato;
    }

    public function setStato(?string $Stato): self
    {
        $this->Stato = $Stato;

        return $this;
    }

    public function getCodiceFiscale(): ?string
    {
        return $this->CodiceFiscale;
    }

    public function setCodiceFiscale(?string $CodiceFiscale): self
    {
        $this->CodiceFiscale = $CodiceFiscale;

        return $this;
    }

    public function getTelefono1(): ?string
    {
        return $this->Telefono1;
    }

    public function setTelefono1(?string $Telefono1): self
    {
        $this->Telefono1 = $Telefono1;

        return $this;
    }

    public function getTelefono2(): ?string
    {
        return $this->Telefono2;
    }

    public function setTelefono2(?string $Telefono2): self
    {
        $this->Telefono2 = $Telefono2;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getCodiceUtente(): ?string
    {
        return $this->CodiceUtente;
    }

    public function setCodiceUtente(string $CodiceUtente): self
    {
        $this->CodiceUtente = $CodiceUtente;

        return $this;
    }

    public function getNota(): ?string
    {
        return $this->Nota;
    }

    public function setNota(?string $Nota): self
    {
        $this->Nota = $Nota;

        return $this;
    }

    public function getNota1(): ?string
    {
        return $this->Nota1;
    }

    public function setNota1(?string $Nota1): self
    {
        $this->Nota1 = $Nota1;

        return $this;
    }

    public function getNota2(): ?string
    {
        return $this->Nota2;
    }

    public function setNota2(?string $Nota2): self
    {
        $this->Nota2 = $Nota2;

        return $this;
    }

    public function getNota3(): ?string
    {
        return $this->Nota3;
    }

    public function setNota3(?string $Nota3): self
    {
        $this->Nota3 = $Nota3;

        return $this;
    }
}
