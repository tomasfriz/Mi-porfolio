const express = require("express");
const mongoose = require("mongoose");
const cors = require("cors");
const app = express();

// Middlewares
app.use(cors());
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Rutas
const coursesRoutes = require("./routes/courses.js");
const categoriesRoutes = require("./routes/categories.js");
const usersRoutes = require("./routes/users.js");

// Montar las rutas
app.use("/cursos", coursesRoutes);
app.use("/categorias", categoriesRoutes);
app.use("/users", usersRoutes);

// Conectar con MongoDB
const db = mongoose.connection;

mongoose.connect("mongodb://localhost:27017/cursosApp", {
  useNewUrlParser: true,
  useUnifiedTopology: true,
});

db.on("error", (err) => {
  console.error("Error conectando a MongoDB:", err);
});

db.once("open", () => {
  console.log("Conexión exitosa a MongoDB");
});

// Manejador de errores globales
app.use((error, req, res, next) => {
  console.error(error.message);
  res.status(500).send("Error interno del servidor");
});

// Iniciar el servidor en el puerto 3333
app.listen(3333, () => {
  console.log("Servidor escuchando en el puerto 3333");
});
