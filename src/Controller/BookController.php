<?php


namespace App\Controller;


use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BookController extends AbstractController
{
    public function add(Request $request)
    {
        $book = new Book();
        $book->setTitle($request->get('title'));
        $book->setAuthor($request->get('author'));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($book);
        $entityManager->flush();

        return $this->redirectToRoute('books');
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