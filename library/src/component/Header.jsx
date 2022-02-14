import  { Link } from 'react-router-dom';

function Header(props) {

    const style= {

        backgroundColor: props.color
    };

    return(
        <header style={style}>
            <nav>
                <ul>
                    <li>
                        <Link to="/">Accueil</Link>
                    </li>
                    <li>
                        <Link to="/books">Livres</Link>
                    </li>
                    <li>
                        <Link to="/reservations">Réservations</Link>
                    </li>
                </ul>
            </nav>
        </header>
    )
};

export default Header;