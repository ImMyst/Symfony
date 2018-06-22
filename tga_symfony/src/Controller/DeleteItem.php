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
     * @Route("/suppression-produit", name="delete_item")
     */
    public function deleteItem(Request $request, RegistryInterface $doctrine)
    {
      $em = $this->getDoctrine()->getManager();

      if($request->('delete'))
          {
            $em->remove($items);
          }
          //the code that displays your table
        return $this->render('delete_item.html.twig'
        );
    }
}
