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



function table_search(event) {
    var input = document.getElementById("tableSearch");
    var filter = input.value.toUpperCase();
    var table = document.getElementById("currentTable");
    var tr = table.getElementsByTagName("tr");

    // Loop through all table rows and columns, and hide those that don't match the search query
    for (var i = 1; i < tr.length; i++) {
        var matchFound = false;
        for (var j = 0; j < tr[i].cells.length; j++) {
            var td = tr[i].cells[j];
            if (td) {
                var txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    matchFound = true;
                    break; // Break out of the column loop if a match is found
                }
            }
        }
        if (matchFound) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }

    // Check if the Enter key is pressed (key code 13) and trigger the GET request
    if (event.keyCode === 13) {
        // Add the search keyword to the query string and navigate to the same page with the GET request
        var searchParams = new URLSearchParams(window.location.search);

        searchParams.set("keyword", filter);
        var url = window.location.pathname + "?" + searchParams.toString();
        window.location.href = url;
    }
}

function toggleColumn(columnIndex) {
    var table = document.getElementById("currentTable");
    var checked = document.getElementById("toggleColumn" + columnIndex).checked;

    // Update the header cell
    var headerCell = table.rows[0].cells[columnIndex];
    headerCell.style.display = checked ? '' : 'none';

    // Update the data cells for the specified column
    for (var i = 1; i < table.rows.length; i++) {
        var row = table.rows[i];
        if (row.cells.length > columnIndex) {
            var dataCell = row.cells[columnIndex];
            dataCell.style.display = checked ? '' : 'none';
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