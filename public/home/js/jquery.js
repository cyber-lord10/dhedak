
// $(document).load(function () {
//   document.write('<h1>Loading</h1>');
// });


$(document).ready(function () {
  
  $('#phrase').on('keyup', function (event) { 
    var phrase = $('#phrase').val();
    if (phrase !== '') {
      $('#search-error-container').hide(100);
      $('#search-trigger').removeClass('btn-outline-dark text-dark disabled').addClass('btn-light text-danger');
      if (event.key === 'Enter') {
        $('#phrase').val('');
        $('#search-processing-container').show(); 
        window.location.href = '/search/' + phrase;       
      }
    } else {
      $('#search-error-container').show();
      $('#search-trigger').removeClass('btn-light text-danger').addClass('btn-outline-dark text-dark disabled');
    }
  });

  $('#search-trigger').on('click', function () {
    var phrase = $('#phrase').val();
    if (phrase !== '') {  
      $('#search-error-container').hide(100);
      $('#search-trigger').removeClass('btn-outline-dark text-dark disabled').addClass('btn-light text-danger');
      $('#phrase').val('');
      $('#search-processing-container').show();
      window.location.href = '/search/' + phrase; 
    } else {
      $('#search-error-container').show(150);
      $('#search-trigger').addClass("disabled");
      $('#search-trigger').removeClass('btn-light text-danger').addClass('btn-outline-dark text-dark disabled');
    }
  });


});