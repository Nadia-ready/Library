import React from "react";
import { BrowserRouter as Router } from "react-router-dom";
import { Routes, Route } from "react-router-dom";
import Home from "./pages/Home";
import Books from "./pages/Books";
import Reservations from "./pages/Reservations";
import 'bootstrap/dist/css/bootstrap.min.css';
import { Navbar,Nav,Container } from 'react-bootstrap';
import {Link} from 'react-router-dom';

function App() {

  return (
    
    <div className="App">
      <>
      <Navbar bg="dark" variant={"dark"} expand="lg">
        <Container>
            <Navbar.Brand href="#home">React-Bootstrap</Navbar.Brand>
            <Navbar.Toggle aria-controls="basic-navbar-nav" />
            <Navbar.Collapse id="basic-navbar-nav">
            <Nav className="me-auto">
                <Nav.Link as={Link} to={"/"}>Home</Nav.Link>
                <Nav.Link as={Link} to={"/Books"}>Bibliothèque</Nav.Link>
                <Nav.Link as={Link} to={"/Reservations"}>Réservations</Nav.Link>
            </Nav>
            </Navbar.Collapse>
        </Container>
        </Navbar>
      </>
      
    

    </div>
  );
}

export default App;
