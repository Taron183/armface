$(function() {
  
    function customUploadButton() {
        $('.js-button-file-upload-input').on('change', function () {
            var val = $(this).val().split(/(\\|\/)/g).pop();
            if (val !== "") {
                $(".js-button-file-upload-text")
                    .text(val)
                    .parent()
                    .removeClass("not-selected");
            } else {
                $(".js-button-file-upload-text")
                    .text('')
                    .parent()
                    .addClass("not-selected");
            }
        });
    }
  
    customUploadButton();
  
});