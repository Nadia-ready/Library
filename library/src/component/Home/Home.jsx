import React, { useState, useEffect } from "react";

function Home() {

  const [user, setUser] = useState([]);

  useEffect(() => {
    

    (async function() {

      const url = "http://localhost/api/users";

      const response = await fetch(url, {
        headers: {
          'Accept': 'application/json'
        }
      });
  
      const usersFromApi = await response.json();

      setUser(usersFromApi);

    })(); 

  }, []);

    return (
      <>
        <main>
          <h1>Bienvenue dans notre médiathèque</h1>
          <div>
            {user.length > 0 ?
            <>
              {user.map(users => {
                return(
                  <h2>{users.lastname}</h2>
                );
              })}
            </>
            :
              <p>Loading</p>
          }
          </div>

          <form>
            <label>
              <input type="text" name="name" />
            </label>
              <input type="submit" value="envoyer" />
          </form>
        </main>
      </>
    
  );
}

export default Home;