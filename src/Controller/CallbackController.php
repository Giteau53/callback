<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Callback;
use App\Form\CallbackType;
use Doctrine\ORM\EntityManagerInterface;

class CallbackController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/rappel", name="callback")
     */
    public function index(Request $request): Response
    {
        $callback = new Callback();

        $form = $this->createForm(CallbackType::class, $callback);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->entityManager->persist($callback);
            $this->entityManager->flush();
        }
        return $this->render('callback/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
