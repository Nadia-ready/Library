import React from "react";
import { Form } from "react-bootstrap";
import ButtonSend from "../Style/ButtonSend";

function Home() {

    return (
      <>
        <main>
          <h1>Bienvenue dans notre médiathèque</h1>
          <h2>Veuillez vous connecter</h2>

          <Form>
              <Form.Group className="mb-3" controlId="formBasicEmail">
                <Form.Label>Email</Form.Label>
                <Form.Control type="email" placeholder="Renseigner votre e-mail" />
                <Form.Text className="text-muted">
                  Nous ne partageons pas votre mail.
                </Form.Text>
              </Form.Group>

              <Form.Group className="mb-3" controlId="formBasicPassword">
                <Form.Label>Mot de passe</Form.Label>
                <Form.Control type="password" placeholder="Mot de passe" />
              </Form.Group>
              <ButtonSend />
          </Form>

        </main>
      </>
    
  );
}

export default Home;