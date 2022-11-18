// Get table headers to handle clicks
const tableHeaders = document.querySelectorAll("th[data-column]");

// Get table and tbody to sort entries
const table = document.querySelector("#table");
const tbody = document.querySelector("#tbody");

// Get table rows
const rows = Array.from(table.rows);
const theadRow = rows.shift();

// Number of current column, according to which the table is sorted
let currentSortColumn = 6;

tableHeaders.forEach((th) => {
  th.addEventListener("click", (e) => {
    // Get column number from dataset
    const column = +e.target.dataset.column;

    // If table is sorted by the same column then return
    if (column === currentSortColumn) return;

    // Set current column as clicked column number
    currentSortColumn = column;
    // Remove active class from current column th
    theadRow.querySelector(".active").classList.remove("active");
    // Add active class to clicked th
    th.classList.add("active");

    // Sort table by column's cells values
    rows
      .sort(
        (a, b) => +b.children[column].innerHTML - +a.children[column].innerHTML
      )
      .forEach((row, i) => {
        // Fix place number after sorting
        /* 
          Если нужно, чтобы места всегда шли по порядку,
          то можно раскомментировать следующую строку
        */
        // row.children[0].innerHTML = i + 1;

        // Append tbody with sorted rows
        tbody.append(row);
      });
  });
});
