//categories.controller.js
const UTNCourse = require("../models/utn.models.js");
const UdemyCourse = require("../models/udemy.models.js");

exports.getUTNCategories = async (req, res) => {
  try {
    const categorias = await UTNCourse.distinct("category");
    res.json(categorias);
  } catch (error) {
    console.error("Error al obtener las categorías de UTN:", error);
    res.status(500).send("Error interno del servidor");
  }
};

exports.getUdemyCategories = async (req, res) => {
  try {
    const categories = await UdemyCourse.aggregate([
      { $match: { "primary_category.title": { $exists: true } } },
      { $group: { _id: "$primary_category.title" } },
    ]);
    const categoryTitles = categories.map((cat) => cat._id); // Extraemos los títulos de las categorías

    if (categoryTitles.length === 0) {
      res.status(404).json({ message: "No se encontraron categorías." });
    } else {
      res.json(categoryTitles);
    }
  } catch (error) {
    console.error("Error al obtener las categorías de Udemy:", error);
    res.status(500).send(`Error interno del servidor: ${error.message}`);
  }
};
