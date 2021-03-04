<?php

namespace App\Form;

use App\Entity\Contacts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,
            [
                'required'=>false,
                'label'=>'Имя'
            ]
            )
            ->add('email',TextType::class,
                [
                    'required'=>false,
                    'label'=>'Email'
                ])
            ->add('subject',TextType::class,
                [
                    'required'=>false,
                    'label'=>'Тема'
                ])
            ->add('message',TextareaType::class,
                [
                    'required'=>false,
                    'label'=>'Сообщение'
                ])
            ->add('send', SubmitType::class, [
                'attr' => ['class' => 'btn' ],
                'label'=>'Отправить'
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contacts::class,
        ]);
    }
}
