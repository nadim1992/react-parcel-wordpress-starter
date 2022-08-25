import React from 'react';
import { Routes, Route, Link } from 'react-router-dom';
import Home from './components/Home';
import Settings from './components/Settings';

import './App.css';

function App() {
  return (
    <div className='App'>
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/settings" element={<Settings />} />
      </Routes>

      <br />
      <br />
      <br />

      <Link to="/">Home</Link>
      &nbsp;
      <Link to="/settings">Settings</Link>
    </div>
  );
}

export default App;
