import React from 'react';
import { BrowserRouter as Router, Route, Link } from 'react-router-dom';
import Home from './components/Home';
import Settings from './components/Settings';

import './App.css';

function App() {
  return (
    <Router basename={getBaseURL()}>
      <div className="App">
        <Route exact path="/" component={Home} />
        <Route exact path="/settings" component={Settings} />

        <Link to="/">Home</Link>
        &nbsp;
        <Link to="/settings">Settings</Link>
      </div>
    </Router>
  );
}

function getBaseURL() {
  return window.location.href.replace( window.location.origin, '' );
}

export default App;
