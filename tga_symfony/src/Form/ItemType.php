<?php

namespace App\Form;

use App\Entity\ShoppingItem;
use App\Entity\ShoppingCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemType extends AbstractType
{
      public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
              'label' => 'Produit',
            ))
            ->add('category_id', EntityType::class, [
              'class' => ShoppingItem::class,
              'choice_label' => function($category_id) {
                return $category_id->__toString();
              },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ShoppingItem::class,
        ]);
    }
}
