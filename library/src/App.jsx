import React from "react";
import ReactDOM from 'react-dom';
import { Container, Nav, Navbar } from "react-bootstrap";
import { Link, Route, Routes } from "react-router-dom";
import Books from "./component/Books/Books";
import Home from "./component/Home/Home";
import Reservations from "./component/Reservations/Reservations";
import { HydraAdmin } from '@api-platform/admin';

const Admin = () => <HydraAdmin entrypoint="http://localhost/api" />; // Replace with your own API entrypoint

ReactDOM.render(<Admin />, document.getElementById('root'));

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
                      <Nav.Link as={Link} to={"/"}>Bienvenue</Nav.Link>
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