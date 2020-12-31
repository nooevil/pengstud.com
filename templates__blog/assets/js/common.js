$(function (){

  $( ".buttons-block button:nth-child(1)" ).click(function() {
    var form_html = $(this).closest('form').html();

    var data = {
      // system
      whatdo: "checkListToPDF",
      form_html: form_html
    };

    function result(data){
        // 2 запрос
       $.ajax({
        url: data.full_link,
        type: "GET",
        dataType: 'binary',
        success: function(result) {
          var url = URL.createObjectURL(result);
          var $a = $('<a />', {
            'href': url,
            'download': data.file_name,
            'text': "click"
          }).hide().appendTo("body")[0].click();

          var data2 = {
            // system
            whatdo: "checkListToPDF__removeFile",
            full_path: data.full_path
          };
          //3 запрос
          wps__send_ajax_data(data2);

          setTimeout(function() {
            URL.revokeObjectURL(url);
          }, 1000);
        }
      });
    }

    // 1 запрос
    wps__send_ajax_data(data, result);
    return false;
  });

  $(".check-list input").click(function() {
  	if( $(this).hasClass("checked") ){
  		$(this).parent().find("input").removeClass("checked");
  	} else {
  		$(this).parent().find("input").addClass("checked");
  	}
  });

 
  /* wps__send_data */
  function wps__send_ajax_data( data, callback ){
    // add action
    data.action = "wps__ajax_action";
    // go request
    $.ajax({
      url: theme_ajax.url,
      type: "POST",
      data: data,
      dataType: "json",
      success: function(data) {
        if (callback) callback(data);
        console.log("WPS Ajax Success.");
      },
      error: function(data){
        console.log("WPS Ajax Error. Have Fun :)");
      }
    });
  }

});



/**
*
* jquery.binarytransport.js
*
* @description. jQuery ajax transport for making binary data type requests.
* @version 1.0 
* @author Henry Algus <henryalgus@gmail.com>
*
*/

// use this transport for "binary" data type
$.ajaxTransport("+binary", function(options, originalOptions, jqXHR){
  // check for conditions and support for blob / arraybuffer response type
  if (window.FormData && ((options.dataType && (options.dataType == 'binary')) || (options.data && ((window.ArrayBuffer && options.data instanceof ArrayBuffer) || (window.Blob && options.data instanceof Blob))))){
    return {
        // create new XMLHttpRequest
        send: function(_, callback){
// setup all variables
            var xhr = new XMLHttpRequest(),
                url = options.url,
                type = options.type,
// blob or arraybuffer. Default is blob
                dataType = options.responseType || "blob",
                data = options.data || null;
    
            xhr.addEventListener('load', function(){
                var data = {};
                data[options.dataType] = xhr.response;
// make callback and send data
                callback(xhr.status, xhr.statusText, data, xhr.getAllResponseHeaders());
            });

            xhr.open(type, url, true);
            xhr.responseType = dataType;
            xhr.send(data);
        },
        abort: function(){
            jqXHR.abort();
        }
      };
  }
});