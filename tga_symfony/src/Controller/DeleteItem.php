<?php
namespace App\Controller;

use App\Entity\ShoppingItem;
use App\Repository\ShoppingItemRepository;
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
     * @Route("/suppression_produit", name="delete_item")
     */
    public function delete_item(Request $request, RegistryInterface $doctrine)
    {
      $em = $this->getDoctrine()->getManager();

      if($request->METHOD_DELETE('delete'))
          {
            $em->remove($items);
          }
          //the code that displays your table
        return $this->render('delete_item.html.twig'
        );
    }
}
