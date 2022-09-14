"use strict";

// //                  Show Courses           // //

let tbody = document.getElementsByTagName("tbody")[0];
let table = document.getElementsByTagName("table")[0];

function show_courses() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "course_display.php", true);

    xhr.responseType = "json";
    // xhr.onprogress = () => console.log("Progressing...");

    xhr.onload = function () {

        let res = xhr.response;
        if (res == null)
            res = "";

        if (xhr.status == 200) {
            for (let i = 0; i < res.length; i++) {

                tbody.innerHTML += `<tr> 
                <td> ${i + 1} </td> 
                <td> ${res[i].id} </td> 
                <td> ${res[i].name} </td> 
                <td> ${res[i].author} </td> 
                <td> ${res[i].date} </td> 
                <td> 
                    <i class="fa-solid fa-pen-to-square fs-5" role="button" id="${res[i].id}" onclick="updateThis(this.id)" data-bs-toggle="modal" data-bs-target="#updateCourse"></i>
                    <i class="fa-solid fa-trash-arrow-up fs-5 text-danger ms-3" role="button" id="${res[i].id}" onclick="deleteThis(this.id)"></i>
                    </td>                 
                </tr>`;

            }
        }

    }
    xhr.send();
}
show_courses();






// //                  Add New Courses          // //


// Constants of form fields
const btn = document.getElementById("add_btn");
const naming = document.getElementById("name");
const author = document.getElementById("author");
const duration = document.getElementById("duration");
const o_price = document.getElementById("o_price");
const s_price = document.getElementById("s_price");
const des = document.getElementById("description");
// const img = document.getElementById("course_image");

// Other constants of form
const alert = document.getElementById("form_alert");
const form = document.getElementsByTagName("form")[0];



// Contants Related to this file
const url = "course_insert.php";

btn.addEventListener("click", () => {

    if (naming.value == "" || author.value == "" || duration.value == "" || o_price.value == "" || s_price.value == "" || des.value == "") {

        alert.innerHTML = "<p class='text-danger ms-4 mt-3'> Please fill data in <u> all fields </u> </p>";

    }
    else {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);

        xhr.responseType = "text";
        xhr.setRequestHeader("Content-Type", "multipart/form-data");

        // xhr.onprogress = () => console.log("Progressing...");
        xhr.onload = () => {
            // console.log(xhr.response);
            if (xhr.response && xhr.status == 200) {
                alert.innerHTML = "<p class='text-success ms-4 mt-3'> Course Added, Successfully! </p>";
                alert.previousElementSibling.innerText = "Add Another Course";

                form.reset();
                tbody.innerHTML = "";
                show_courses();
            }
            else
                alert.innerHTML = "<p class='text-danger ms-4 mt-3'> There is an error. </p>";
        }

        // let form_data = new FormData();
        // form_data.append("file", img);
        // form_data.append("filename", img.value);


        const data = JSON.stringify({
            naming: naming.value,
            author: author.value,
            duration: duration.value,
            o_price: o_price.value,
            s_price: s_price.value,
            des: des.value,
            // img: form_data
        });
        xhr.send(data);


    } //Else Body Ends here

}); //Event Listener ends here






// //                  Delete Courses           // // 

function deleteThis(d_id) {

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "course_delete.php", true);

    xhr.responseType = "text";
    xhr.setRequestHeader("content-type", "application/json");

    // xhr.onprogress = () => console.log("progress...");

    xhr.onload = () => {
        if (xhr.status == 200) {
            // console.log(xhr.response);
            // console.log(xhr.response ? "deleted" : "not deleted");
            tbody.innerHTML = "";
            show_courses();
        }
    }

    const data = JSON.stringify({
        id: d_id
    });

    let confirm_return = confirm(`Are you sure you want to delete the course (${d_id}) ?`);
    if (confirm_return)
        xhr.send(data);

}






// //               Update Courses           // //


// // Constants of form fields
const update_btn = document.getElementById("update_btn");
const naming2 = document.getElementById("name2");
const author2 = document.getElementById("author2");
const duration2 = document.getElementById("duration2");
const o_price2 = document.getElementById("o_price2");
const s_price2 = document.getElementById("s_price2");
const des2 = document.getElementById("description2");
// const img = document.getElementById("course_image");

// Other constants of form
const alert2 = document.getElementById("form_alert2");
const form2 = document.getElementsByTagName("form")[1];



// EventListener when click on the UPDATE button to update course.

var id_of_course; //this variable is to store id of the course and we will use to update course when click on the update button of form
function updateThis(update_id) {

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "course_updateThis_value.php", true);

    xhr.responseType = "json";
    xhr.setRequestHeader("Content-Type", "application/json");

    // xhr.onprogress = ()=> console.log("Progressing...");
    xhr.onload = () => {
        // console.log(xhr.response);
        const res = xhr.response;
        if (xhr.status == 200) {
            naming2.value = res[0].name;
            author2.value = res[0].author;
            duration2.value = res[0].duration;
            o_price2.value = res[0].o_price;
            s_price2.value = res[0].s_price;
            des2.value = res[0].description;
            alert2.previousElementSibling.innerHTML = `Update Course <strong> (${res[0].id}) </strong>`;
            id_of_course = res[0].id;
        }
    }

    const data = JSON.stringify({
        id: update_id
    })
    xhr.send(data);

}



// EventListener when SUBMIT UPDATE Form
update_btn.addEventListener("click", () => {

    if (naming2.value == "" || author2.value == "" || duration2.value == "" || o_price2.value == "" || s_price2.value == "" || des2.value == "") {

        alert2.innerHTML = "<p class='text-danger ms-4 mt-3'> Please fill data in <u> all fields </u> </p>";

    }
    else {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "course_update.php", true);

        xhr.responseType = "text";
        xhr.setRequestHeader("Content-Type", "multipart/form-data");

        // xhr.onprogress = () => console.log("Progressing...");
        xhr.onload = () => {
            // console.log(xhr.response);
            if (xhr.response && xhr.status == 200) {
                alert2.innerHTML = "<p class='text-success ms-4 mt-3'> Course updated, Successfully! </p>";

                tbody.innerHTML = "";
                show_courses();
            }
            else
                alert2.innerHTML = "<p class='text-danger ms-5 mt-3'> There is an error. </p>";
        }

        const data2 = JSON.stringify({
            id: id_of_course,
            naming: naming2.value,
            author: author2.value,
            duration: duration2.value,
            o_price: o_price2.value,
            s_price: s_price2.value,
            des: des2.value,
            // img: form_data
        });
        xhr.send(data2);

    } //Else Body Ends here

}); //Event Listener ends here



// When we will close the Update Modal then it's value will become to the default value
function update_value_close_btn() {
    alert2.innerHTML = "<p class='text-primary ms-5 mt-3'> Update values below </p>";
}