const utnCourse = require("../models/utn.models.js"); // Modelo para los cursos UTN

// Servicio para obtener un curso único de UTN por ID
exports.getSingleUTNCourseService = async (id) => {
  return await utnCourse.findById(id);
};

exports.getUTNCoursesService = async (category, page, limit) => {
  let query = {};
  if (category) {
    query.category = category;
  }
  const totalCourses = await utnCourse.countDocuments(query);
  let courses = await utnCourse
    .find(query)
    .skip((page - 1) * limit)
    .limit(limit);
  return {
    courses: courses,
    totalPages: Math.ceil(totalCourses / limit),
    totalCourses: totalCourses,
  };
};

// Servicio para buscar cursos en UTN
exports.searchUTNCoursesService = async (searchQuery) => {
  return await utnCourse.find({
    title: { $regex: new RegExp(searchQuery, "i") },
  });
};
