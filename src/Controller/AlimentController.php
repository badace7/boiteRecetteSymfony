<?php

namespace App\Controller;

use App\Repository\AlimentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlimentController extends AbstractController
{
    /**
     * @Route("/", name="aliments")
     */
    public function index(AlimentRepository $repository): Response
    {
        $aliments = $repository->findAll();
        return $this->render('aliment/aliments.html.twig', [
            'aliments' => $aliments,
            'isCalorie' => false,
            'isGlucide' => false,
        ]);
    }
    /**
     * @Route("/aliments/calorie/{calorie}", name="alimentsParCalories")
     */
    public function alimentsMoinsCaloriques(AlimentRepository $repository, int $calorie): Response
    {
        $aliments = $repository->getAlimentParPropriete('Calorie', '<', $calorie);
        return $this->render('aliment/aliments.html.twig', [
            'aliments' => $aliments,
            'isCalorie' => true,
            'isGlucide' => false
        ]);
    }

    /**
     * @Route("aliments/glucide/{glucide}", name="alimentsParGlucides")
     */
    public function alimentsMoinsGlucides(AlimentRepository $repository, int $glucide): Response
    {
        $aliments = $repository->getAlimentParPropriete('Glucide', '<', $glucide);
        return $this->render('aliment/aliments.html.twig', [
            'aliments' => $aliments,
            'isCalorie' => false,
            'isGlucide' => true
        ]);
    }
}
