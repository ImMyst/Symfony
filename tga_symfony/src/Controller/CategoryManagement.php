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
     * @param Request $request
     * @param Environment $twig
     * @param RegistryInterface $doctrine
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function addCategory(Request $request, Environment $twig, RegistryInterface $doctrine)
    {
        {
            $category = new ShoppingCategory();
            $form = $this->createForm(CategoryType::class, $category);

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($category);
                $em->flush();
            }

            $category = $doctrine->getRepository(ShoppingCategory::class)->findAll();


            return new Response($twig->render('/category_management.html.twig', [
                'categories' => $category,
                'form' => $form->createView()
            ]));

        }
    }
}
