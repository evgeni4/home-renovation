<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Vich\UploaderBundle\Form\Type\VichImageType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',TextType::class,
                [
                    'required'=>false
                ]
            )
            ->add('fullName',TextType::class,
                [
                    'required'=>false,
                    'label'=>'Имя'
                ])
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'download_link' => false,
                'image_uri' => false,
                'label'=>'Фото'
            ])
            ->add('plainPassword', RepeatedType::class, [
                'mapped' => false,
                'required' => false,
                'label'=>'Пароль',
                'type' => PasswordType::class,
                'first_options' => [
                    'label'=>'Пароль',
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Пожалуйста, введите пароль',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Ваш пароль должен содержать не менее {{limit}} символов.',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                    ],
                ],
                'second_options' => [
                    'label'=>'Повторить пароль',
                ],
                'invalid_message' => 'Поля пароля должны совпадать.',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
