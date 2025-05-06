const express = require('express');
const router = express.Router();
const clienteController = require('../controllers/clienteController');

// Rutas para el CRUD
router.get('/', clienteController.getClientes);
router.post('/', clienteController.createCliente);
router.put('/:id', clienteController.updateCliente);
router.delete('/:id', clienteController.deleteCliente);

module.exports = router;
