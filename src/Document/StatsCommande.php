<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\Document(collection: 'stats_commandes')]
class StatsCommande
{
    #[ODM\Id]
    private ?string $id = null;

    #[ODM\Field(type: 'int')]
    private int $menuId;

    #[ODM\Field(type: 'string')]
    private string $menuTitre;

    #[ODM\Field(type: 'int')]
    private int $nbCommandes = 0;

    #[ODM\Field(type: 'float')]
    private float $chiffreAffaires = 0.0;

    #[ODM\Field(type: 'string')]
    private string $mois;

    public function getId(): ?string { return $this->id; }
    public function getMenuId(): int { return $this->menuId; }
    public function setMenuId(int $menuId): static { $this->menuId = $menuId; return $this; }
    public function getMenuTitre(): string { return $this->menuTitre; }
    public function setMenuTitre(string $menuTitre): static { $this->menuTitre = $menuTitre; return $this; }
    public function getNbCommandes(): int { return $this->nbCommandes; }
    public function setNbCommandes(int $nbCommandes): static { $this->nbCommandes = $nbCommandes; return $this; }
    public function getChiffreAffaires(): float { return $this->chiffreAffaires; }
    public function setChiffreAffaires(float $chiffreAffaires): static { $this->chiffreAffaires = $chiffreAffaires; return $this; }
    public function getMois(): string { return $this->mois; }
    public function setMois(string $mois): static { $this->mois = $mois; return $this; }
}
