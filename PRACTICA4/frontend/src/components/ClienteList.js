import React, { useState, useEffect } from 'react';
import axios from 'axios';

function ClienteList() {
  const [clientes, setClientes] = useState([]);
  const [editCliente, setEditCliente] = useState(null);
  const [formData, setFormData] = useState({ nombre: '', correo: '', telefono: '' });

  useEffect(() => {
    getClientes();
  }, []);

  const getClientes = async () => {
    const response = await axios.get('http://localhost:3001/api/clientes');
    setClientes(response.data);
  };

  const deleteCliente = async (id) => {
    await axios.delete(`http://localhost:3001/api/clientes/${id}`);
    getClientes();
  };

  const handleEditClick = (cliente) => {
    setEditCliente(cliente.id);
    setFormData({ nombre: cliente.nombre, correo: cliente.correo, telefono: cliente.telefono });
  };

  const handleEditChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleUpdate = async (e) => {
    e.preventDefault();
    await axios.put(`http://localhost:3001/api/clientes/${editCliente}`, formData);
    setEditCliente(null);
    setFormData({ nombre: '', correo: '', telefono: '' });
    getClientes();
  };

  return (
    <div>
      <h2>Lista de Clientes</h2>
      <ul className="list-group">
        {clientes.map((cliente) => (
          <li key={cliente.id} className="list-group-item d-flex justify-content-between align-items-center">
            {editCliente === cliente.id ? (
              <form className="d-flex flex-column flex-md-row w-100" onSubmit={handleUpdate}>
                <input
                  type="text"
                  name="nombre"
                  value={formData.nombre}
                  onChange={handleEditChange}
                  className="form-control me-2 mb-2 mb-md-0"
                  required
                />
                <input
                  type="email"
                  name="correo"
                  value={formData.correo}
                  onChange={handleEditChange}
                  className="form-control me-2 mb-2 mb-md-0"
                  required
                />
                <input
                  type="text"
                  name="telefono"
                  value={formData.telefono}
                  onChange={handleEditChange}
                  className="form-control me-2 mb-2 mb-md-0"
                  required
                />
                <button type="submit" className="btn btn-success me-2">Guardar</button>
                <button type="button" onClick={() => setEditCliente(null)} className="btn btn-secondary">Cancelar</button>
              </form>
            ) : (
              <>
                <div>
                  {cliente.nombre} - {cliente.correo} - {cliente.telefono}
                </div>
                <div>
                  <button onClick={() => handleEditClick(cliente)} className="btn btn-warning btn-sm me-2">Editar</button>
                  <button onClick={() => deleteCliente(cliente.id)} className="btn btn-danger btn-sm">Eliminar</button>
                </div>
              </>
            )}
          </li>
        ))}
      </ul>
    </div>
  );
}

export default ClienteList;
