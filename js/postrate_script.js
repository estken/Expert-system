var f = 0; // Initialize the pagination state

// 'Next' button logic
$('#experttest1').on('click', '#regss', function() {
    f = f + 1; // Increment page number for 'Next'
    var response = document.querySelectorAll('select#opt');
    var symptoms = document.querySelectorAll('#postrate_cancer'); // Update the correct ID for symptoms

    var get, sym;
    for (a = 0; a < response.length; ++a) {
        get = response[a].value;
        if (get == 'High' || get == 'Low' || get == 'Moderate') {
            sym = symptoms[a].value;
            // Save response and symptom to the database on each page
            $.post('../user/submit_postrate.php', { gets: get, sym: sym }, function(data) {
                // Optionally handle response from server
            });
        }
    }
    // Fetch the next set of symptoms
    $.post('../user/continue_postrate.php', { f: f }, function(data) {
        $('#experttest2').html(data); // Load next set of symptoms
    });
});

// 'Previous' button logic
$('#experttest1').on('click', '#previous', function() {
    if (f > 0) {
        f = f - 1; // Decrement page number for 'Previous'
        $.post('../user/previous_postrate.php', { f: f }, function(data) {
            $('#experttest2').html(data); // Load previous set of symptoms
        });
    }
});

// 'Submit' button logic for the last page
$('#experttest1').on('click', '#process', function() {
    var response = document.querySelectorAll('select#opt');
    var symptoms = document.querySelectorAll('#postrate_cancer'); // Update the correct ID for symptoms

    var get, sym;
    for (a = 0; a < response.length; ++a) {
        get = response[a].value;
        if (get == 'High' || get == 'Low' || get == 'Moderate') {
            sym = symptoms[a].value;
            // Collect and submit responses from the last page
            $.post('../user/submit_postrate.php', { gets: get, sym: sym }, function(data) {
                // Optionally handle response from server
            });
        }
    }

    // After submission, display a success message or redirect
    alert('All symptoms have been submitted successfully.');
    // Optionally, redirect the user to another page after submission
    // window.location.href = "success_page.php"; 
});
