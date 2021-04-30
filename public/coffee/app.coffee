$(document).ready ->
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#create').click ->
        $.post '/todo/create',
            content: $('#content').val()
            (data) -> window.location.replace("/todo");
    $('.delete-task').click ->
        conf = {
            title: 'Удалить задачу?',
            showCancelButton: true,
            confirmButtonText: 'Да!',
            cancelButtonText: 'Нет'
        }
        id = $(this).data('id')
        Swal.fire(conf).then (result) ->
            if result.isConfirmed
                $.get '/todo/delete/' + id,
                    (data) -> window.location.replace("/todo");

