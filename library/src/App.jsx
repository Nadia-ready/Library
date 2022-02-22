import React from "react";
import { Container, Nav, Navbar } from "react-bootstrap";
import { Link, Route, Routes } from "react-router-dom";
import Books from "./pages/Books";
import Home from "./pages/Home";
import Reservations from "./pages/Reservations";

export class App extends React.Component {
  render() {
    return (
      <>
        <Navbar bg="dark" variant={"dark"} expand="lg">
          <Container>
              <Navbar.Brand href="#home">React-Bootstrap</Navbar.Brand>
              <Navbar.Toggle aria-controls="basic-navbar-nav" />
              <Navbar.Collapse id="basic-navbar-nav">
                  <Nav className="me-auto">
                      <Nav.Link as={Link} to={"/"}>Home</Nav.Link>
                      <Nav.Link as={Link} to={"/books"}>Bibliothèque</Nav.Link>
                      <Nav.Link as={Link} to={"/reservations"}>Réservations</Nav.Link>
                  </Nav>
              </Navbar.Collapse>
          </Container>
        </Navbar>
        <Container>
          <Routes>
            <Route extact path='/' element={<Home />} />
            <Route path='/books' element={<Books />} />
            <Route path='/reservations' element={<Reservations />} />
          </Routes>
        </Container>
      </>
    );
  }
}