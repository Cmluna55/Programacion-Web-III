const db = require('../models/cliente');

// Mostrar todos los clientes
exports.getClientes = (req, res) => {
  db.query('SELECT * FROM cliente', (err, results) => {
    if (err) throw err;
    res.json(results);
  });
};

// Crear nuevo cliente
exports.createCliente = (req, res) => {
  const { nombre, correo, telefono } = req.body;
  db.query('INSERT INTO cliente (nombre, correo, telefono) VALUES (?, ?, ?)', [nombre, correo, telefono], (err, results) => {
    if (err) throw err;
    res.json({ message: 'Cliente creado' });
  });
};

// Actualizar cliente
exports.updateCliente = (req, res) => {
  const { id } = req.params;
  const { nombre, correo, telefono } = req.body;
  db.query('UPDATE cliente SET nombre = ?, correo = ?, telefono = ? WHERE id = ?', [nombre, correo, telefono, id], (err, results) => {
    if (err) throw err;
    res.json({ message: 'Cliente actualizado' });
  });
};

// Eliminar cliente
exports.deleteCliente = (req, res) => {
  const { id } = req.params;
  db.query('DELETE FROM cliente WHERE id = ?', [id], (err, results) => {
    if (err) throw err;
    res.json({ message: 'Cliente eliminado' });
  });
};
