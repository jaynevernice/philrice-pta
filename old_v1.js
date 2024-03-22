<script>

    $(document).ready(function() {
        loadTrainings();
    });

    function showTrainings(result) {
      const tableBody = $('#table-body');

      // Efficient template literal construction using map()
      const trainingRows = result.map(data => `
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-normal dark:text-white max-w-xs">${data.title}</th>
          <td class="px-6 py-4">${data.division || '-'}</td>  
          <td class="px-6 py-4">${data.start_date || '-'} - ${data.end_date || '-'}</td>  
          <td class="px-6 py-4">${data.venue || '-'}</td>  
          <td class="px-6 py-4">${data.province || data.state}, ${data.municipality || data.country}</td>  
          <td class="px-6 py-4">${data.num_of_participants || '-'}</td>  
          <td class="px-6 py-4">${data.created_at || '-'}</td>  
          <td class="px-6 py-4">
            <a href="#" target="_blank">
                <button type="button" class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <box-icon name='expand-alt' size="xs"></box-icon>
                    <span class="sr-only">Edit</span>
                </button>
            </a>
            <button onclick="showRecord(${data.id || '-'})" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</button>
            <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" onclick="deleteTraining(${data.id || '-'})">Delete</button>
          </td>  
        </tr>

      `).join('');

      // Single DOM manipulation for better performance
      tableBody.html(trainingRows);
    }

    function loadTrainings() {
        $.ajax({
            url: "/encoder/trainings/year",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                'showTraining': true,
            },
            success: function(result) {
                // console.log(result);
                showTrainings(result['record']);
            },
            error: function(error) {
                alert("Oops something went wrong!");
            }
        })
    }

    function showRecord(id) {
        window.location.href = "{{ route('trainingsform.edit', ':id') }}".replace(':id', id);
    }

    function deleteTraining(id) {
      if (confirm('Are you sure you want to delete this training?')) {
        // Use AJAX to send a DELETE request to the appropriate route
        $.ajax({
          url: '/encoder/trainings/form-delete/' + id, // Replace with the correct route for deleting training
          method: 'DELETE',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          },
          data: {
              'deleteRecord': true,
          },
          success: function(response) {
            if (response.message === 'Record deleted successfully') {
              $(`[data-id="${id}"]`).remove(); // Remove the deleted training row
              alert('Successfully deleted');
            } else {
              console.error('Error deleting training:', response.error); // Handle potential errors
            }
            loadTrainings(); // Optional: Reload trainings (consider if needed)
          },
          error: function(error) {
            // Handle any errors during deletion
            console.error('Error deleting record:', error);
          }
        });
      }
    }

    // simple datatable
    // $('#table_data').DataTable({
    //     searching: false,
    //     // select: true,
    //     layout: {
    //         topStart: {
    //             // buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    //             buttons: [ 
    //               'pageLength',  
    //               {
    //                   extend: 'excel',
    //                   text: 'Export',
    //                   // hindi gumana yung asa baba
    //                   className: 'text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-50 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center dark:focus:ring-green-50 me-2 mb-2'
    //                   // exportOptions: {
    //                   //     modifier: {
    //                   //         selected: null
    //                   //     }
    //                   // }
    //               },
    //               // 'excel', 
    //               // 'pdf'
    //             ]
    //         }

    //     }
    // });
    
    // datatable with custom entries
    // var table = $('#table_data').DataTable();
    // new DataTable.Buttons(table, {
    //     buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    // });
    
    // table
    //     .buttons(0, null)
    //     .container()
    //     .prependTo(table.table().container());

    // without default design
    // $('#table_data').DataTable({
    //     dom: 'Bfrtip',
    //     buttons: ['excel', 'pdf']
    // });

    // custom button
    // $('#table_data').DataTable({
    //     layout: {
    //         topStart: {
    //             // buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
    //             // buttons: [ 'csv', 'excel', 'pdf']
    //             buttons: [
    //             {
    //                 text: 'My button',
    //                 // 'excel'
    //                 // action: 'excel'
    //                 // action: function (e, dt, node, config) {
    //                 //     'excel'
    //                 // }
    //             }
    //         ]
    //         }
    //     }
    // });
  </script>