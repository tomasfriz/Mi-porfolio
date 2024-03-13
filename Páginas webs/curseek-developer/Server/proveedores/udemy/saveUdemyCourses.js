// saveUdemyCourses.js
const axios = require("axios");
const UdemyCourse = require("../../models/udemy.models.js");

async function saveUdemyCourses() {
  try {
    const fields =
      "id,title,url,is_paid,price,visible_instructors,image_125_H,image_240x135,image_480x270,published_title,locale,headline,archive_time,avg_rating,completion_ratio,created,description,favorite_time,num_lectures,num_quizzes,num_subscribers,primary_category,primary_subcategory,status_label";
    const headers = {
      Accept: "application/json, text/plain, */*",
      Authorization:
        "Basic RVdZV1VZMDY4OWZJMmFSY0R2WkkxZUp3TTVWaTJOd08wWUpqTjNIczpEQTFRWmpYTllBZHZZc05nREtFS3JjdjRRTThTbkV4V0YyUXBaR2l0aUNXR0lRVEcxZGllNUxyUGhnaEVnTE9aSzFyek1wcTk0VlRsZFMwUWozSnV0ZXFoaFlXdFBXbHBETVRrMG9yenM2YXNIdEtqRnd6SHY2S0NYejRLbHQ2RA==",
      "Content-Type": "application/json",
    };
    let page = 1;
    let totalCoursesSaved = 0;
    const PAGE_SIZE = 50; // Use the maximum page size allowed by the API
    const MAX_COURSES = 10000;
    while (totalCoursesSaved < MAX_COURSES) {
      const response = await axios.get(
        `https://www.udemy.com/api-2.0/courses/?fields[course]=${fields}&page=${page}&page_size=${PAGE_SIZE}`,
        { headers }
      );
      const coursesData = response.data.results;
      if (coursesData.length === 0) {
        break;
      }
      for (const data of coursesData) {
        const course = {
          id: data.id,
          title: data.title,
          url: data.url,
          is_paid: data.is_paid,
          price: data.price,
          instructors: data.visible_instructors,
          image_125_H: data.image_125_H,
          image_240x135: data.image_240x135,
          image_480x270: data.image_480x270,
          published_title: data.published_title,
          locale: data.locale,
          headline: data.headline,
          archive_time: data.archive_time,
          avg_rating: data.avg_rating,
          completion_ratio: data.completion_ratio,
          created: data.created,
          description: data.description,
          favorite_time: data.favorite_time,
          num_lectures: data.num_lectures,
          num_quizzes: data.num_quizzes,
          num_subscribers: data.num_subscribers,
          primary_category: data.primary_category,
          primary_subcategory: data.primary_subcategory,
          status_label: data.status_label,
        };
        const existingCourse = await UdemyCourse.findOne({ id: course.id });
        if (!existingCourse) {
          await UdemyCourse.create(course);
          totalCoursesSaved++;
        }
        if (totalCoursesSaved >= MAX_COURSES) {
          break;
        }
      }
      page++;
    }
  } catch (error) {
    console.error("Error while fetching and saving courses:", error);
  }
}

module.exports = saveUdemyCourses;
