<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class SignUpForm extends AbstractType
{
    function buildForm(FormBuilderInterface $builder, array $options )

    {
        $builder->setMethod('POST');
        $builder->setAttributes(['class' => "MonId"]);
       
        $builder
            ->add(
                'email',
                EmailType::class,
                ['attr' => ['placeholder' => 'Entrez vôtre email'], "constraints" => [
                    new Assert\NotBlank(['message' => 'Le champ email est requis.']),
                    new Assert\Email(['message'=> 'Email invalide!'])
                    
                ]]
            )

            ->add(
                'pseudo',
                TextType::class,
                ['attr' => ['placeholder' => 'Entrez vôtre pdeudo'], "constraints" => [
                    new Assert\NotBlank(['message'=> 'champs pseudo ne peut pas etre vide!']),
                    new Assert\Length ([
                      
                    "min" => 3,
                    "max" => 50, 
                    'minMessage' => "le Message est trop court",
                    'maxMessage' => "le Message est trop long"
                    
                    ]) 
                    
                ]]
            )


            ->add(
                'password',
                PasswordType::class,
                ["label" => "mot de passe ", 'attr' => ['placeholder' => 'Entrez vôtre password'],
                "constraints" => [
                    new Assert\NotBlank(['message'=> 'mot de passe obligatoire']),
                    new Assert\Length(
                        [
                            "min"=> 6,
                            'minMessage' => "Le mot de passe est trop court"

                        ]
                    )
                ]]
            )

            ->add(
                'confirmPassword',
                PasswordType::class,
                ["label" => "confirmer le mot de passe ", 'attr' => ['placeholder' => 'confirmer vôtre password'],
                "constraints" => [
                    new Assert\NotBlank(['message'=> 'mot de passe obligatoire']),
                    new Assert\Length(
                        [
                            "min"=> 6,
                            'maxMessage' => "Le mot de passe est trop long"

                        ]
                    )
                ]]
            )
            

            ->add(
                'Envoyer',
                SubmitType::class,
                ["attr" => ['class' => "button"]]
            );
          

    }
}