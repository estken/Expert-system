<?php
include 'connection.php';
$f = $_POST['f']; // Get the current page number from POST request
$offset = $f * 5; // Calculate offset based on the current page
$limit = 5; // Number of symptoms per page

// Fetch 5 symptoms at a time using LIMIT and OFFSET
$select = "SELECT * FROM postrate_cancer LIMIT $limit OFFSET $offset";
$query = mysqli_query($conn, $select);

echo "<div class='table-responsive'><table class='table'><thead><tr><th>Symptoms</th><th>Response</th></thead></tr><tbody>";

while ($row = mysqli_fetch_array($query)) {
    echo "<tr>
            <td><input type='submit' id='postrate_cancer' class='btn btn-mini' value='" . $row['symptom'] . "'></td>
            <td><select class='form-control form-horizontal' id='opt'>
                <option>High</option>
                <option>Moderate</option>
                <option>Low</option>
                <option>None</option>
            </select></td>
          </tr>";
}

echo "</tbody></table></div>";

// Fetch total number of symptoms in the table
$totalQuery = "SELECT COUNT(*) AS total FROM postrate_cancer";
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalSymptoms = $totalRow['total'];

// Display navigation buttons
echo "<div class='form-group'>
        <div class='col-sm-12'>
            <ul class='pager'>";

// Previous button
if ($offset > 0) {
    echo "<li class='previous btn btn-mini' id='previous'><a href='#'>Previous</a></li>";
}

// If there are more symptoms, show 'Next' button
if ($offset + $limit < $totalSymptoms) {
    echo "<li class='next btn btn-mini' id='regss'><a href='#'>Next</a></li>";
} else {
    // If it's the last page, show 'Submit' button
    echo "<li class='next btn btn-mini' id='process'><a href='#'>Submit</a></li>";
}

echo "  </ul>
        </div>
      </div>";
?>
