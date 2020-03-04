<?php

namespace App\Controller;

use App\Entity\AboutMe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {

        // instantiate objects
        $session = new Session();
        $user = new AboutMe();
        $user->setText('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
        $user->setName('Unknown');

        // change username if session
        $userName = $session->get('name');
        if (isset($userName)) {
            $user->setName($userName);
        }

        // If button pressed, reroute
        if (isset($_POST['changeName'])) {
            return $this->redirectToRoute('change-name');
        }

        // render page
        return $this->render('homepage/index.html.twig', [
            'name' => $user->getName(), 'userText' => $user->getText(),
        ]);
    }
}
