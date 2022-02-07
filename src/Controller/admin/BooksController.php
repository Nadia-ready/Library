<?php

namespace App\Controller\admin;

use App\Entity\Books;
use App\Form\BooksType;
use App\Repository\BooksRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BooksController extends AbstractController
{

    //Show list of books

    /**
     * @Route("admin/books", name="books_list")
     */
    public function booksList(BooksRepository $booksRepository)
    {

        $books = $booksRepository->findAll();

        return $this->render('admin/books.html.twig', [
            'books' => $books
        ]);
    }

    // delete books

    /**
     * @Route("admin/books/{id}/delete", name="books_delete")
     */
    public function booksDelete($id, BooksRepository $booksRepository, EntityManagerInterface $entityManager)
    {
        $book = $booksRepository->find($id);
        $entityManager->remove($book);
        $entityManager->flush();

        return $this->redirectToRoute("books_list");
    }

    // Create books

    /**
     * @Route("admin/books/create", name="books_create")
     */
    public function booksCreate(Request $request, EntityManagerInterface $entityManager)
    {
        //creation of the form with the fields of the books table
        $book = new Books();
        $bookForm = $this->createForm(BooksType::class, $book);

        $bookForm->handleRequest($request);

        //if the form is submitted and valid we send the data
        if ($bookForm->isSubmitted() && $bookForm->isValid()) {
            $entityManager->persist($book);
            $entityManager->flush();
        }


        return $this->render('admin/books-create.html.twig', [
            'bookForm' => $bookForm->createView()
        ]);
    }


    //modify list of books

    /**
     * @Route("admin/books/{id}/update", name="books_update")
     */
    public function updateBooks($id, BooksRepository $booksRepository, Request $request, EntityManagerInterface $entityManager)
    {
        $book = $booksRepository->find($id);
        $bookForm = $this->createForm(BooksType::class, $book);

        $bookForm->handleRequest($request);

        //if the form is submitted and valid we send the data
        if ($bookForm->isSubmitted() && $bookForm->isValid()) {
            $entityManager->persist($book);
            $entityManager->flush();
        }


        return $this->render('admin/books-create.html.twig', [
            'bookForm' => $bookForm->createView()
        ]);
    }

}