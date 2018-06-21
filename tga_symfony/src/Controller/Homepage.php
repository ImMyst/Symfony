<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Bundle\FrameworkBundle\Controller\Controller;
use Twig\Environment;

class Homepage {

  public function home(Environment $twig) {
          return new Response($twig->render('/homepage.html.twig'));

  }
}
