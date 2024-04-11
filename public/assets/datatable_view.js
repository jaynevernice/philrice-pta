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
                <td class="px-6 py-4 text-center">
                    <button
                    data-modal-target="trainings-modal" 
                    data-modal-toggle="trainings-modal" 
                    type="button" 
                    class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-center items-center justify-center w-8 h-8">
                        <box-icon name='expand-alt' size="xs"></box-icon>
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
            showTrainingView: true,
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
                filterTrainingsView: true,
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
                filterTrainingsView: true,
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
                filterTrainingsView: true,
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
                filterTrainingsView: true,
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

function exportRecord() {
    var searchInput = $("#trainingsSearch").val();
    var yearSelect = $("#yearSelect").val();
    var start_MonthSelect = $("#start_MonthSelect").val();
    var end_MonthSelect = $("#end_MonthSelect").val();

    $.ajax({
        url: "/encoder/export/record",
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            exportFilteredRecords: true,
            searchInput: searchInput,
            yearSelect: yearSelect,
            start_MonthSelect: start_MonthSelect,
            end_MonthSelect: end_MonthSelect,
        },
        cache: false,
        xhrFields: {
            responseType: "blob",
        },
        success: function (result) {
            // var fileName = 'PhilRice Central Experimental Station (' . date('Y') . ') - Summary of Trainings';
            var fileName =
                "PhilRice CES (" +
                new Date().getFullYear() +
                ") - Summary of Trainings";

            var blob = new Blob([result], {
                type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
            });
            var link = document.createElement("a");
            link.href = URL.createObjectURL(result);
            link.href = URL.createObjectURL(blob);
            link.download = fileName + ".xls";
            link.click();

            alert("Thank you!");
        },
        error: function (error) {
            alert("Oops something went wrong!");
        },
    });
}
