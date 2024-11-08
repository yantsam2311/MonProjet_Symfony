<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class FormType extends AbstractType
{
    function buildForm(FormBuilderInterface $builder, array $options )

    {
        $builder->setMethod('POST');
       
        $builder
            ->add(
                'email',
                EmailType::class,
                ['attr' => ['placeholder' => 'Entrez vôtre email'],
                 "constraints" => [
                    new Assert\NotBlank(['message'=> 'le champs email est requis.']),
                    new Assert\Email(['message' => 'Veuillez entrer un email valide.']),
                ]]
            )

            ->add(
                'password',
                PasswordType::class,
                ['attr' => ['placeholder' => 'Entrez vôtre mot de passe'], "constraints" => [
                    new Assert\NotBlank(['message'=> 'champs obligatoire!']),
                    new Assert\Length ([
                      
                    "min" => 6,
                    'minMessage' => "'Le mot de passe doit comporter au moins 6 caractères.",
                                        
                    ]) 
                    
                ]]
            )

            ->add(
                'Envoyer',
                SubmitType::class,
                ["attr" => ['class' => "button"]]
            );
          

    }
}
