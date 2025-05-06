import React, { useState } from 'react';
import axios from 'axios';

function ClienteForm() {
  const [cliente, setCliente] = useState({
    nombre: '',
    correo: '',
    telefono: ''
  });

  const handleChange = (e) => {
    setCliente({
      ...cliente,
      [e.target.name]: e.target.value
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    await axios.post('http://localhost:3001/api/clientes', cliente);
    setCliente({ nombre: '', correo: '', telefono: '' });
    window.location.reload();
  };

  return (
    <form onSubmit={handleSubmit} className="mb-4">
      <div className="mb-3">
        <input
          type="text"
          name="nombre"
          className="form-control"
          placeholder="Nombre"
          value={cliente.nombre}
          onChange={handleChange}
          required
        />
      </div>
      <div className="mb-3">
        <input
          type="email"
          name="correo"
          className="form-control"
          placeholder="Correo"
          value={cliente.correo}
          onChange={handleChange}
          required
        />
      </div>
      <div className="mb-3">
        <input
          type="text"
          name="telefono"
          className="form-control"
          placeholder="Teléfono"
          value={cliente.telefono}
          onChange={handleChange}
          required
        />
      </div>
      <button type="submit" className="btn btn-primary w-100">
        Agregar Cliente
      </button>
    </form>
  );
}

export default ClienteForm;
