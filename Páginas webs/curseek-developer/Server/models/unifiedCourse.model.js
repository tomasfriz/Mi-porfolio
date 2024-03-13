// models/unifiedCourse.model.js
const mongoose = require("mongoose");

const UnifiedCourseSchema = new mongoose.Schema({
  title: {
    type: String,
    required: true,
  },
  description: {
    type: String,
    required: false,
  },
  price: {
    type: String,
    required: false,
  },
  originalId: {
    type: String,
    required: true,
  },
  image: {
    type: String,
    required: [false, "Una imagen no es necesaria para todos los cursos."],
  },
  link: {
    type: String,
    required: true,
  },
  source: {
    type: String,
    required: true,
  },
});

const UnifiedCourse = mongoose.model(
  "UnifiedCourse",
  UnifiedCourseSchema,
  "cursos_ALL"
);
UnifiedCourseSchema.index({
  title: "text",
  summary: "text",
  description: "text",
});

module.exports = UnifiedCourse;
