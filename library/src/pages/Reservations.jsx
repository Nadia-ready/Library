import React, { useState, useEffect } from "react";
import Header from "../component/Header";

function Reservations() {

  const [reservations, setReservations] = useState([]);

  useEffect(() => {
    

    (async function() {

      const url = "http://localhost/api/reservations";

      const response = await fetch(url, {
        headers: {
          'Accept': 'application/json'
        }
      });
  
      const ReservationsFromApi = await response.json();

      setReservations(ReservationsFromApi);

    })(); 

  }, []);


  return (
    <>
      <Header />
      <main>
        <h1>Liste des réservations</h1>

        {reservations.map(Reservation => {
          return(
              <h2>{Reservation.id}</h2>
          )
        })};

      </main>
    </>
  );
}

export default Reservations;