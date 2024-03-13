const utnService = require("../services/utn.services.js");

exports.getUtnCourses = async (req, res) => {
  const { page = 1, limit = 10, categories } = req.query;
  try {
    const result = await utnService.getUTNCoursesService(
      categories,
      page,
      limit
    );
    res.status(200).json({
      courses: result.courses,
      totalPages: result.totalPages,
      totalCourses: result.totalCourses,
    });
  } catch (error) {
    console.error("Error obteniendo cursos de la UTN:", error);
    res.status(500).json({ message: "Error interno del servidor" });
  }
};

exports.getSingleCourse = async (req, res) => {
  const courseId = req.params.id;
  try {
    const course = await utnService.getSingleUTNCourseService(courseId);
    if (!course) {
      return res.status(404).json({ message: "Curso no encontrado" });
    }
    res.status(200).json(course);
  } catch (error) {
    console.error("Error obteniendo el curso individual:", error);
    res.status(500).json({ message: "Error interno del servidor" });
  }
};
