const express = require('express');
const cors = require('cors');
const app = express();
const clienteRoutes = require('./routes/clienteRoutes');
app.use(cors());
app.use(express.json());
app.use('/api/clientes', clienteRoutes);
const PORT = 3001;
app.listen(PORT, () => {
  console.log(`Servidor corriendo en http://localhost:${PORT}`);
});
