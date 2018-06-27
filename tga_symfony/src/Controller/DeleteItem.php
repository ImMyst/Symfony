<?php
namespace App\Controller;

use App\Entity\ShoppingItem;
use App\Entity\ShoppingCategory;
use App\Repository\ShoppingItemRepository;
use App\Repository\ShoppingCategoryRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class DeleteItem extends Controller
{
    /**
     * @Route("/suppression-produit/{$itemId}", name="delete_item")
     * @param RegistryInterface $doctrine
     * @param $itemId
     * @return Response
     */
    public function deleteItem(RegistryInterface $doctrine, $itemId)
    {
            $em = $this->getDoctrine()->getManager();
            $items = $em->getRepository('ShoppingItem')->findOneBy(array('id' => $itemId));


            $em->remove($items);
            $em->flush();

            $itemShop = $doctrine->getRepository(ShoppingCategory::class)->findAll();
            return $this-> redirectToRoute('shipping_list', [
                'items' => $itemShop
             ]);

        }
}
