<?php


namespace App\Controller;


use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class BookController extends AbstractController
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
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
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function edit(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Book::class);
        /** @var Book $book */
        $book = $repository->find($request->get('id'));
        if (empty($book)) {
            return new Response('Not found');
        }

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