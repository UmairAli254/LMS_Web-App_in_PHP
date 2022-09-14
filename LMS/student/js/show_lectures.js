"use strict";

const li = document.getElementsByClassName("lecture-li");
const vid = document.getElementById("video");

li[0].click(); // It will click on the first <li> when page reloads so we can show first video when someone come to the page.


function fun(id) {

    const xhr = new XMLHttpRequest();
    xhr.open("GET", `display_lecture.php?id=${id}`, true);

    xhr.onprogress = () => console.log("Progressing...");
    xhr.responseType = "json";

    xhr.onload = () => {
        if (xhr.status === 200) {

            let res = xhr.response;
            console.log(res);
            console.log(id);


            vid.innerHTML = ` <video width="420" height="240" controls>
            <source src='../admin/${res[0].link}' type='video/mp4'id='show_lecture'></source>
           
        </video>`;

        }
        else
            console.log("An Erro is occurred!");
    }

    xhr.send();

}











// vid.innerHTML = `<source src='../admin/lessons_vid/lec1.mp4' type='video/mp4'id='show_lecture'>`;