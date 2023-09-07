<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Intl\Languages;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, ['label'=>'Votre pénom', 'constraints'=>new Length(30,2), 'attr'=>['placeholder'=>'Prénom']])
            ->add('lastname', TextType::class, ['label'=>'Votre nom', 'constraints'=>new Length(30,2),'attr'=>['placeholder'=>'Nom']])
            ->add('telephone', NumberType::class, ['label'=>'Votre telephone', 'constraints'=>new Length(10,2), 'attr'=>['placeholder'=>'Téléphone']])
            ->add('city', TextType::class, ['label'=>'Votre ville', 'constraints'=>new Length(30,2),'attr'=>['placeholder'=>'Ville']])
            ->add('city_code', NumberType::class, ['label'=>'Votre code postale', 'constraints'=>new Length(5,2),'attr'=>['placeholder'=>'Code postale']])
            ->add('email', EmailType::class, ['label'=>'Votre email', 'constraints'=>new Length(60,2),'attr'=>['placeholder'=>'email']])
            #->add('password', PasswordType::class, ['label'=>'Votre mot de passe', 'attr'=>['placeholder'=>'Mot de passe']])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'label'=>'Votre mot de passe', 'constraints'=>new Length(60,2),
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Password', 'attr'=>['placeholder'=>'Mode de passe']],
                'second_options' => ['label' => 'Repeat Password', 'attr'=>['placeholder'=>'Confirmez le mot de passe']],
            ])
            #->add('password_confirm', PasswordType::class, ['label'=>'Confirmer votre mot de passe', 'mapped'=>false, 'attr'=>['placeholder'=>'Confirmer mot de passe']])
            ->add('submit', SubmitType::class, ['label'=>"S' inscrire"]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
