 $(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
        maxChunkSize: maxChunkSize,
        dropZone: $('#dropzone'),
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo(document.body);
            });
        }
    });
});
$(document).bind('drop dragover', function (e) {
    e.preventDefault();
});
$(document).bind('dragover', function (e) {
   var dropZone = $('#dropzone'),
       timeout = window.dropZoneTimeout;
   if (timeout) {
       clearTimeout(timeout);
   } else {
       dropZone.addClass('in');
   }
   var hoveredDropZone = $(e.target).closest(dropZone);
   dropZone.toggleClass('hover', hoveredDropZone.length);
   window.dropZoneTimeout = setTimeout(function () {
       window.dropZoneTimeout = null;
       dropZone.removeClass('in hover');
   }, 100);

});
