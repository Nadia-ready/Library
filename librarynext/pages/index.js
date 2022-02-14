import Head from 'next/head'
import Image from 'next/image'
import styles from '../styles/Home.module.css'

export default function Home({book}) {
  return (
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

  );
}

export const getStaticProps = async () => {
  const url = "http://localhost/api/books";

      const response = await fetch(url, {
        headers: {
          'Accept': 'application/json'
        }
      });

      const book = await response.json();

      return {
        props: {
          book
        }
      }
}
