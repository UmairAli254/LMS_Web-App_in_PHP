"use strict";

// // ADD lessons
// const add_name = document.getElementById("name");
// const desc = document.getElementById("description");
// const lesson_video = document.getElementById("lesson_video");
// const add_btn = document.getElementById("add_btn");







// Foe deleting the lesson form the database
function deleteThis(id) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "lesson_delete.php", true);
    xhr.onprogress = () => console.log("Progressing...");

    xhr.responseType = "text";
    xhr.setRequestHeader("content-type", "application/json");

    xhr.onload = function () {
        if (xhr.status == 200) {
            // alert("It's deleted");
            location.reload();
            console.log("It has been deleted successfully!");
        }
    }

    const data = JSON.stringify({
        id: id
    });
    let conf = confirm(`Are you sure you want to delete the lesson (${id}) ?`);
    if (conf)
        xhr.send(data);
}





// For Updating the form

// Get the lesson details to update the lesson and show them in the update lesson form.]
const opt = document.getElementById("option");
const ucl = document.getElementById("updateCourseLabel");
const scl = document.getElementById("select_course_label");
const naming = document.getElementById("updateName");
const desc = document.getElementById("updateDescription");
const old_img = document.getElementById("showOldImg_in_update_form");
const old_vid = document.getElementById("showOldVideo_in_update_form");
const optionLessonID = document.getElementById("optionLessonID");


function updateThis(id) {
    const data = {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            id: id
        })
    }
    fetch("lesson_update.php", data).then(res => res.json()).then(data => {
        console.log(data);
        opt.innerText = `${data.c_name}`;
        optionLessonID.innerText = data.id;
        scl.innerText = `Selected Course (${data.c_id})`;
        naming.value = data.name;
        desc.value = data.description;
        if (data.link.includes(".mp4")) {
            old_img.style.display = "none";
            old_vid.style.display = "block";
            old_vid.innerText = data.link;
        }
        else {
            old_vid.style.display = "none";
            old_img.style.display = "block";
            old_img.setAttribute("src", data.link);
        }

    }).catch(err => console.log(err));
}