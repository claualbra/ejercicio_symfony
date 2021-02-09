<?php

namespace App\Controller;

use App\Entity\Jugadores;
use App\Form\JugadoresType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/jugadores")
 */
class JugadoresController extends AbstractController
{


    /**
     * @Route("/new", name="jugadores_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $jugadore = new Jugadores();
        $form = $this->createForm(JugadoresType::class, $jugadore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($jugadore);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('jugadores/new.html.twig', [
            'jugadore' => $jugadore,
            'form' => $form->createView(),
        ]);
    }
}

