import "./bootstrap";
import "flowbite";
import Datepicker from "flowbite-datepicker/Datepicker";
import DateRangePicker from "flowbite-datepicker/DateRangePicker";
// import ApexCharts from 'apexcharts';
import Swal from "sweetalert2";

document.addEventListener("DOMContentLoaded", function () {
    const startDateInput = document.getElementById("start_date");
    const endDateInput = document.getElementById("end_date");
    if (startDateInput && endDateInput) {
        const today = new Date();
        const datepickerOptions = {
            maxDate: today,
            beforeCreateDay: function (date) {
                if (date > today) {
                    return {
                        disabled: true,
                    };
                }
            },
        };
        new Datepicker(startDateInput, datepickerOptions);
        new Datepicker(endDateInput, datepickerOptions);
    }
});