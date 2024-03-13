// buscador.controller.js
const UnifiedCourse = require("../models/unifiedCourse.model");

exports.searchCourses = async (req, res) => {
  const { q } = req.query;
  try {
    const courses = await UnifiedCourse.find(
      {
        $text: { $search: q },
      },
      {
        score: { $meta: "textScore" },
      }
    ).sort({ score: { $meta: "textScore" } });
    res.json(courses);
  } catch (error) {
    console.error("Error al buscar cursos:", error);
    res.status(500).send("Error interno del servidor");
  }
};
