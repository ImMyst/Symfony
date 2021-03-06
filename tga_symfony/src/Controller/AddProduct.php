<?php

namespace App\Controller;

use App\Entity\ShoppingItem;
use App\Entity\ShoppingCategory;
use App\Form\ItemType;
use App\Repository\ShoppingItemRepository;
use App\Repository\ShoppingCategoryRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class AddProduct extends Controller
{
    /**
     * @Route("/ajout-produit", name="add_product")
     * @param Request $request
     * @param Environment $twig
     * @param RegistryInterface $doctrine
     * @return Response
     */

    public function addProduct(Request $request, Environment $twig, RegistryInterface $doctrine)
    {
        $products = new ShoppingItem();
        $form = $this->createForm(ItemType::class, $products);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($products);
            $em->flush();
        }

        $items = $doctrine->getRepository(ShoppingItem::class)->findAll();


        return $this-> redirectToRoute('shipping_list', [
            'items' => $items,
            'form' => $form->createView()
        ]);


    }
}

