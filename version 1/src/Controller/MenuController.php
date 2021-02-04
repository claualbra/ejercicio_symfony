<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $arrayMenu=  ['jugadores_new' => 'Nuevo Jugador', 'club_new'=>'Nuevo Club', 'club_index' => 'Listado de clubs'];

       //$arrayNombre = ['Nuevo Jugador', 'Nuevo Club','Listado de clubs'];


        return $this->render('menu/index.html.twig', [
            'arrayMenu' => $arrayMenu,
        ]);
    }
}
