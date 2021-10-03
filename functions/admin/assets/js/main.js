document.addEventListener("DOMContentLoaded", function () {
  var activateButton = document.querySelector(".kmt-active-plugin");
  if (activateButton) {
    activateButton.addEventListener("click", function (event) {
      "use strict";
      event.preventDefault();

      var kemet_active_plugin = event.target,
        status = kemet_active_plugin.getAttribute("data-status");

      const doAction = async (action) => {
        kemet_active_plugin.setAttribute(
          "style",
          "color:#444; background-color: #e5e5e5; border-color: #444;"
        );
        const text = action === 'kemet-install-plugin' ? 'Installing..' : 'Activating..'
        kemet_active_plugin.innerHTML =
          '<span class="dashicons dashicons-update"></span> ' + text;
        const body = new FormData()
        body.append('action', action)
        body.append('nonce', KemetNoteData.plugin_manager_nonce)
        body.append('path', KemetNoteData.path)
        body.append('slug', KemetNoteData.slug)

        try {
          const response = await fetch(KemetNoteData.ajax_url, {
            method: 'POST',
            body,
          })

          if (response.status === 200) {
            const { success } = await response.json()

            if (success && action === 'kemet-activate-plugin') {
              location.replace("admin.php?page=kemet_panel");
            }
          }
        } catch (e) {
          alert(e);
        }
      }

      if (status == "activate") {
        doAction('kemet-activate-plugin')
      } else if (status == "install") {
        async function installAndActivate() {
          await doAction('kemet-install-plugin')
          await doAction('kemet-activate-plugin')
        }
        installAndActivate();
      }
    });
  }
});
