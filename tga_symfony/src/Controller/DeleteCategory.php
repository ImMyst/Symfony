<?php

namespace App\Controller;

use App\Entity\ShoppingCategory;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DeleteCategory extends Controller
{
    /**
     * @Route("/suppression-categorie/123/{id}", name="delete_category")
     * @param RegistryInterface $doctrine
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteCategory(RegistryInterface $doctrine, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository(ShoppingCategory::class)
            ->find($id);

        $em->remove($category);
        $em->flush();

        $category = $doctrine->getRepository(ShoppingCategory::class)->findAll();
        return $this-> redirectToRoute('category_management', [
            'items' => $category
        ]);

    }
}
