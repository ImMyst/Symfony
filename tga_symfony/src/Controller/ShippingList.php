<?php
namespace App\Controller;

use App\Entity\ShoppingItem;
use App\Form\PostType;
use App\Repository\ShoppingItemRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ShippingList extends Controller {

  public function shipping_list(Request $request, Environment $twig, RegistryInterface $doctrine, FormFactoryInterface $formFactory) {
          $items = $doctrine->getRepository(ShoppingItem::class)->findAll();
          $form = $formFactory->createBuilder(PostType::class, $items[0])->getForm();

          $form->handleRequest($request);

          if ($form->isSubmitted() && $form->isValid()) {
            $doctrine->getEntityManager()->flush();
          }

          return new Response($twig->render('/shipping_list.html.twig', [
            'items' => $items,
            'form' => $form->createView()
          ]));

  }
}
