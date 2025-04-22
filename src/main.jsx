import { StrictMode } from 'react';
import { createRoot } from 'react-dom/client';
import './index.css';
import App from './App.jsx';
import { createHashRouter, RouterProvider } from 'react-router-dom';

import Home from './pages/Home'; // Make sure this import is back
import About from './pages/About';
import Projects from './pages/Projects';
import Contact from './pages/Contact';
// import ErrorPage from './pages/ErrorPage.jsx';

const router = createHashRouter([
  {
    path: "/",
    element: <App />,
    // errorElement: <ErrorPage />,
    children: [
      {
        path: "", // Default child route for /
        element: <Home />, // Render the Home component here
      },
      {
        path: "about",
        element: <About />,
      },
      {
        path: "projects",
        element: <Projects />,
      },
      {
        path: "contact",
        element: <Contact />,
      },
    ],
  },
]);

createRoot(document.getElementById('root')).render(
  <StrictMode>
    <RouterProvider router={router} />
  </StrictMode>,
);