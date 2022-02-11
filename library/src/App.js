import React from "react";
import { BrowserRouter as Router } from "react-router-dom";
import { Routes, Route } from 'react-router-dom';
import Home from "./pages/Home";
import Books from "./pages/Books";
import Reservations from "./pages/Reservations";

function App() {

  return (
    <div className="App">
      <Router>
        <Routes>
          <Route path="/" element={ <Home /> }></Route>
          <Route path="/books" element={ <Books /> }></Route>
          <Route path="/reservations" element={ <Reservations /> }></Route>
        </Routes>
      </Router>
    </div>
    
  );
}

export default App;
