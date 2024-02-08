// Sample data
const data = [
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
    ];
  
    const itemsPerPage = 5;
    let currentPage = 1;
  
    function displayData() {
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
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
    const paginationElement = document.querySelector('#pagination');
    paginationElement.innerHTML = '';
  
    for (let i = 1; i <= totalPages; i++) {
      const link = document.createElement('a');
      link.href = '#';
      link.textContent = i;
      link.addEventListener('click', () => {
      currentPage = i;
      displayData();
      });
      paginationElement.appendChild(link);
    }
    }
  
    displayData();
    setupPagination();