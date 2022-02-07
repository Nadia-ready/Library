<?php

namespace App\Form;

use App\Entity\Books;
use App\Entity\Reservation;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('datereservation')
            ->add('dateborrowed')
            ->add('bookId', EntityType::class, [
                'class' => Books::class,
                'choice_label' => 'title',
            ])
            ->add('userId', EntityType::class, [
                'class' =>Users::class,
                'choice_label' => 'lastname',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
