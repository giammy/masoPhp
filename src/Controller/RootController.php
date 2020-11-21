<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RootController extends AbstractController
{


    /**
     * @Route("/", name="homepage")
     */
    public function homeAction(/*LoggerInterface $appLogger*/)
    {
        //$username = $this->get('security.token_storage')->getToken()->getUser()->getUsername();
        //$appLogger->info("IN: homeAction: username='" . $username . "'");

        return $this->render('index.html.twig', [
            'controller_name' => 'HomeController',
            'username' => 'username',
        ]);
    }

}