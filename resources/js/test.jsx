import React from "react";
import {createRoot} from "react-dom/client";
import {HashRouter,Link} from "react-router-dom";
import {Routes,Route} from "react-router";

const Home = () => <h1>Home</h1>
const About = () => <h1>About</h1>

const MainRouter = () => {
    return (
        <HashRouter>
            <Link to="/">Home</Link>
            <Link to="/about">About</Link>
            <Routes>
                <Route path="/" element={<Home />} />
                <Route path="/about" element={<About />} />
            </Routes>
        </HashRouter>
    )
}

createRoot(document.getElementById('root')).render(<MainRouter />)

