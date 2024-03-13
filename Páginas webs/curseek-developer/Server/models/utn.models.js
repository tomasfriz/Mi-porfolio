const mongoose = require("mongoose");

const CourseSchema = new mongoose.Schema({
  title: String,
  startDate: String,
  duration: String,
  price: String,
  modalities: [String],
  teachers: String,
  summary: String,
  link: String,
  imgUrl: String,
  category: String,
});

const utnCourse = mongoose.model("course", CourseSchema, "cursos_UTN");

module.exports = utnCourse;
