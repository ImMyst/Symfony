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

class AddProduct extends Controller
{
    /**
     * @Route("/ajout-produit", name="add_product")
     */
     
    public function add_product()
    {
        return $this->render('/add_product.html.twig'

      );
    }
}