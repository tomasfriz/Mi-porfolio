// scripts/combineCourses.js
const mongoose = require("mongoose");
const UdemyCourse = require("../models/udemy.models");
const UtnCourse = require("../models/utn.models");
const UnifiedCourse = require("../models/unifiedCourse.model");

mongoose.connect("mongodb://localhost:27017/cursosApp");

const combineCourses = async () => {
  // todos los cursos de Udemy y UTN
  const udemyCourses = await UdemyCourse.find({});
  const utnCourses = await UtnCourse.find({});

  // Combinar los cursos de Udemy
  for (const course of udemyCourses) {
    const imageUrl = course.image_240x135 || course.image_480x270;

    const unifiedCourse = new UnifiedCourse({
      title: course.title,
      description: course.headline,
      price: course.is_paid ? course.price : "Gratis",
      originalId: course._id.toString(),
      image: imageUrl,
      link: course.url,
      source: "UDEMY",
      // ... otros campos
    });
    await unifiedCourse.save();
  }
  // Combinar los cursos de UTN
  for (const course of utnCourses) {
    const unifiedCourse = new UnifiedCourse({
      title: course.title,
      description:
        course.summary ||
        "Este curso de la UTN no tiene descripción disponible.",
      price: course.price,
      originalId: course._id.toString(),
      image: course.imgUrl,
      link: course.link,
      source: "UTN",
    });
    await unifiedCourse.save();
  }
  console.log(
    "Todos los cursos han sido combinados en la colección cursos_ALL"
  );
};

combineCourses().then(() => {
  console.log("Combinación completada");
  mongoose.disconnect();
});
