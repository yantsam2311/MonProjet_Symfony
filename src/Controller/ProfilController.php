<?php
// src/Controller/ProfilController.php
namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController {
  #[Route("/profil", name: "profil")]

  public function showprofil(Request $req, UserRepository $repo)
   {
    // Vérifie si l'utilisateur est authentifié
    if (!$this->isGranted("IS_AUTHENTICATED_FULLY")){
        return $this->redirectToRoute('inscription');

    }
      // Si l'utilisateur est authentifié, rendre la vue
    return $this->render ('pages/profil/index.html.twig');
    }
 
}










   



  


