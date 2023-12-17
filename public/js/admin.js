const quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: [
            ['bold', 'italic', 'underline', 'strike'],
            ['link', 'image'],
            ['clean'],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'align': [] }]
        ]
    },
});


document.addEventListener("DOMContentLoaded", function () {
    const toastSuccess = document.getElementById('toast-success');
    if (toastSuccess) {
        setTimeout(function () {
            toastSuccess.classList.remove("translate-x-full");
        }, 100);
        setTimeout(function () {
            toastSuccess.classList.add("opacity-0");
        }, 5000);
    }
});

// GUARDAR ANTECEDENTES
const guardarBtn = document.getElementById('guardar');
const contenidoHiddenInput = document.getElementById('contenido-hidden');
const formulario = document.getElementById('formulario');

guardarBtn.addEventListener('click', () => {
    const contenido = quill.root.innerHTML;
    contenidoHiddenInput.value = contenido;
    formulario.submit();
});
