//routes/categories.js
const express = require("express");
const router = express.Router();
const categoriesController = require("../controllers/categories.controller.js");

// Define rutas para categorías de UTN y Udemy
router.get("/utn", categoriesController.getUTNCategories);
router.get("/udemy", categoriesController.getUdemyCategories);

module.exports = router;
