<?php

namespace App\Controller\Admin;

use App\Form\SearchCallbackType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CallbackRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(CallbackRepository $callbackRepository, Request $request): Response
    {
        $callbacks = $callbackRepository->findAll();

        $form = $this->createForm(SearchCallbackType::class);
        $search = $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $callbacks = $callbackRepository->search($search->get('mots')->getData());
        }

        return $this->render('admin/index.html.twig', [
            'callbacks' => $callbacks,
            'form' => $form->createView(),
            
            
        ]);
    }

    /**
     * @Route("/admin/last", name="admin_last")
     */

     public function last(CallbackRepository $callbackRepository)
     {
         $lastcallbacks = $callbackRepository->findBy([],['id'=>'DESC'],5);
         return $this->render('admin/last.html.twig',[
             'lastcallbacks' => $lastcallbacks,
         ]);
     }

    /**
     * @Route("/admin/today", name="admin_today")
     */

    public function today(   CallbackRepository $callbackRepository)
    {
           
        $todaycallbacks = $callbackRepository->findByDate();
        return $this->render('admin/today.html.twig',[
            'todaycallbacks' => $todaycallbacks,
           
            
           
        ]);
    }
    
}
