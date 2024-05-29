<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
<<<<<<< HEAD
=======
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
>>>>>>> feature/iheb
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
<<<<<<< HEAD
        $builder
            ->add('user_id')
            ->add('agreeTerms', CheckboxType::class, [
                                'mapped' => false,
=======
        $possible_roles = array('user' => 'ROLE_USER', 'admin' => 'ROLE_ADMIN');
        $builder
            //->add('user_id')
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
>>>>>>> feature/iheb
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
<<<<<<< HEAD
                                // instead of being set onto the object directly,
=======
                // instead of being set onto the object directly,
>>>>>>> feature/iheb
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
<<<<<<< HEAD
        ;
=======
            // ->add('roles', ChoiceType::class, [
            //     'multiple' => true,
            //     'choices' => $possible_roles,
            //     'mapped' => false,
            //     'required' => true,
            //     'constraints' => [
            //         new NotBlank(['message' => 'Please choose a role',]),
            //     ],
            // ])
            ->add('user_email', EmailType::class)
            ->add('user_fullname');

>>>>>>> feature/iheb
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
