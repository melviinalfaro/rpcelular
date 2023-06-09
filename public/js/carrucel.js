const form = document.querySelector("#carrucelForm");

const nombreInput = document.querySelector("#nombre-input");
const invalidNombreFeedback = document.querySelector(
    ".invalid-feedback-nombre"
);
const fileInput = document.querySelector("#file-upload-input");
const invalidfileFeedback = document.querySelector(".invalid-feedback-file");

nombreInput.addEventListener("input", () => {
    nombreInput.classList.remove("is-invalid");
    invalidNombreFeedback.style.display = "none";
});

fileInput.addEventListener("change", () => {
    const fileName = fileInput.files[0]?.name;
    const uploadName = document.querySelector(".file-upload-name");
    uploadName.textContent = fileName;
    fileInput.classList.remove("is-invalid");
    invalidfileFeedback.style.display = "none";
});

const modal = document.querySelector("#subirModal");

modal.addEventListener("hidden.bs.modal", function () {
    form.reset();
    nombreInput.classList.remove("is-invalid");
    invalidNombreFeedback.style.display = "none";
    fileInput.classList.remove("is-invalid");
    invalidfileFeedback.style.display = "none";
});

form.addEventListener("submit", function (event) {
    const button = document.querySelector("button[id='subir']");

    if (!nombreInput.value) {
        event.preventDefault();
        nombreInput.classList.add("is-invalid");
        invalidNombreFeedback.style.display = "block";
    } else if (!fileInput.files || fileInput.files.length === 0) {
        event.preventDefault();
        fileInput.classList.add("is-invalid");
        invalidfileFeedback.style.display = "block";
    } else {
        if (!form.checkValidity()) {
            alert("Por favor complete todos los campos requeridos");
        } else {
            button.innerHTML = "Cargando...";
            button.classList.add("disabled");
            form.submit();
        }
    }
});
