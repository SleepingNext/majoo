const form = document.getElementById("form")
const imageUpload = document.getElementById("image-upload");
const progressArea = document.getElementById("progress-area")

imageUpload.onchange = function ({target}) {
    const file = target.files[0];
    if (file) {
        uploadFile();
    }
}

function uploadFile() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", base_url + "/product/upload");
    xhr.upload.addEventListener("progress", ({loaded, total}) => {
        const fileLoaded = Math.floor((loaded / total) * 100);
        progressArea.innerHTML = `
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: ${fileLoaded}%;" aria-valuenow="${fileLoaded}" aria-valuemin="0" aria-valuemax="100">${fileLoaded}%</div>
            </div>
        `;
    })

    let formData = new FormData(form);
    xhr.send(formData);
}