<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $arrayMenu=  ['club_new'=>'Nuevo Club', 'club_index' => 'Listado de clubs'];



        return $this->render('menu/index.html.twig', [
            'arrayMenu' => $arrayMenu,
        ]);
    }
}
