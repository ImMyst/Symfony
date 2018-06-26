<?php
namespace App\Controller;

use App\Entity\ShoppingItem;
use App\Entity\ShoppingCategory;
use App\Repository\ShoppingItemRepository;
use App\Repository\ShoppingCategoryRepository;
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
     * @Route("/suppression-produit/{itemId}", name="delete_item")
     * @param Environment $twig
     * @param RegistryInterface $doctrine
     * @param $id
     * @return Response
     */
//    public function deleteItem(Environment $twig, RegistryInterface $doctrine, $id)
//    {
//            $em = $this->getDoctrine()->getManager();
//            $items = $em->getRepository('ShoppingItem')->findOneBy(array('id' => $id));
//            $em->remove($items);
//            $em->flush();
//
//        $items = $doctrine->getRepository(ShoppingCategory::class)->findAll();
//
//
//        try {
//            return new Response($twig->render('/shipping_list.html.twig', [
//                'items' => $items
//            ]));
//        } catch (\Twig_Error_Loader $e) {
//        } catch (\Twig_Error_Runtime $e) {
//        } catch (\Twig_Error_Syntax $e) {
//        }
//    }
}
