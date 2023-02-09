<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class RCVBController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('rcvb/index.html.twig', [
            'controller_name' => 'RCVBController',
        ]);
    }
}
