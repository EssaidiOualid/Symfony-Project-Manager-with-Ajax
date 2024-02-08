function extractDataFromTable(tableId) {
  const table = document.getElementById(tableId);
  const data = [];

  const headers = Array.from(table.querySelectorAll('thead th')).map(header => header.textContent.trim());

  const rows = table.querySelectorAll('tbody tr');
  rows.forEach(row => {
    const rowData = {};
    const cells = row.querySelectorAll('td');
    cells.forEach((cell, index) => {
      rowData[headers[index]] = cell.textContent.trim();
    });
    data.push(rowData);
  });

  return data;
}
// Sample data
const data = extractDataFromTable('myTable');
/*[
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    { col1: 'ANESTHESIE REANIMATION', col2: '15', col3: '8' , col4: '2' , col5: '0' , col6: '25'},
    // Add more data here if needed
    ];*/
    console.log(data)
  
    const itemsPerPage = 10;
    let currentPage = 1;
  
    function displayData() {
    const startIndex = (currentPage - 1) * itemsPerPage; // 0
    const endIndex = startIndex + itemsPerPage; // 10
    const paginatedData = data.slice(startIndex, endIndex);
  
    const tableBody = document.querySelector('#myTable tbody');
    tableBody.innerHTML = '';
  
    paginatedData.forEach(rowData => {
      const row = document.createElement('tr');
      Object.values(rowData).forEach(value => {
      const cell = document.createElement('td');
      cell.textContent = value;
      row.appendChild(cell);
      });
      tableBody.appendChild(row);
    });
    }
  
    function setupPagination() {
    const totalPages = Math.ceil(data.length / itemsPerPage);
    const paginationElement = document.querySelector('#pagination ul');
    paginationElement.innerHTML = '';
  
    for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement('li');
            li.classList.add('page-item');
            const link = document.createElement('a');
            link.classList.add('page-link');
            link.href = '#';
            link.textContent = i;
            link.addEventListener('click', () => {
                currentPage = i;
                displayData();
            });
            li.appendChild(link);
            paginationElement.appendChild(li);
    }
    }
  
    displayData();
    setupPagination();