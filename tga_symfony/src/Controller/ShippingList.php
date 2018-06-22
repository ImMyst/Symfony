<?php
namespace App\Controller;

use App\Entity\ShoppingItem;
use App\Entity\ShoppingCategory;
use App\Repository\ShoppingItemRepository;
use App\Repository\ShoppingCategoryRepository;
use App\Form\ItemType;
use Symfony\Component\Form\Form;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ShippingList extends Controller

{
  /**
   * @Route("/", name="shipping_list")
   */

  public function shipping_list(Request $request, Environment $twig, RegistryInterface $doctrine, FormFactoryInterface $formFactory) {
          $items = $doctrine->getRepository(ShoppingItem::class)->findAll();
          $form = $formFactory->createBuilder(ItemType::class, $items[0])->getForm();
          $em = $this->getDoctrine()->getManager();

          $form->handleRequest($request);

          if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($items);
            $em->flush();
          }


          return new Response($twig->render('/shipping_list.html.twig', [
            'items' => $items,
            'form' => $form->createView()
          ]));

  }
}
