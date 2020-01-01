function active_plugin(event) {
     
    "use strict";

    event.preventDefault();

    var active_kemet_addons = document.getElementById('active-kemet-addons'),
        url = active_kemet_addons.getAttribute("href");
    
    let xhr = new XMLHttpRequest();

    // request state change event
    xhr.onreadystatechange = function () {

        // request completed?
        if (xhr.readyState !== 4) return;

        if (xhr.status === 200) {
            location.replace("admin.php?page=kmt-framework");
        }
        else {
            // request error
            console.log('HTTP error', xhr.status, xhr.statusText);
        }
    };
    xhr.open("GET", url, true);
    xhr.send();
}

