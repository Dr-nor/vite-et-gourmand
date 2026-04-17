<?php

namespace App\Controller;

use App\Entity\Menu;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
class CommandeController extends AbstractController
{
    #[Route('/commander/{menuId}', name: 'app_commande_new')]
    public function new(int $menuId): Response
    {
        return $this->render('commande/new.html.twig', [
            'menuId' => $menuId,
        ]);
    }

    #[Route('/commande/{id}', name: 'app_commande_confirmation')]
    public function confirmation(int $id): Response
    {
        return $this->render('commande/confirmation.html.twig', [
            'id' => $id,
        ]);
    }
}
