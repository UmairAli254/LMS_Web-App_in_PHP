"use strict";

async function deleteThis(id) {
    const data = {
        method: "POST",
        header: { "Content-Type": "application/json" },
        body: JSON.stringify({
            id: id
        })
    }
    const conf = confirm(`Are you sure you want to delete this feedback from (${id})`);
    if (conf)
        await fetch("feedback-delete.php", data);

    location.href = "http://localhost/LMS/admin/feedback.php";
}