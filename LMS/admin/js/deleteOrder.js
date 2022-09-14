"use strict";

function deletethis(id) {

    const xhr = new XMLHttpRequest();
    xhr.open("GET", `delete-sold-course.php?id=${id}`, true);

    xhr.onprogress = () => console.log("Progressing...");
    xhr.responseType = "text";

    xhr.onload = () => {
        if (xhr.status === 200) {
            location.href = "http://localhost/LMS/admin/sell-reports.php";
        }
    }
    const conf = confirm(`Are you sure you want to delete this course ${id}`);
    if (conf)
        xhr.send();

}