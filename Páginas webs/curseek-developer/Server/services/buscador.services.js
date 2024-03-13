// buscador.services.js
const UnifiedCourse = require("../models/unifiedCourse.model");

// Función para buscar cursos basada en una cadena de búsqueda
const searchCourses = async (query) => {
  try {
    return await UnifiedCourse.find(
      {
        $text: { $search: query },
      },
      {
        score: { $meta: "textScore" },
      }
    ).sort({ score: { $meta: "textScore" } });
  } catch (error) {
    throw error;
  }
};

module.exports = {
  searchCourses,
  // ... otras funciones que puedas necesitar
};
