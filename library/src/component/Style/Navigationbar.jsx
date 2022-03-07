import React from "react";
import 'bootstrap/dist/css/bootstrap.min.css';
import {  Nav, Navbar } from "react-bootstrap";
import styled from 'styled-components';
import { Link } from "react-router-dom";

const Styles = styled.div`
    .navbar {
        background-color: #1C1F2A;
    }
`;

export const Navigationbar = () => {
    <Styles>
        <Navbar bg="dark" variant={"dark"} expand="lg">
                <Navbar.Brand href="#home">React-Bootstrap</Navbar.Brand>
                <Navbar.Toggle aria-controls="basic-navbar-nav" />
                <Navbar.Collapse id="basic-navbar-nav">
                    <Nav className="me-auto">
                        <Nav.Link as={Link} to={"/"}>Home</Nav.Link>
                        <Nav.Link as={Link} to={"/books"}>Bibliothèque</Nav.Link>
                        <Nav.Link as={Link} to={"/reservations"}>Réservations</Nav.Link>
                    </Nav>
                </Navbar.Collapse>
        </Navbar>
    </Styles>
}

