<?php

namespace App\Controller;

use App\Entity\ShoppingItem;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\Response;

class DeleteItem extends Controller
{
    /**
     * @Route("/suppression-produit/123/{id}", name="delete_item")
     * @param RegistryInterface $doctrine
     * @param $id
     * @return Response
     */
    public function deleteItem(RegistryInterface $doctrine, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $items = $em->getRepository(ShoppingItem::class)
                    ->find($id);

        $em->remove($items);
        $em->flush();

        $items = $doctrine->getRepository(ShoppingItem::class)
                          ->findAll();

        return $this-> redirectToRoute('shipping_list', [
            'items' => $items
        ]);

    }
}
