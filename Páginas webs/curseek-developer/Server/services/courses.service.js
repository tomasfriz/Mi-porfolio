//courses.services
const UTNCourse = require("../models/utn.models.js"); // Modelo para los cursos UTN
const UdemyCourse = require("../models/udemy.models"); // Modelo para los cursos Udemy

// Función auxiliar para buscar en ambos modelos y combinar los resultados
async function searchAndCombineCourses(query, page, limit) {
  // Busca y cuenta los cursos de UTN
  const [utnCourses, totalUTNCourses] = await Promise.all([
    UTNCourse.find(query)
      .skip((page - 1) * limit)
      .limit(limit),
    UTNCourse.countDocuments(query),
  ]);
  // Busca y cuenta los cursos de Udemy
  const [udemyCourses, totalUdemyCourses] = await Promise.all([
    UdemyCourse.find(query)
      .skip((page - 1) * limit)
      .limit(limit),
    UdemyCourse.countDocuments(query),
  ]);
  // Combina los cursos
  let combinedCourses = utnCourses.concat(udemyCourses);
  // Retorna los cursos combinados y los totales
  return {
    combinedCourses,
    totalCourses: totalUTNCourses + totalUdemyCourses,
  };
}

exports.getAllCoursesService = async (
  category,
  page = 1,
  limit = 10,
  filterType
) => {
  let query = {};
  if (category) {
    query.category = category;
  }

  const { combinedCourses, totalCourses } = await searchAndCombineCourses(
    query,
    page,
    limit
  );

  // Mover la lógica de los filtros aquí
  if (filterType) {
    switch (filterType) {
      case "priceAsc":
        combinedCourses.sort(
          (a, b) =>
            parseFloat(a.price.replace(/\D/g, "")) -
            parseFloat(b.price.replace(/\D/g, ""))
        );
        break;
      case "priceDesc":
        combinedCourses.sort(
          (a, b) =>
            parseFloat(b.price.replace(/\D/g, "")) -
            parseFloat(a.price.replace(/\D/g, ""))
        );
        break;
      case "dateDesc":
        combinedCourses.sort(
          (a, b) => new Date(b.startDate) - new Date(a.startDate)
        );
        break;
      default:
        throw new Error(`Invalid filterType provided: ${filterType}`);
    }
  }
  return {
    courses: combinedCourses,
    totalPages: Math.ceil(totalCourses / limit),
    totalCourses: totalCourses,
  };
};

exports.searchCoursesService = async (searchQuery) => {
  let regex = new RegExp(searchQuery, "i");
  let utnSearch = UTNCourse.find({ title: regex });
  let udemySearch = UdemyCourse.find({ title: regex });
  // Ejecuta ambas búsquedas de manera concurrente
  let [utnCourses, udemyCourses] = await Promise.all([utnSearch, udemySearch]);
  // Combina los resultados de ambas búsquedas
  let combinedCourses = utnCourses.concat(udemyCourses);
  return combinedCourses;
};
