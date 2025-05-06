import React from 'react';
import ClienteForm from './components/ClienteForm';
import ClienteList from './components/ClienteList';

function App() {
  return (
    <div className="container">
      <h1>PRACTICA 4</h1>
      <h2>Luis B. Quelca Quelca</h2>
      <ClienteForm />
      <ClienteList />
    </div>
  );
}

export default App;

