"use strict";

// //                  Show Students           // //

let tbody = document.getElementsByTagName("tbody")[0];
let table = document.getElementsByTagName("table")[0];

function show_students() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "student_display.php", true);

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
                <td> ${res[i].username} </td> 
                <td> ${res[i].email} </td> 
                <td> ${res[i].date} </td> 
                <td> 
                   <i class="fa-solid fa-pen-to-square fs-5" role="button" id="${res[i].id}" onclick="updateThis(this.id)" data-bs-toggle="modal" data-bs-target="#updateCourse"></i>
                    <i class="fa-solid fa-trash-arrow-up fs-5 ms-3 text-danger" role="button" id="${res[i].id}" onclick="deleteThis(this.id)"></i>
                    </td>                 
                </tr>`;

            }
        }

    }
    xhr.send();
}
show_students();






// //                  Add New Student          // //


// Constants of form fields
const btn = document.getElementById("add_btn");
const username = document.getElementById("username");
const email = document.getElementById("email");
const pass = document.getElementById("password");
const conf_pass = document.getElementById("conf_pass");


// Other constants of form
const alert = document.getElementById("form_alert");
const form = document.getElementsByTagName("form")[0];


// Contants Related to this file
const url = "student_insert.php";

btn.addEventListener("click", () => {

    if (username.value == "" || email.value == "" || pass.value == "" || conf_pass.value == "") {

        alert.innerHTML = "<p class='text-danger ms-4 mt-3'> Fill <u> all fields </u> </p>";

    }
    else {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);

        xhr.responseType = "text";
        xhr.setRequestHeader("Content-Type", "json");

        // xhr.onprogress = () => console.log("Progressing...");
        xhr.onload = () => {
            // console.log(xhr.response);
            if (xhr.response && xhr.status == 200) {
                alert.innerHTML = "<p class='text-success ms-3 mt-3'> Student Added, Successfully! </p>";
                alert.previousElementSibling.innerHTML = "Add Another Student";

                form.reset();
                tbody.innerHTML = "";
                show_students();
            }
            else
                alert.innerHTML = "<p class='text-danger ms-4 mt-3'> There is an error. </p>";
        }

        // let form_data = new FormData();
        // form_data.append("file", img);
        // form_data.append("filename", img.value);


        const data = JSON.stringify({
            username: username.value,
            email: email.value,
            pass: pass.value,
            conf_pass: conf_pass.value,
        });
        xhr.send(data);


    } //Else Body Ends here

}); //Event Listener ends here

// Disable the submit button if all or one field(s) are empty.
if (username.value === "" || email.value === "" || pass.value === "" || conf_pass.value === "")
    btn.setAttribute("disabled", "disabled");
else
    btn.removeAttribute("disabled");



// Check if password doesn't match
conf_pass.addEventListener("input", () => {

    if (pass.value !== "") {
        if (pass.value !== conf_pass.value) {
            alert.innerHTML = "<p class='text-danger ms-3 mt-3'> Password doesn't match. </p>";
            // alert.classList.remove("text-success");
            // alert.classList.add("text-danger");
            btn.setAttribute("disabled", "disabled");
        }
        else {
            alert.innerHTML = "<p class='text-success ms-3 mt-3'> Password match! </p>";
            // alert.classList.remove("text-danger");
            // alert.classList.add("text-success");
            btn.removeAttribute("disabled");
        }

    }

});
pass.addEventListener("input", () => {
    // It will check if the conf_pass vlaue is not null
    if (conf_pass.value !== "") {

        if (pass.value !== conf_pass.value) {
            alert.innerHTML = "<p class='text-danger ms-3 mt-3'> Password doesn't match. </p>";
            // alert.classList.remove("text-success");
            // alert.classList.add("text-danger");
            btn.setAttribute("disabled", "disabled");
        }
        else {
            alert.innerHTML = "<p class='text-success ms-3 mt-3'> Password match! </p>";
            // alert.classList.remove("text-danger");
            // alert.classList.add("text-success");
            btn.removeAttribute("disabled");
        }

    }

});











// //                  Delete Student           // // 

function deleteThis(d_id) {

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "student_delete.php", true);

    xhr.responseType = "text";
    xhr.setRequestHeader("content-type", "application/json");

    // xhr.onprogress = () => console.log("progress...");

    xhr.onload = () => {
        if (xhr.status == 200) {
            // console.log(xhr.response);
            // console.log(xhr.response ? "deleted" : "not deleted");
            tbody.innerHTML = "";
            show_students();
        }
    }

    const data = JSON.stringify({
        id: d_id
    });

    let confirm_return = confirm(`Are you sure you want to delete the Student (${d_id}) ?`);
    if (confirm_return)
        xhr.send(data);

}






// //               Update Student           // //


// // Constants of form fields
const update_btn = document.getElementById("update_btn");
const username2 = document.getElementById("username2");
const email2 = document.getElementById("email2");
const pass2 = document.getElementById("password2");
const conf_pass2 = document.getElementById("conf_pass2");


// Other constants of form
const alert2 = document.getElementById("form_alert2");
const form2 = document.getElementsByTagName("form")[1];



// EventListener when click on the UPDATE button to update course.

var id_of_student; //this variable is to store id of the course and we will use to update course when click on the update button of form
function updateThis(update_id) {

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "student_updateThis_value.php", true);

    xhr.responseType = "json";
    xhr.setRequestHeader("Content-Type", "application/json");

    // xhr.onprogress = ()=> console.log("Progressing...");
    xhr.onload = () => {
        console.log(xhr.response);
        const res = xhr.response;
        if (xhr.status == 200) {
            username2.value = res[0].username;
            email2.value = res[0].email;
            // pass2.value = res[0].duration;
            // conf_pass2.value = res[0].o_price;

            alert2.previousElementSibling.innerHTML = `Update Student <strong> (${res[0].id}) </strong> Details`;
            id_of_student = res[0].id;
        }
    }

    const data = JSON.stringify({
        id: update_id
    })
    xhr.send(data);

}



// EventListener when SUBMIT UPDATE Form
update_btn.addEventListener("click", () => {

    if (username2.value == "" || email2.value == "" || pass2.value == "" || conf_pass2.value == "") {

        alert2.innerHTML = "<p class='text-danger ms-3 mt-3'> Fill <u> all fields </u> </p>";

    }
    else {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "student_update.php", true);

        xhr.responseType = "text";
        xhr.setRequestHeader("Content-Type", "application/json");

        // xhr.onprogress = () => console.log("Progressing...");
        xhr.onload = () => {
            console.log(xhr.response);
            if (xhr.status == 200) {
                alert2.innerHTML = "<p class='text-success ms-3 mt-3'>Updated, Successfully! </p>";

                tbody.innerHTML = "";
                show_students();
            }
            else
                alert2.innerHTML = "<p class='text-danger ms-3 mt-3'> There is an error. </p>";
        }

        const data2 = JSON.stringify({
            id: id_of_student,
            username: username2.value,
            email: email2.value,
            pass: pass2.value,
            conf_pass: conf_pass2.value
        });
        xhr.send(data2);

    } //Else Body Ends here

}); //Event Listener ends here



// Disable the submit button if all or one field(s) are empty.
if (username2.value === "" || email2.value === "" || pass2.value === "" || conf_pass2.value === "")
update_btn.setAttribute("disabled", "disabled");
else
update_btn.removeAttribute("disabled");



// Check if password doesn't match
conf_pass2.addEventListener("input", () => {

    if (pass2.value !== "") {
        if (pass2.value !== conf_pass2.value) {
            alert2.innerHTML = "<p class='text-danger ms-3 mt-3'> Password doesn't match. </p>";
            // alert.classList.remove("text-success");
            // alert.classList.add("text-danger");
            update_btn.setAttribute("disabled", "disabled");
        }
        else {
            alert2.innerHTML = "<p class='text-success ms-3 mt-3'> Password match! </p>";
            // alert.classList.remove("text-danger");
            // alert.classList.add("text-success");
            update_btn.removeAttribute("disabled");
        }

    }

});
pass2.addEventListener("input", () => {
    // It will check if the conf_pass vlaue is not null
    if (conf_pass2.value !== "") {

        if (pass2.value !== conf_pass2.value) {
            alert2.innerHTML = "<p class='text-danger ms-3 mt-3'> Password doesn't match. </p>";
            // alert.classList.remove("text-success");
            // alert.classList.add("text-danger");
            update_btn.setAttribute("disabled", "disabled");
        }
        else {
            alert2.innerHTML = "<p class='text-success ms-3 mt-3'> Password match! </p>";
            // alert.classList.remove("text-danger");
            // alert.classList.add("text-success");
            update_btn.removeAttribute("disabled");
        }

    }

});




// When we will close the Update Modal then it's value will become to the default value
function update_value_close_btn() {
    alert2.innerHTML = "<p class='text-primary ms-3 mt-3'> Update values below </p>";
    form2.reset();
}


