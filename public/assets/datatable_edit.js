let currentPage = 1;
const recordsPerPage = 5; // Change this number according to your preference

$(document).ready(function () {
    loadTrainings(currentPage);
});

function showTrainings(result) {
    // const tableBody = $('#table-body');

    var datas = result;
    var tableRow = ``;

    datas.forEach(function (data) {
        console.log(data["id"]);
        tableRow +=
            `
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-normal dark:text-white max-w-xs">` +
            data["title"] +
            `</th>
                <td class="px-6 py-4">` +
            data["division"] +
            `</td>
                <td class="px-6 py-4">` +
            formatDate(data["start_date"]) +
            ` - ` +
            formatDate(data["end_date"]) +
            `</td>
                <td class="px-6 py-4">` +
            data["venue"] +
            `</td>
                <td class="px-6 py-4">` +
            (data["municipality"] || data["state"]) +
            `, ` +
            (data["province"] || data["country"]) +
            `</td>
                <td class="px-6 py-4">` +
            data["num_of_participants"] +
            `</td>
                <td class="px-6 py-4">` +
            data["created_at"] +
            `</td>
                <td class="px-6 py-4 text-center">
                    <button
                    data-modal-target="trainings-modal" 
                    data-modal-toggle="trainings-modal" 
                    type="button" 
                    class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-center items-center justify-center w-8 h-8">
                        <box-icon name='expand-alt' size="xs"></box-icon>
                    </button>`;
        tableRow += `
                    <button data-edit-url="{{ route('trainingsform.edit', ['id' => ':id']) }}" onclick="showRecord(this)"
                            data-id="` + data["id"] + `"
                            type="button"
                            class="text-white bg-blue-300 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-center items-center justify-center w-8 h-8 m-[0.5px]">
                        <box-icon type='solid' name='edit-alt' size="xs"></box-icon>
                    </button>
                    `;
        tableRow +=
            `
                    <button onclick="deleteRecord(` +
            data["id"] +
            `)"
                        type="button"
                        class="text-white bg-red-300 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-center items-center justify-center w-8 h-8 m-[0.5px]"
                        type="button">
                        <box-icon name='trash' type='solid' size="xs"></box-icon>
                    </button>
                </td>
            </tr>
            `;
    });

    // Efficient template literal construction using map()
    // const trainingRows = result.map(data => `
    // <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
    //     <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-normal dark:text-white max-w-xs">${data.title}</th>
    //     <td class="px-6 py-4">${data.division || '-'}</td>
    //     <td class="px-6 py-4">${formatDate(data.start_date)} - ${formatDate(data.end_date)}</td>
    //     <td class="px-6 py-4">${data.venue || '-'}</td>
    //     <td class="px-6 py-4 text-center">
    //         <button
    //         data-modal-target="trainings-modal"
    //         data-modal-toggle="trainings-modal"
    //         type="button"
    //         class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-center items-center justify-center w-8 h-8">
    //             <box-icon name='expand-alt' size="xs"></box-icon>
    //         </button>
    //     </td>
    // </tr>
    // `).join('');

    // Single DOM manipulation for better performance
    // tableBody.html(trainingRows);
    $("#table-body").html(tableRow);
}

function formatDate(dateString) {
    if (!dateString) return "-";

    const date = new Date(dateString);
    const monthNames = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];

    const month = monthNames[date.getMonth()];
    const day = String(date.getDate()).padStart(2, "0");
    const year = date.getFullYear();

    return `${month}-${day}-${year}`;
}

function loadTrainings(page) {
    $.ajax({
        url: "/encoder/trainings/filter",
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            showTraining: true,
            page: page,
            recordsPerPage: recordsPerPage,
            station: station,
        },
        success: function (result) {
            showTrainings(result["records"]);
            currentPage = page; // Update current page

            // Check if there are more records beyond the current page
            if (recordsPerPage != result["records"].length) {
                $("#nextButton").hide();
                $("#prevButton").show();
            } else {
                $("#nextButton").show();
                $("#prevButton").show();
            }
        },
        error: function (error) {
            alert("Oops something went wrong!");
        },
    });
}

$("#trainingsSearch").on("keyup input", function () {
    var searchInput = $("#trainingsSearch").val();
    var yearSelect = $("#yearSelect").val();
    var start_MonthSelect = $("#start_MonthSelect").val();
    var end_MonthSelect = $("#end_MonthSelect").val();

    if (
        searchInput == "" &&
        start_MonthSelect == "" &&
        end_MonthSelect == "" &&
        yearSelect == ""
    ) {
        loadTrainings(1);
    } else {
        $.ajax({
            url: "/encoder/trainings/filter",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                filterTrainings: true,
                searchInput: searchInput,
                yearSelect: yearSelect,
                start_MonthSelect: start_MonthSelect,
                end_MonthSelect: end_MonthSelect,
                station: station,
            },
            success: function (result) {
                showTrainings(result["records"]);
                $("#nextButton").hide();
                $("#prevButton").hide();
            },
            error: function (error) {
                alert("Oops something went wrong!");
            },
        });
    }
});

