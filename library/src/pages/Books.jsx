import React, { useState, useEffect } from "react";

function Books() {

  const [book, setBook] = useState([]);

  useEffect(() => {
    

    (async function() {

      const url = "http://localhost/api/books";

      const response = await fetch(url, {
        headers: {
          'Accept': 'application/json'
        }
      });
  
      const booksFromApi = await response.json();

      setBook(booksFromApi);

    })(); 

  }, []);


  return (
    <>
      <main>
        <h1>Nos livres</h1>
          <div>
            {book.length >0 ?
              <>
                {book.map(books => {
                  return(
                    <h2>{books.title}</h2>
                  );
                })}
              </>
              :
                <p>Loading</p>
            }
          </div>

      </main>
    </>
  );
}

export default Books;