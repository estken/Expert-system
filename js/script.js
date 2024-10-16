$(document).ready(function() {
  f = 0;

  $('#sub').click(function(e) {
    var name = $('#name').val();
    var user = $('#username').val();
    var password = $('#password').val();
    var confirm = $('#confirm').val();

    if ($.trim(name) == "") {
      e.preventDefault();
      $('#name').focus();
    } else if ($.trim(user) == "") {
      e.preventDefault();
      $('#username').focus();
    } else if ($.trim(password) == "") {
      e.preventDefault();
      $('#password').focus();
    } else if (password.length < 6 || password.length > 20 || password != confirm) {
      e.preventDefault();
      $('#password').focus();
    }
  });

  $('#password').focus(function() {
    $('#response').html("<p style='color:red'>password should be between 6 and 20 characters in length</p>");
  });

  $('#password').blur(function() {
    var password = $('#password').val();
    if (password.length >= 6 && password.length <= 20) {
      $('#response').html("<p style='color:blue'>password strength accepted</p>");
    } else {
      $('#response').html("<p style='color:red'>password should be between 6 and 20 characters in length</p>");
    }
  });

  $('#prof').click(function() {
    $(this).attr('class', 'active');
    $('#knowledge').removeAttr('class');
    $('#test2').slideUp('fast');
    $('#experttest1').slideDown('slow');
  });

  $('#knowledge').click(function() {
    $('#experttest1').slideUp('fast');
    $('#prof').removeAttr('class');
    $('#test2').slideDown('slow');
    $(this).attr('class', 'active');
  });

  $('#experttest1').on('click', '#regss', function() {
    f = f + 1;
    var response = document.querySelectorAll('select#opt');
    var symptoms = document.querySelectorAll('#symptoms');
    var get, sym;
    for (a = 0; a < response.length; ++a) {
      get = response[a].value;
      if (get == 'High' || get == 'Low' || get == 'Moderate') {
        sym = symptoms[a].value;
        $.post('../user/upload.php', { gets: get, sym: sym }, function(data) {});
      }
    }
    $.post('../user/continue.php', { f: f }, function(data) {
      $('#experttest2').html(data);
    });
  });

  $('#experttest1').on('click', '#previous', function() {
    f = f - 1;
    $.post('../user/previous.php', { f: f }, function(data) {
      $('#experttest2').html(data);
    });
  });

  $('#experttest1').on('click', '#process', function() {
    f = f + 1;
    var response = document.querySelectorAll('select#opt');
    var symptoms = document.querySelectorAll('#symptoms');
    var get, sym;

    for (a = 0; a < response.length; ++a) {
      get = response[a].value;
      if (get == 'High' || get == 'Low' || get == 'Moderate') {
        sym = symptoms[a].value;
        $.post('../user/upload.php', { gets: get, sym: sym }, function(data) {
          // alert("Answers were successfully submitted"); // Removed alert
          $('#feedback').html('<p>Answers were successfully submitted!</p>');  // Optional: Display a message on the page instead
        });
      }
    }

    

    // Optional: Uncomment these if needed to update UI after submission
    /*
    $.post('process.php', { f: f }, function(data) {
      $('#experttest2').html(data);
    });

    $.post('process3.php', { f: f }, function(data) {
      $('#chart').html(data);
    });

    $.post('process2.php', { f: f }, function(data) {
      $('#pro').html(data);
    });
    */
    

  });
});
