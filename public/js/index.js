document.getElementById('menuToggle').addEventListener('click', function () {
    const menu = document.getElementById('menu');
    if (menu.classList.contains('hidden')) {
        menu.classList.remove('hidden');
    } else {
        menu.classList.add('hidden');
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.querySelector('.morinv-toggle');
    const collapsible = document.getElementById('morinvas-collapsible');

    toggleButton.addEventListener('click', function (event) {
        event.preventDefault();
        collapsible.classList.toggle('hidden');
    });
});

function sanitizeInput(inputElement) {
    const inputValue = inputElement.value;
    const sanitizedValue = inputValue.replace(/[^\w\s*'-]/g, ''); // Permitir letras, números, espacios, *, - y '
    inputElement.value = sanitizedValue;
}



function playAudio(id) {
    var audio = document.getElementById('player' + id);
    if (audio.paused) {
        audio.play();
    } else {
        audio.pause();
        audio.currentTime = 0;
    }
}


function realizarBusquedaTseltal() {
    var query = $('#lx').val();
    var _token = $('input[name="_token"]').val();
    var url = $('#lx').data('url');

    $.ajax({
        url: url,
        method: "POST",
        data: {
            query: query,
            _token: _token
        },
        success: function (data) {
            $('#lxList').fadeIn();
            $('#lxList').html(data);
        }
    });
}
$(document).ready(function () {

    $('#botonBusquedaTseltal').click(function () {
        realizarBusquedaTseltal();
    });

    $('#lx').keyup(function (e) {
        var query = $(this).val();
        if (e.keyCode === 13) {
            var _token = $('input[name="_token"]').val();
            var url = $(this).data('url');

            $.ajax({
                url: url,
                method: "POST",
                data: {
                    query: query,
                    _token: _token
                },
                success: function (data) {
                    $('#lxList').fadeIn();
                    $('#lxList').html(data);
                }
            });
        } else {
            $('#lxList').fadeOut();
        }
    });
});


function realizarBusquedaSpaniol() {
    var query = $('#min').val();
    var _token = $('input[name="_token"]').val();
    var url = $('#min').data('url');

    $.ajax({
        url: url,
        method: "POST",
        data: {
            query: query,
            _token: _token
        },
        success: function (data) {
            $('#minList').fadeIn();
            $('#minList').html(data);
        }
    });
}
$(document).ready(function () {

    $('#botonBusquedaSpaniol').click(function () {
        realizarBusquedaSpaniol();
    });

    $('#min').keyup(function (e) {
        var query = $(this).val();
        if (e.keyCode === 13) {
            var _token = $('input[name="_token"]').val();
            var url = $(this).data('url');

            $.ajax({
                url: url,
                method: "POST",
                data: {
                    query: query,
                    _token: _token
                },
                success: function (data) {
                    $('#minList').fadeIn();
                    $('#minList').html(data);
                }
            });
        } else {
            $('#minList').fadeOut();
        }
    });
});


$(document).ready(function () {
    $(".citar-button").click(function () {
        $("#myModal").removeClass("hidden");
    });

    $("#cerrarModal").click(function () {
        $("#myModal").addClass("hidden");
    });

    $(".modal").click(function () {
        $("#myModal").addClass("hidden");
    });

    $(".modal-content").click(function (e) {
        e.stopPropagation();
    });
});

// ABRIR MODAL DE REFERENCIAS.
var modalTriggers = document.querySelectorAll('[data-toggle="modal"]');

modalTriggers.forEach(function (trigger) {
    trigger.addEventListener('click', function (event) {
        event.preventDefault();
        var targetModalId = this.getAttribute('data-target').substring(1);
        var modal = document.getElementById(targetModalId);
        modal.classList.remove('hidden');
    });
});

var closeButtons = document.querySelectorAll('.modal [data-dismiss="modal"]');

closeButtons.forEach(function (button) {
    button.addEventListener('click', function () {
        var modal = this.closest('.modal');
        modal.classList.add('hidden');
    });
});


