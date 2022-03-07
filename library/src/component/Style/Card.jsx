import React from "react";
import { Card } from "react-bootstrap";
import ButtonBorrowed from "../Style/ButtonBorrowed";
import Books from '../Books/Books';

function Books(props) {
    return (
        <Row xs={1} md={2} lg={3} xl={4} xxl={5} className="g-4">
                      {Array.from({ length: 4 }).map((_, idx) => (
                        <Col>
                          <Card>
                            <Card.Img variant="top" src={books.cover} />
                            <Card.Body>
                              <Card.Title>{books.title}</Card.Title>
                              <Card.Text>
                                {books.description}
                              </Card.Text>
                            </Card.Body>
                          </Card>
                        </Col>
                      ))}
        </Row>
    );
}