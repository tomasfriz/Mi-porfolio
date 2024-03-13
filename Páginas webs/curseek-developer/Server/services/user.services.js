const User = require("../models/user.models");
const UdemyCourse = require("../models/udemy.models");
const utnCourse = require("../models/utn.models");
const bcrypt = require("bcrypt");
const mongoose = require("mongoose");

const login = async (username, password) => {
  try {
    const user = await User.findOne({ username });
    if (!user) {
      throw new Error("Usuario no encontrado");
    }
    // Comparar la contraseña ingresada con el hash almacenado
    const isMatch = await bcrypt.compare(password, user.password);
    if (!isMatch) {
      throw new Error("Credenciales incorrectas");
    }
    return user;
  } catch (error) {
    throw new Error("Error al iniciar sesión.");
  }
};
const getUserById = async (userId) => {
  try {
    const user = await User.findById(userId);
    return user;
  } catch (error) {
    throw new Error("Error al obtener el usuario.");
  }
};
const getUserByUsername = async (username) => {
  try {
    const user = await User.findOne({ username });
    if (!user) {
      throw new Error("Usuario no encontrado");
    }
    return user;
  } catch (error) {
    throw new Error("Error al obtener el perfil del usuario.");
  }
};
const getAllUsers = async () => {
  try {
    const users = await User.find();
    return users;
  } catch (error) {
    throw new Error("Error al obtener los usuarios.");
  }
};
const addFavoriteToUser = async (userId, courseId, courseType) => {
  try {
    console.log(
      "userId:",
      userId,
      "courseId:",
      courseId,
      "courseType:",
      courseType
    );
    const user = await getUserById(userId);
    if (!user) {
      throw new Error("Usuario no encontrado");
    }
    user.favorites.push({ courseId, courseType });
    await user.save();
    return user;
  } catch (error) {
    throw new Error("Error al agregar a favoritos.");
  }
};
const removeFavoriteFromUser = async (userId, courseId) => {
  try {
    await User.findByIdAndUpdate(userId, {
      $pull: { favorites: { courseId } },
    });
  } catch (error) {
    throw new Error("Error al eliminar de favoritos.");
  }
};
const getFavoriteCoursesForUser = async (userId) => {
  try {
    const user = await getUserById(userId);
    if (!user) {
      throw new Error("Usuario no encontrado");
    }
    // Dividir favoritos por tipo
    const udemyFavorites = user.favorites
      .filter((f) => f.courseType === "UDEMY")
      .map((f) => f.courseId);
    const utnFavorites = user.favorites
      .filter((f) => f.courseType === "UTN")
      .map((f) => f.courseId);
    // Recuperar cursos de las respectivas colecciones
    const udemyCourses = udemyFavorites.length
      ? await UdemyCourse.find({ _id: { $in: udemyFavorites } })
      : [];
    const utnCourses = utnFavorites.length
      ? await utnCourse.find({ _id: { $in: utnFavorites } })
      : [];
    // Agrega el tipo de curso y retorna la lista combinada
    const udemyCoursesWithTypes = udemyCourses.map((course) => ({
      ...course.toObject(),
      courseType: "UDEMY",
    }));
    const utnCoursesWithTypes = utnCourses.map((course) => ({
      ...course.toObject(),
      courseType: "UTN",
    }));
    return [...udemyCoursesWithTypes, ...utnCoursesWithTypes];
  } catch (error) {
    throw new Error("Error al obtener cursos favoritos.");
  }
};
const getUserProfile = async (username) => {
  try {
    const user = await User.findOne({ username });
    if (!user) {
      throw new Error("Usuario no encontrado");
    }
    return user;
  } catch (error) {
    throw new Error("Error al obtener el perfil del usuario.");
  }
};
const register = async ({
  username,
  email,
  password,
  address,
  profilePicture,
}) => {
  try {
    // Crear hash de la contraseña
    const salt = await bcrypt.genSalt(10);
    const hashedPassword = await bcrypt.hash(password, salt);
    // Crear nuevo usuario
    const newUser = new User({
      username,
      email,
      password: hashedPassword,
      address,
      profilePicture,
    });
    // Guardar el usuario en la base de datos
    await newUser.save();
    return newUser;
  } catch (error) {
    throw new Error("Error al registrar el usuario.");
  }
};
const updateUserProfile = async (userId, updatedData) => {
  try {
    const user = await User.findById(userId);
    if (!user) {
      throw new Error("Usuario no encontrado");
    }
    // Si se proporciona una nueva contraseña, hashearla
    if (updatedData.password) {
      const salt = await bcrypt.genSalt(10);
      const hashedPassword = await bcrypt.hash(updatedData.password, salt);
      updatedData.password = hashedPassword;
    }
    // Actualizar los campos del usuario
    Object.assign(user, updatedData);
    // Guardar los cambios
    await user.save();
    return user;
  } catch (error) {
    throw new Error("Error al actualizar el perfil del usuario.");
  }
};
const checkIfCourseIsFavorited = async (userId, courseId) => {
  try {
    // Verificar que el courseId es válido para convertir a ObjectId
    if (!mongoose.Types.ObjectId.isValid(courseId)) {
      throw new Error("ID de curso inválido");
    }
    const objectId = new mongoose.Types.ObjectId(courseId);
    console.log("ObjectId convertido:", objectId); // Para ver el resultado de la conversión
    const user = await User.findById(userId);
    if (!user) {
      throw new Error("Usuario no encontrado");
    }
    const isFavorited = user.favorites.some((favorite) =>
      favorite.courseId.equals(objectId)
    );
    return isFavorited;
  } catch (error) {
    console.error("Error:", error);
    throw new Error("Error al verificar si el curso está en favoritos.");
  }
};

module.exports = {
  getUserById,
  addFavoriteToUser,
  removeFavoriteFromUser,
  getFavoriteCoursesForUser,
  getAllUsers,
  login,
  getUserProfile,
  getUserByUsername,
  register,
  updateUserProfile,
  checkIfCourseIsFavorited,
};
