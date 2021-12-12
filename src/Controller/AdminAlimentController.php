<?php

namespace App\Controller;

use App\Entity\Aliment;
use App\Form\AlimentType;
use App\Repository\AlimentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class AdminAlimentController extends AbstractController
{
    /**
     * @Route("/admin/aliment", name="admin_aliment")
     */
    public function index(AlimentRepository $repository): Response
    {
        $aliments = $repository->findAll();
        return $this->render('admin/admin_admin_aliment/adminAliment.html.twig', [
            "aliments" => $aliments
        ]);
    }
    /**
     * @Route("/admin/aliment{id}", name="admin_aliment_modification")
     * @Route("/admin/aliment/creation", name="admin_aliment_creation", methods="GET|POST")
     */
    public function ajoutEtModif(Aliment $aliment = null, Request $request, EntityManagerInterface $entityManager): Response
    {
        if(!$aliment) {
            $aliment = new Aliment();
        }
        $form = $this->createForm(AlimentType::class, $aliment);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($aliment);
            $entityManager->flush();
            return $this->redirectToRoute("admin_aliment");
        }
        return $this->render('admin/admin_admin_aliment/modifEtAjout.html.twig', [
            "aliment" => $aliment,
            "form" => $form->createView(),
            "isModified" => $aliment->getId() !== null
        ]);
    }

    /**
     * @Route("/admin/aliment_sup/{id}", name="admin_aliment_suppression", methods="delete")
     */
    public function suppression(Aliment $aliment, Request $request, EntityManagerInterface $entityManager): RedirectResponse
    { 
        if($this->isCsrfTokenValid("SUP". $aliment->getId(), $request->get('_token'))) {
            $entityManager->remove($aliment);
            $entityManager->flush();
            return $this->redirectToRoute("admin_aliment");
        }
    }
}
