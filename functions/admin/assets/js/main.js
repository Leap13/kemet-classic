function active_plugin(event) {
     
    "use strict";

    event.preventDefault();

    var active_kemet_addons = document.getElementById('active-kemet-addons'),
        status = active_kemet_addons.getAttribute("data-status"),
        activate_url = active_kemet_addons.getAttribute("data-url-activate"),
        install_url = active_kemet_addons.getAttribute("data-url-install");
    if(status == 'activate'){
        activate(activate_url);
    }else{
        install_and_activate(install_url);
    }
    function activate(url){
        let xhr = new XMLHttpRequest();

        // request state change event
        xhr.onreadystatechange = function () {

            active_kemet_addons.setAttribute("style", "color:#444; background-color: #e5e5e5; border-color: #444;");
            active_kemet_addons.innerHTML = '<span class="dashicons dashicons-update"></span> Activating..';
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
    
    function install_and_activate(url) {
        let xhr = new XMLHttpRequest();

        // request state change event
        xhr.onreadystatechange = function () {
            active_kemet_addons.setAttribute("style", "color:#444; background-color: #e5e5e5; border-color: #444;");
            active_kemet_addons.innerHTML = '<span class="dashicons dashicons-update"></span> Installing..';
            // request completed?
            if (xhr.readyState !== 4) return;

            if (xhr.status === 200) {
                activate(activate_url);
            }
            else {
                // request error
                console.log('HTTP error', xhr.status, xhr.statusText);
            }
        };
        xhr.open("GET", url, true);
        xhr.send();
    }
    
}
