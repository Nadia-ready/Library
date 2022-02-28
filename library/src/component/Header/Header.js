import React from 'react';
import { Navbar,Nav } from 'react-bootstrap';
import {LinkContainer} from 'react-router-bootstrap';

const Header = () => {
    return (
        <Navbar bg="dark" variant={"dark"} expand="lg">
    <LinkContainer to="/">
        <Navbar.Brand href="#home">React-Bootstrap</Navbar.Brand>
        </LinkContainer>
        <Navbar.Toggle aria-controls="basic-navbar-nav" />
        <Navbar.Collapse id="basic-navbar-nav">
        <Nav className="me-auto">
            <LinkContainer to="/" >
                <Nav.Link>Home</Nav.Link>
            </LinkContainer>
            <LinkContainer to="/Books" >
                <Nav.Link>Books</Nav.Link>
            </LinkContainer>
            <LinkContainer to="/BReservations" >
                <Nav.Link>Reservations</Nav.Link>
            </LinkContainer>
         </Nav>
        </Navbar.Collapse>
  </Navbar>
    )
}

export default Header