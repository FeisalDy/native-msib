window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki
  
    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
      new simpleDatatables.DataTable(datatablesSimple, {
        "perPage": 10, // menampilkan 10 data per halaman
      });
    }

  
    fetch('https://api.publicapis.org/entries')
      .then(response => response.json())
      .then(data => {
        const table = document.getElementById('my-table');
        let tableData = [];
        data.entries.forEach(api => {
          tableData.push([api.Description, api.Auth, api.Cors, `<a href="${api.Link}" target="_blank">${api.Link}</a>`, api.Category]);
        });
        const dataTable = new simpleDatatables.DataTable(table, {
          data: {
            headings: ['Description', 'Auth', 'Cors', 'Link', 'Category'],
            data: tableData
          },
          perPage: 10, 
          layout: {
            top: "<div class='simple-datatables-pagination'></div>"
          },
          pagination: true,
          searchable: false,
          pageLength: 10, // menampilkan 10 tombol pagination
          paginationSize: 3 
        });
      })
      .catch(error => console.error(error));
  });
  