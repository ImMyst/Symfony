<?php

namespace App\Controller;

use App\Entity\ShoppingCategory;
use App\Repository\ShoppingItemRepository;
use App\Repository\ShoppingCategoryRepository;
use App\Form\CategoryType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class CategoryManagement extends Controller
{
    /**
     * @Route("/categories", name="category_management")
     */
    public function category_management(Request $request, Environment $twig, RegistryInterface $doctrine, FormFactoryInterface $formFactory)
    {
      $items = $doctrine->getRepository(ShoppingCategory::class)->findAll();
      $form = $formFactory->createBuilder(CategoryType::class, $items[0])->getForm();
      $em = $this->getDoctrine()->getManager();

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        $em->flush();
      }

      return new Response($twig->render('/category_management.html.twig', [
        'items' => $items,
        'form' => $form->createView()
      ]));
    }
}
