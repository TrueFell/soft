/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/coffee/app.coffee ***!
  \*************************************/
$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#create').click(function() {
    return $.post('/todo/create', {
      content: $('#content').val()
    }, function(data) {
      return window.location.replace("/todo");
    });
  });
  return $('.delete-task').click(function() {
    var conf, id;
    conf = {
      title: 'Удалить задачу?',
      showCancelButton: true,
      confirmButtonText: 'Да!',
      cancelButtonText: 'Нет'
    };
    id = $(this).data('id');
    return Swal.fire(conf).then(function(result) {
      if (result.isConfirmed) {
        return $.get('/todo/delete/' + id, function(data) {
          return window.location.replace("/todo");
        });
      }
    });
  });
});

/******/ })()
;