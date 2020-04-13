<?php


namespace App\Controller;


use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BookController extends AbstractController
{
    public function add()
    {

    }

    /**
     * @return Response
     */
    public function list()
    {
        $repository = $this->getDoctrine()->getRepository(Book::class);
        $books = $repository->findAll();
        return $this->render(
            'books.html.twig',
            [
                'books' => $books
            ]
        );
    }
}