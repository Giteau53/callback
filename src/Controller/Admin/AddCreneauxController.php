<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Creneau;
use Symfony\Component\HttpFoundation\Request;
use App\Form\AddCreneauxType;

class AddCreneauxController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/admin/add", name="admin_add")
     */
    public function index(Request $request): Response
    {
        $creneau = new Creneau();

        $form = $this->createForm(AddCreneauxType::class, $creneau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->entityManager->persist($creneau);
            $this->entityManager->flush();
        
        
            $this->addFlash('bravo', 'Votre créneau à bien été enregistré !!');
        

        }

        return $this->render('admin/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
