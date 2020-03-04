<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class ChangeNameController extends AbstractController
{
    /**
     * @Route("change-name", name="change-name")
     */
    public function index()
    {

        // if name entered, store in session and redirect
        if (isset($_POST['name'])) {
            $session = new Session();
            $session->set('name', $_POST['name']);

            return $this->redirectToRoute('homepage');
        }

        return $this->render('change_name/index.html.twig');
    }

}
