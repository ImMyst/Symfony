<?php

namespace App\Controller;

use App\Entity\ShoppingCategory;
use App\Entity\ShoppingItem;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DeleteCategory extends Controller
{
    /**
     * @Route("/suppression-categorie/123/{$id}", name="delete_category")
     * @param RegistryInterface $doctrine
     * @param ShoppingCategory $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function index(RegistryInterface $doctrine, ShoppingCategory $id)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('ShoppingCategory')->find($id);

        $em->remove($category);
        $em->flush();

        $categoryShop = $doctrine->getRepository(ShoppingItem::class)->findAll();
        return $this-> redirectToRoute('shipping_list', [
            'items' => $categoryShop
        ]);

    }
}
