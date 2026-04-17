<?php

namespace App\Controller;

use App\Repository\MenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_EMPLOYE')]
class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin_dashboard')]
    public function dashboard(MenuRepository $menuRepository): Response
    {
        $menus = $menuRepository->findAll();

        return $this->render('admin/dashboard.html.twig', [
            'menus' => $menus,
            'nb_menus' => count($menus),
            'nb_commandes' => 0,
        ]);
    }

    #[Route('/admin/menus', name: 'app_admin_menus')]
    public function menus(MenuRepository $menuRepository): Response
    {
        return $this->render('admin/menus/index.html.twig', [
            'menus' => $menuRepository->findAll(),
        ]);
    }

    #[Route('/admin/commandes', name: 'app_admin_commandes')]
    public function commandes(): Response
    {
        return $this->render('admin/commandes/index.html.twig', [
            'commandes' => [],
        ]);
    }

    #[Route('/admin/avis', name: 'app_admin_avis')]
    public function avis(): Response
    {
        return $this->render('admin/avis/index.html.twig', [
            'avis' => [],
        ]);
    }

    #[Route('/admin/employes', name: 'app_admin_employes')]
    #[IsGranted('ROLE_ADMIN')]
    public function employes(): Response
    {
        return $this->render('admin/employes/index.html.twig', [
            'employes' => [],
        ]);
    }
}
