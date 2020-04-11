<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
{
    /**
     * @param $word
     * @return Response
     */
    public function index()
    {
        return $this->render('books.html.twig');
    }
}