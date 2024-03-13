const utnService = require("../services/utn.services.js");
const udemyService = require("../services/udemy.services.js");
const courseService = require("../services/udemy.services.js");

exports.searchCourses = async (req, res) => {
  const query = req.query.q;
  try {
    const utnCourses = await utnService.searchUtnCoursesService(query);
    const udemyCourses = await udemyService.searchUdemyCoursesService(query);
    const courses = utnCourses.concat(udemyCourses);
    res.status(200).json(courses);
  } catch (error) {
    console.error("Error al buscar cursos:", error);
    res.status(500).send("Error interno del servidor");
  }
};

exports.getAllCourses = async (req, res) => {
  const categories = req.query.categories; // Cambiado de 'categoria' a 'categories'
  const filterType = req.query.filter;
  const page = Number(req.query.page) || 1;
  const limit = Number(req.query.limit) || 10; // Cambiado a 10 para mantener consistencia
  try {
    // Asegúrate de que el servicio espera 'categories' como parte de su interfaz
    const result = await courseService.getAllCoursesService({
      categories,
      filterType,
      page,
      limit,
    });
    res.status(200).json({
      courses: result.courses,
      totalPages: result.totalPages,
      totalCourses: result.totalCourses,
    });
  } catch (error) {
    console.error("Error al obtener los cursos:", error);
    res.status(500).send("Error interno del servidor");
  }
};
