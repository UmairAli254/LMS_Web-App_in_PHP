"use strict";

// Constants
const btn = document.getElementById("adminLoginBtn");
const email = document.getElementById("email");
const pass = document.getElementById("pass");
const notMatched = document.getElementById("notMatched");

const url = "admin-confimatoin.php";


// Event Listener When Click On The Button :)
btn.addEventListener("click", (e) => {

    e.preventDefault();

    let umairPost = {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            email: email.value,
            pass: pass.value
        })
    }

    let request = async function () {
        let res = await fetch(url, umairPost);
        let data = await res.text();

        if (data === "1") {
            notMatched.innerText = "Login Successfull!";
            notMatched.style.color = "Green";
            location.href = "dashboard.php";
        }
        else {
            notMatched.innerText = "Email and Password didn't matched!";
            notMatched.style.color = "red";
        }
    }
    request();

});