$("#yearSelect").on("change", function () {
    var searchInput = $("#trainingsSearch").val();
    var yearSelect = $("#yearSelect").val();
    var start_MonthSelect = $("#start_MonthSelect").val();
    var end_MonthSelect = $("#end_MonthSelect").val();

    if (
        searchInput == "" &&
        start_MonthSelect == "" &&
        end_MonthSelect == "" &&
        yearSelect == ""
    ) {
        loadTrainings(1);
    } else {
        $.ajax({
            url: "/encoder/trainings/filter",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                filterTrainings: true,
                searchInput: searchInput,
                yearSelect: yearSelect,
                start_MonthSelect: start_MonthSelect,
                end_MonthSelect: end_MonthSelect,
                station: station,
            },
            success: function (result) {
                showTrainings(result["records"]);
                $("#nextButton").hide();
                $("#prevButton").hide();
            },
            error: function (error) {
                alert("Oops something went wrong!");
            },
        });
    }
});

$("#start_MonthSelect").on("change", function () {
    var searchInput = $("#trainingsSearch").val();
    var yearSelect = $("#yearSelect").val();
    var start_MonthSelect = $("#start_MonthSelect").val();
    var end_MonthSelect = $("#end_MonthSelect").val();

    if (
        searchInput == "" &&
        start_MonthSelect == "" &&
        end_MonthSelect == "" &&
        yearSelect == ""
    ) {
        loadTrainings(1);
    } else {
        $.ajax({
            url: "/encoder/trainings/filter",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                filterTrainings: true,
                searchInput: searchInput,
                yearSelect: yearSelect,
                start_MonthSelect: start_MonthSelect,
                end_MonthSelect: end_MonthSelect,
                station: station,
            },
            success: function (result) {
                showTrainings(result["records"]);
                $("#nextButton").hide();
                $("#prevButton").hide();
            },
            error: function (error) {
                alert("Oops something went wrong!");
            },
        });
    }
});

$("#end_MonthSelect").on("change", function () {
    var searchInput = $("#trainingsSearch").val();
    var yearSelect = $("#yearSelect").val();
    var start_MonthSelect = $("#start_MonthSelect").val();
    var end_MonthSelect = $("#end_MonthSelect").val();

    if (
        searchInput == "" &&
        start_MonthSelect == "" &&
        end_MonthSelect == "" &&
        yearSelect == ""
    ) {
        loadTrainings(1);
    } else {
        $.ajax({
            url: "/encoder/trainings/filter",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                filterTrainings: true,
                searchInput: searchInput,
                yearSelect: yearSelect,
                start_MonthSelect: start_MonthSelect,
                end_MonthSelect: end_MonthSelect,
                station: station,
            },
            success: function (result) {
                showTrainings(result["records"]);
                $("#nextButton").hide();
                $("#prevButton").hide();
            },
            error: function (error) {
                alert("Oops something went wrong!");
            },
        });
    }
});

function nextPage() {
    loadTrainings(currentPage + 1);
}

function prevPage() {
    if (currentPage > 1) {
        loadTrainings(currentPage - 1);
    }
}

// function showRecord(id) {
//     window.location.href = "{{ route('trainingsform.edit', ':id') }}".replace(":id", id);
// }
// function showRecord(url) {
//     window.location.href = url;
// }
function showRecord(button) {
    var editUrl = button.getAttribute("data-edit-url");
    var id = button.getAttribute("data-id");

    if (editUrl && id) {
        window.location.href = editUrl.replace(":id", id);
    }
}

function deleteRecord(id) {
    if (confirm("Are you sure you want to delete this record?")) {
        // Use AJAX to send a DELETE request to the appropriate route
        $.ajax({
            url: "/encoder/trainings/form-delete/" + id, // Replace with the correct route for deleting training
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                deleteRecord: true,
            },
            success: function (response) {
                if (response.message === "Record deleted successfully") {
                    $(`[data-id="${id}"]`).remove(); // Remove the deleted training row
                    alert("Successfully deleted");
                } else {
                    console.error("Error deleting training:", response.error); // Handle potential errors
                }
                loadTrainings(currentPage); // Reload current page's trainings
            },
            error: function (error) {
                // Handle any errors during deletion
                console.error("Error deleting record:", error);
            },
        });
    }
}

// function exportRecord() {
//     var searchInput = $("#trainingsSearch").val();
//     var yearSelect = $("#yearSelect").val();
//     var start_MonthSelect = $("#start_MonthSelect").val();
//     var end_MonthSelect = $("#end_MonthSelect").val();

//     $.ajax({
//         url: "/encoder/export/record",
//         method: "POST",
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//         data: {
//             exportFilteredRecords: true,
//             searchInput: searchInput,
//             yearSelect: yearSelect,
//             start_MonthSelect: start_MonthSelect,
//             end_MonthSelect: end_MonthSelect,
//         },
//         cache: false,
//         xhrFields: {
//             responseType: "blob",
//         },
//         success: function (result) {
//             // var fileName = 'PhilRice Central Experimental Station (' . date('Y') . ') - Summary of Trainings';
//             var fileName =
//                 "PhilRice CES (" +
//                 new Date().getFullYear() +
//                 ") - Summary of Trainings";

//             var blob = new Blob([result], {
//                 type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
//             });
//             var link = document.createElement("a");
//             link.href = URL.createObjectURL(result);
//             link.href = URL.createObjectURL(blob);
//             link.download = fileName + ".xls";
//             link.click();

//             alert("Thank you!");
//         },
//         error: function (error) {
//             alert("Oops something went wrong!");
//         },
//     });
// }
