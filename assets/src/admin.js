// External
import { StrictMode } from 'react';
import { createRoot } from 'react-dom/client';
import { MemoryRouter } from "react-router-dom";

// Internal
import App from './App';

const rootElement = document.getElementById('react-admin-app');
const root        = createRoot(rootElement);

root.render(
  <StrictMode>
    <MemoryRouter>
      <App />
    </MemoryRouter>
  </StrictMode>
);
