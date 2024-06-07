(function ($) {
    "use strict";

    $( document ).ready(function() {
        commonAjaxRequest('GET', $('#revenueOverviewChartRoute').val(), revenueOverviewChartResponse, revenueOverviewChartResponse, {});
        commonAjaxRequest('GET', $('#studentOverviewChartRoute').val(), studentOverviewChartResponse, studentOverviewChartResponse, {});
    });

    function revenueOverviewChartResponse(response){
        if (response.status == true){

            var monthList = [];
            var dataList = [];
            $.each(response.data, function (index, item) {
                monthList.push(index);
                dataList.push(item);
            });

            var revenueOverviewChartOptions = {
                series: [{
                    name: 'Revenue',
                    data: dataList
                }],
                chart: {
                    type: 'bar',
                    height: 250,
                    toolbar: {
                        show: false,
                    },
                },
                colors: ["#a91150"],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '30%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: monthList,
                },

                fill: {
                    type: "gradient",
                    gradient: {
                        gradientToColors: ["#007AFF"],
                        shadeIntensity: 1,
                        type: "vertical",
                        opacityFrom: 1,
                        opacityTo: 0.5,
                        stops: [0, 100],
                    },
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return "$ " + val
                        }
                    }
                }
            };
            var revenueOverviewChart = new ApexCharts(document.querySelector("#revenueOverviewChart"), revenueOverviewChartOptions);
            revenueOverviewChart.render();
        }

    }
    function studentOverviewChartResponse(response){

        var packageNameList = [];
        var enrolmentCountlist = [];
        $.each(response.data, function (index, item) {
            packageNameList.push(item.package_name);
            enrolmentCountlist.push(item.enrolment_count);
        });

        if (response.status == true){
            var studentOverviewChartOptions = {
                series: enrolmentCountlist,
                chart: {
                    width: 450,
                    type: 'donut',
                },
                labels: packageNameList,
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };
        }

        var studentOverviewChart = new ApexCharts(document.querySelector("#studentOverviewChart"), studentOverviewChartOptions);
        studentOverviewChart.render();
    }

        $("#recentEnrolmentHistoryTable").DataTable({
            pageLength: 10,
            ordering: false,
            serverSide: false,
            processing: false,
            searching: false,
            responsive: true,
            ajax: $('#recent-enrolment-history-route').val(),
            language: {
                paginate: {
                    previous: "<i class='fa-solid fa-angles-left'></i>",
                    next: "<i class='fa-solid fa-angles-right'></i>",
                },
                searchPlaceholder: "Search event",
                search: "<span class='searchIcon'><i class='fa-solid fa-magnifying-glass'></i></span>",
            },
            dom: '<>tr<"tableBottom"<"row align-items-center"<"col-sm-6"<"tableInfo"i>><"col-sm-6"<"tablePagi"p>>>><"clear">',
            columns: [
                {"data": "enrolment_id", "name": "enrolment_id"},
                {"data": "name", "name": "users.name",responsivePriority:1},
                {"data": "package_name", "name": "packages.package_name",responsivePriority:2},
                {"data": "status", "name": "status"},
            ],
            "bPaginate": false
        });


        $("#recentPaymentHistoryTable").DataTable({
            pageLength: 10,
            ordering: false,
            serverSide: false,
            processing: false,
            searching: false,
            responsive: true,
            ajax: $('#recent-payment-history-route').val(),
            language: {
                paginate: {
                    previous: "<i class='fa-solid fa-angles-left'></i>",
                    next: "<i class='fa-solid fa-angles-right'></i>",
                },
                searchPlaceholder: "Search event",
                search: "<span class='searchIcon'><i class='fa-solid fa-magnifying-glass'></i></span>",
            },
            dom: '<>tr<"tableBottom"<"row align-items-center"<"col-sm-6"<"tableInfo"i>><"col-sm-6"<"tablePagi"p>>>><"clear">',
            columns: [
                {"data": "payment_id", "name": "payments.payment_id"},
                {"data": "student_name", "name": "student_name"},
                {"data": "payment_amount"},
                {"data": "status"},
            ],
            "bPaginate": false
        });



})(jQuery)
