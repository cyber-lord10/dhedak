
$(document).ready(function () {

  $('#search').on('keyup', function () { 
    if ($('#search').val() != '') {
      $('p.search-error').hide('slow');
    } else {
      $('p.search-error').show('fast');
    }    
  })

  $('#searchForm').on('submit', function (event) { 
    event.preventDefault();
    if ($('#search').val() != '') {
      $('p.search-error').hide('slow');
      var phrase = $('#search').val();
      window.location.href = '/search/' + phrase; 
    } else {
      $('p.search-error').show('fast');
    }
  });

});