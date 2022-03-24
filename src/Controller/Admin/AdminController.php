<?php

namespace App\Controller\Admin;
use App\Entity\Callback;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CallbackRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this ->entityManager = $entityManager;
    }
    /**
     * @Route("/admin", name="admin")
     */
    public function index(CallbackRepository $callbackRepository): Response
    {
        $callbacks = $callbackRepository->findAll();
        return $this->render('admin/index.html.twig', [
            'callbacks' => $callbacks,
        ]);
    }

    /**
     * @Route("/admin/last", name="admin_last")
     */

     public function last(CallbackRepository $callbackRepository)
     {
         $lastcallbacks = $callbackRepository->findBy([],['id'=>'DESC']);
         return $this->render('admin/last.html.twig',[
             'lastcallbacks' => $lastcallbacks,
         ]);
     }
}
