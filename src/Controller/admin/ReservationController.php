<?php

namespace App\Controller\admin;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
//Show list of reservation

    /**
     * @Route("admin/reservation", name="reservation_list")
     */
    public function reservationList(ReservationRepository $reservationRepository)
    {

        $reservation = $reservationRepository->findAll();

        return $this->render('admin/reservation.html.twig', [
            'reservation' => $reservation
        ]);
    }


    // delete reservation

    /**
     * @Route("admin/reservation/{id}/delete", name="reservation_delete")
     */
    public function reservationDelete($id, ReservationRepository $reservationRepository, EntityManagerInterface $entityManager)
    {
        $reservation = $reservationRepository->find($id);
        $entityManager->remove($reservation);
        $entityManager->flush();

        return $this->redirectToRoute("reservation_list");
    }

    // Create reservation

    /**
     * @Route("admin/reservation/create", name="reservation_create")
     */
    public function reservationCreate(Request $request, EntityManagerInterface $entityManager)
    {
        //creation of the form with the fields of the reservation table
        $reservation = new Reservation();
        $reservationForm = $this->createForm(ReservationType::class, $reservation);

        $reservationForm->handleRequest($request);

        //if the form is submitted and valid we send the data
        if ($reservationForm->isSubmitted() && $reservationForm->isValid()) {
            $entityManager->persist($reservation);
            $entityManager->flush();
        }


        return $this->render('admin/reservation-create.html.twig', [
            'reservationForm' => $reservationForm->createView()
        ]);
    }


    //modify list of reservation

    /**
     * @Route("admin/reservation/{id}/update", name="reservation_update")
     */
    public function updateReservation($id, ReservationRepository $reservationRepository, Request $request, EntityManagerInterface $entityManager)
    {
        $reservation = $reservationRepository->find($id);
        $reservationForm = $this->createForm(ReservationType::class, $reservation);

        $reservationForm->handleRequest($request);

        //if the form is submitted and valid we send the data
        if ($reservationForm->isSubmitted() && $reservationForm->isValid()) {
            $entityManager->persist($reservation);
            $entityManager->flush();
        }


        return $this->render('admin/reservation-create.html.twig', [
            'reservationForm' => $reservationForm->createView()
        ]);
    }

}