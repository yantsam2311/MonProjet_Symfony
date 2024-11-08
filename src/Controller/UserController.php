<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\FormType;
use App\Form\SignUpForm;
use App\Repository\UserRepository;
use Error;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use PhpParser\Node\Stmt\Return_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\MakerBundle\Security\Model\Authenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;


class UserController extends AbstractController
{
    #[Route("/inscription", name: "inscription", methods: ["GET", 'post'])]
    function inscription(Request $req, UserRepository $userRepository, UserPasswordHasherInterface $passwordHasher, UserRepository $repo )
    {
        $user = new User(); 
 
        $SignUpForm = $this->createForm(SignUpForm::class, $user);

        $SignUpForm->handleRequest($req);

        
        if ($SignUpForm->isSubmitted() && $SignUpForm->isValid()) {

          //verifier si l'email exist
          $userInDB = $repo->findByEmail($user->getEmail());
          if ($userInDB) {
            return $this->render('pages/inscription.html.twig', [
                "formulaire" => $SignUpForm,
                "message" => ["status" => 'error', "content" => 'Vous êtes déja membre? Connectez-vous!']
            ]);
        }

             // Hasher le mot de passe 

         $plainPassword = $user->getPassword();
         $hashedPassword = $passwordHasher->hashPassword($user, $plainPassword);
         $user->setPassword($hashedPassword);

         $repo->save($user, true);

        }
        return $this->render(
            'pages/inscription.html.twig',
            ['formulaire' => $SignUpForm,
            "message" => ["status" => 'success', "content" => 'Inscription réussie, connectez-vous!']]
         );

         }


         #[Route('/login', name: 'app_login')]
         public function login(Request $request,AuthenticationUtils $authenticationUtils)
         {
             $lastEmail = $authenticationUtils->getLastUsername(); 
             $error = $authenticationUtils->getLastAuthenticationError();
     
             $form = $this->createForm(FormType::class);
     
             return $this->render('pages/login.html.twig', [
                 'last_email' => $lastEmail,
                 'loginForm' => $form->createView(),
                 'error' => $error,
             ]);
         }

         #[Route('/logout', name: 'app_logout')]
         public function logout(Request $request,AuthenticationUtils $authenticationUtils)
         {
          }
        }
       
      
    
    

