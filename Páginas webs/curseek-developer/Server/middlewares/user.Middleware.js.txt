const UdemyCourse = require('../models/udemy.models');
const UTNCourse = require('../models/utn.models');

const determineCourseType = async (courseId) => {
    console.log("Determinando tipo de curso para el ID:", courseId);
    const isUdemyCourse = await UdemyCourse.findById(courseId);
    if (isUdemyCourse) {
        return 'UDEMY';
    }

    const isUTNCourse = await UTNCourse.findById(courseId);
    if (isUTNCourse) {
        return 'UTN';
    }

    throw new Error('Tipo de curso no identificado');
};

const userPreSaveMiddleware = async function(next) {
    console.log("Ejecutando middleware pre-save para User");

    try {
        // Espera a que todas las promesas en el array se resuelvan
        await Promise.all(this.favorites.map(async (favorite) => {
            if (!favorite.courseType) {
                favorite.courseType = await determineCourseType(favorite.courseId);
            }
        }));
        next();
    } catch (error) {
        console.error("Error en middleware pre-save:", error);
        next(error);
    }
};

module.exports = {
    userPreSaveMiddleware
};
