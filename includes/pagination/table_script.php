<script>
function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("currentTable");
    switching = true;
    dir = "asc";

    // Reset all sort arrows
    var arrows = document.getElementsByClassName("sort-arrows");
    for (var i = 0; i < arrows.length; i++) {
        arrows[i].classList.remove("up", "down");
    }

    while (switching) {
        switching = false;
        rows = table.rows;

        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;

            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];

            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            }
        }

        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount++;
        } else {
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }

    // Update the sort arrow for the current column
    var arrow = table.getElementsByTagName("th")[n].getElementsByClassName("sort-arrows")[0];
    arrow.classList.remove(dir == "asc" ? "down" : "up");
    arrow.classList.add(dir == "asc" ? "up" : "down");
}



function table_search() {
    // Declare variables
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("tableSearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("currentTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows and columns, and hide those that don't match the search query
    for (i = 0; i < tr.length; i++) {
        for (j = 0; j < tr[i].cells.length; j++) {
            td = tr[i].cells[j];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break; // Break out of the column loop if a match is found
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
}


function pagination() {
    var record = document.getElementById("no_of_record").value;
    var currentUrl = window.location.href;
    var urlParts = currentUrl.split('?');
    var baseUrl = urlParts[0];
    var queryString = urlParts.length > 1 ? '?' + urlParts[1] : '';
    var params = new URLSearchParams(queryString);

    // Set the 'no_of_record' parameter to the new value
    params.set('no_of_record', record);

    location.href = baseUrl + (params.toString() !== '' ? '?' + params.toString() : '');
}
</script>