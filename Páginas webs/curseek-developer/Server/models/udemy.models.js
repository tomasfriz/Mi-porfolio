const mongoose = require("mongoose");

const LocaleSchema = new mongoose.Schema({
  _class: String,
  locale: String,
  title: String,
  english_title: String,
  simple_english_title: String,
});

const InstructorSchema = new mongoose.Schema({
  title: String,
  name: String,
  display_name: String,
  job_title: String,
  image_50x50: String,
  image_100x100: String,
});

const UdemyCourseSchema = new mongoose.Schema({
  id: Number,
  title: String,
  url: String,
  is_paid: Boolean,
  price: String,
  instructors: [InstructorSchema],
  image_125_H: String,
  image_240x135: String,
  image_480x270: String,
  published_title: String,
  locale: LocaleSchema,
  headline: String,
  archive_time: Date,
  avg_rating: Number,
  completion_ratio: Number,
  created: Date,
  description: String,
  favorite_time: Date,
  num_lectures: Number,
  num_quizzes: Number,
  num_subscribers: Number,
  primary_category: {
    type: mongoose.Schema.Types.Mixed,
  },
  primary_subcategory: {
    type: mongoose.Schema.Types.Mixed,
  },
});

// Configura el nombre de la colección específicamente
module.exports = mongoose.model(
  "UdemyCourse",
  UdemyCourseSchema,
  "cursos_UDEMY"
);
