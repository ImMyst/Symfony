<?php
namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bridge\Doctrine\RegisteryInterface;

class ShippingList {

  public function shipping_list(RegistryInterface $doctrine) {
          $posts = $doctrine->getRepository(Post::Class)->findAll();
          return $this->render('/shipping_list.html.twig', compact('posts'));

  }
}
