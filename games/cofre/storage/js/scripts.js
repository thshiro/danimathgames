/*
* Javascript App Config
* With Some functions
*/

var url = window.location.href;
var domainUrl = url.replace('https://www.','').replace('http://www.','').replace('https://','').replace('http://','').split('/')[0];


if(document.location.protocol == 'https:'){
  var rootUrl = 'https://'+domainUrl;
}else{
  var rootUrl = 'http://'+domainUrl;
}

rootUrl += '/games/cofre';

/**
* Opens an loading message alert instance of Sweet Alert 2
*/
function sweet_loading() {
  Swal.fire({
    html: "<i class='fa fa-refresh fa-spin'></i> Loading... please wait</span>",
    showCancelButton: false,
    showConfirmButton: false
  })
}


/**
* Opens an error message alert instance of Sweet Alert 2
* @param string "message" is the error message
*/
function sweet_error(message) {
  Swal.fire({
    html: `<span style="color:red">${message}</span>`,
    showCancelButton: false,
    showConfirmButton: false,
  })
}


/**
* Display an alert message instance of Sweet Alert 2
* @param string "message" is the error message
* @param string "type" is the alert type
*/
function sweet_toast(message, type) {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    Toast.fire({
      type: type,
      title: message
    })
}


/**
* Verify if a string
* @param string "text" is the json string
* @return boolean
*/
function isJSON(text) {
    if (typeof text !== 'string') {
        text = JSON.stringify(text);
        try {
            JSON.parse(text);
            return true;
        } catch (e) {
            return false;
        }
    }
}


/**
* Get a form ID and send a post for the controller file
* @param string "formName" is the form name to get the data
* @param boolean "reload" if wanted to reload the page after success (optional)
* @param boolean "toast" if wanted to display a success message (sweet_toast function) (optional)
* @param string "message" is the message to display after success (optional)
* @param string "redirec" is the redirect location (optional)
* @return boolean
*/
function ajaxForm(formName, reload = false, toast = false, message = 'Done!', redirect = false) {

    formData = new FormData($(`form[name="${formName}"]`)[0]);

    controller = $(`form[name="${formName}"] input[name="controller"]`)[0];

    if (typeof controller == 'undefined') {
        controller = 'Controller';
    }else{
        controller = controller.value;
    }

    $.ajax({
    method: 'post',
    url: `${rootUrl}/app/controller/${controller}.php`,
    data: formData,
    contentType: false,
    processData: false,
    beforeSend: function(){
      sweet_loading();
    },
    success: function (data) {

        if (data != '') {
            sweet_error(data);
            return;
        }

        if (toast) {

            sweet_toast(message, 'success');

            if (reload === true) {

                if (redirect !== false) {
                    window.location.href = redirect;
                }else{
                    location.reload();
                }

            }

        } else {

            Swal.fire({
                type: 'success',
                text: message,
                showConfirmButton: false,
                showCancelButton: false,
                timer: 1100
            }).then((result) => {

                if (reload === true) {

                    if (redirect !== false) {
                        window.location.href = redirect;
                    }else{
                        location.reload();
                    }

                }

            })
        }
    }, // end success

    error: function(){
        sweet_error('Sorry, something went wrong. :(');
    }

    }); // end ajax
}
