<?php


namespace App\Controller;


use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BookController extends AbstractController
{
    public function add()
    {
        $book = new Book();
        $book->setAuthor('');
        $book->setTitle('');
//        (new BookRepository())->
    }

    /**
     * @return Response
     */
    public function list()
    {
        return $this->render('books.html.twig');
    }
}