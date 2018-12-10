"use strict";

$(document).ready(function () {
  $('form').submit(function (event) {
    var json;
    console.log(new FormData(this));
    event.preventDefault();
    $.ajax({
      type: $(this).attr('method'),
      url: $(this).attr('action'),
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function success(result) {
        json = jQuery.parseJSON(result);

        if (json.url) {
          window.location.href = '/' + json.url;
        } else {
          console.log(json.status + ' ' + json.message);
        }
      }
    });
  });
});