<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MainController extends AbstractController
{
    /**
     * @return RedirectResponse
     */
    public function index()
    {
        return $this->redirectToRoute('books');
    }
}