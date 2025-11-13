/**
 * Dashboard Analytics
 */

"use strict";

(function () {
    let cardColor, headingColor, axisColor, shadeColor, borderColor;

    cardColor = config.colors.white;
    headingColor = config.colors.headingColor;
    axisColor = config.colors.axisColor;
    borderColor = config.colors.borderColor;

    // Total Revenue Report Chart - Bar Chart
    // --------------------------------------------------------------------
    const totalRevenueChartEl = document.querySelector("#totalRevenueChart"),
        totalRevenueSeries = (() => {
            try {
                const raw =
                    totalRevenueChartEl?.dataset?.totalRevenueSeries || "[]";
                const parsed = JSON.parse(raw);
                return Array.isArray(parsed) ? parsed : [];
            } catch (e) {
                return [];
            }
        })(),
        totalRevenueCategories = [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ],
        totalRevenueChartOptions = {
            series:
                totalRevenueSeries.length > 0
                    ? totalRevenueSeries
                    : [
                          {
                              name: "2021",
                              data: [
                                  18, 7, 15, 29, 18, 12, 9, 17, 13, 18, 9, 11,
                              ],
                          },
                          {
                              name: "2020",
                              data: [
                                  -13, -18, -9, -14, -5, -17, -15, -10, -12, -8,
                                  -6, -9,
                              ],
                          },
                      ],
            chart: {
                height: 300,
                stacked: true,
                type: "bar",
                toolbar: { show: false },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "33%",
                    borderRadius: 12,
                    startingShape: "rounded",
                    endingShape: "rounded",
                },
            },
            colors: [config.colors.primary, config.colors.info],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "smooth",
                width: 6,
                lineCap: "round",
                colors: [cardColor],
            },
            legend: {
                show: true,
                horizontalAlign: "left",
                position: "top",
                markers: {
                    height: 8,
                    width: 8,
                    radius: 12,
                    offsetX: -3,
                },
                labels: {
                    colors: axisColor,
                },
                itemMargin: {
                    horizontal: 10,
                },
            },
            grid: {
                borderColor: borderColor,
                padding: {
                    top: 0,
                    bottom: -8,
                    left: 20,
                    right: 20,
                },
            },
            xaxis: {
                categories:
                    totalRevenueSeries.length > 0
                        ? totalRevenueCategories
                        : totalRevenueCategories,
                labels: {
                    style: {
                        fontSize: "13px",
                        colors: axisColor,
                    },
                },
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
            },
            yaxis: {
                labels: {
                    style: {
                        fontSize: "13px",
                        colors: axisColor,
                    },
                },
            },
            responsive: [
                {
                    breakpoint: 1700,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "32%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 1580,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "35%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 1440,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "42%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 1300,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "48%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 1200,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "40%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 1040,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 11,
                                columnWidth: "48%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 991,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "30%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 840,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "35%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 768,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "28%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 640,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "32%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 576,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "37%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 480,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "45%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 420,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "52%",
                            },
                        },
                    },
                },
                {
                    breakpoint: 380,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: 10,
                                columnWidth: "60%",
                            },
                        },
                    },
                },
            ],
            states: {
                hover: {
                    filter: {
                        type: "none",
                    },
                },
                active: {
                    filter: {
                        type: "none",
                    },
                },
            },
        };
    if (
        typeof totalRevenueChartEl !== undefined &&
        totalRevenueChartEl !== null
    ) {
        const totalRevenueChart = new ApexCharts(
            totalRevenueChartEl,
            totalRevenueChartOptions
        );
        totalRevenueChart.render();
    }

    // Growth Chart - Radial Bar Chart
    // --------------------------------------------------------------------
    const growthChartEl = document.querySelector("#growthChart"),
        // Read growth percent from dataset
        growthPercent = (() => {
            const raw = growthChartEl?.dataset?.growthPercent;
            const num = Number(raw);
            return Number.isFinite(num) ? num : 0;
        })(),
        growthChartOptions = {
            series: [growthPercent],
            labels: ["Growth"],
            chart: {
                height: 240,
                type: "radialBar",
            },
            plotOptions: {
                radialBar: {
                    size: 150,
                    offsetY: 10,
                    startAngle: -150,
                    endAngle: 150,
                    hollow: {
                        size: "55%",
                    },
                    track: {
                        background: cardColor,
                        strokeWidth: "100%",
                    },
                    dataLabels: {
                        name: {
                            offsetY: 15,
                            color: headingColor,
                            fontSize: "15px",
                            fontWeight: "600",
                            fontFamily: "Public Sans",
                        },
                        value: {
                            offsetY: -25,
                            color: headingColor,
                            fontSize: "22px",
                            fontWeight: "500",
                            fontFamily: "Public Sans",
                        },
                    },
                },
            },
            colors: [config.colors.primary],
            fill: {
                type: "gradient",
                gradient: {
                    shade: "dark",
                    shadeIntensity: 0.5,
                    gradientToColors: [config.colors.primary],
                    inverseColors: true,
                    opacityFrom: 1,
                    opacityTo: 0.6,
                    stops: [30, 70, 100],
                },
            },
            stroke: {
                dashArray: 5,
            },
            grid: {
                padding: {
                    top: -35,
                    bottom: -10,
                },
            },
            states: {
                hover: {
                    filter: {
                        type: "none",
                    },
                },
                active: {
                    filter: {
                        type: "none",
                    },
                },
            },
        };
    if (typeof growthChartEl !== undefined && growthChartEl !== null) {
        const growthChart = new ApexCharts(growthChartEl, growthChartOptions);
        growthChart.render();
    }

    // Profit Report Line Chart
    // --------------------------------------------------------------------
    const profileReportChartEl = document.querySelector("#profileReportChart"),
        // Parse users series from dataset if provided
        profileUsersSeries = (() => {
            try {
                const raw = profileReportChartEl?.dataset?.usersSeries || "[]";
                const parsed = JSON.parse(raw);
                return Array.isArray(parsed) ? parsed : [];
            } catch (e) {
                return [];
            }
        })(),
        profileReportChartConfig = {
            chart: {
                height: 80,
                // width: 175,
                type: "line",
                toolbar: {
                    show: false,
                },
                dropShadow: {
                    enabled: true,
                    top: 10,
                    left: 5,
                    blur: 3,
                    color: config.colors.warning,
                    opacity: 0.15,
                },
                sparkline: {
                    enabled: true,
                },
            },
            grid: {
                show: false,
                padding: {
                    right: 8,
                },
            },
            colors: [config.colors.warning],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                width: 5,
                curve: "smooth",
            },
            series: [
                {
                    data:
                        profileUsersSeries.length > 0
                            ? profileUsersSeries
                            : [110, 270, 145, 245, 205, 285],
                },
            ],
            xaxis: {
                show: false,
                lines: {
                    show: false,
                },
                labels: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
        };
    if (
        typeof profileReportChartEl !== undefined &&
        profileReportChartEl !== null
    ) {
        const profileReportChart = new ApexCharts(
            profileReportChartEl,
            profileReportChartConfig
        );
        profileReportChart.render();
    }

    // Order Statistics Chart
    // --------------------------------------------------------------------
    const chartOrderStatistics = document.querySelector(
        "#orderStatisticsChart"
    );

    // Normalize input to avoid length/type mismatches breaking the chart
    function toArray(value) {
        if (Array.isArray(value)) return value;
        if (value && typeof value === "object") return Object.values(value);
        return [];
    }

    const labelsParsed = JSON.parse(
        chartOrderStatistics?.dataset.eventTitles || "[]"
    );
    const seriesParsed = JSON.parse(
        chartOrderStatistics?.dataset.eventAttendees || "[]"
    );

    const orderLabelsRaw = toArray(labelsParsed);
    const orderSeriesRaw = toArray(seriesParsed);

    // Coerce series to finite numbers
    const numericSeries = orderSeriesRaw
        .map((v) => (typeof v === "string" && v.trim() !== "" ? Number(v) : v))
        .map((v) => (Number.isFinite(v) ? v : 0));

    // Align lengths
    const orderCount = Math.min(orderLabelsRaw.length, numericSeries.length);
    const orderLabels = orderLabelsRaw.slice(0, orderCount);
    const orderSeries = numericSeries.slice(0, orderCount);

    // Calculate dynamic height based on number of countries
    // Base chart height + legend height (approximately 25px per item)
    const legendHeight = Math.max(100, orderCount * 25);
    const chartHeight = 330 + Math.max(0, legendHeight - 100);

    if (chartOrderStatistics) {
        chartOrderStatistics.style.width = "100%";
        chartOrderStatistics.style.minWidth = "330px";
        chartOrderStatistics.style.minHeight = `${chartHeight + 60}px`;
    }

    // Base color palette
    const baseColors = [
        config.colors.primary,
        config.colors.success,
        config.colors.info,
        config.colors.warning,
        config.colors.danger,
        config.colors.secondary,
    ];

    // Extend colors if needed
    while (baseColors.length < orderSeries.length) {
        baseColors.push(
            "#" + Math.floor(Math.random() * 16777215).toString(16)
        );
    }

    const orderChartConfig = {
        chart: {
            height: chartHeight,
            width: "100%",
            type: "donut",
        },
        labels: orderLabels,
        series: orderSeries,
        colors: baseColors,
        stroke: {
            width: 3,
            colors: cardColor,
        },
        dataLabels: {
            enabled: false,
            formatter: function (val, opt) {
                return parseInt(val) + "%";
            },
        },
        legend: {
            show: true,
            position: "bottom",
            horizontalAlign: "center",
            markers: { width: 10, height: 10, radius: 12 },
            itemMargin: { horizontal: 8, vertical: 6 },
            floating: false,
            height: legendHeight,
            scrollable: true,
        },
        grid: {
            padding: {
                top: 0,
                bottom: 0,
                left: 0,
                right: 0,
            },
        },
        plotOptions: {
            pie: {
                donut: {
                    size: "70%",
                    labels: {
                        show: false,
                        total: {
                            show: true,
                            fontSize: "0.8rem",
                            color: axisColor,
                            label: "Total",
                            formatter: function (w) {
                                const total = w.globals.seriesTotals.reduce(
                                    (a, b) => a + b,
                                    0
                                );
                                return total.toString();
                            },
                        },
                    },
                },
            },
        },
    };

    if (
        typeof chartOrderStatistics !== "undefined" &&
        chartOrderStatistics !== null
    ) {
        const statisticsChart = new ApexCharts(
            chartOrderStatistics,
            orderChartConfig
        );
        statisticsChart.render();
    }

    // Attendance by Hour Chart - Area chart
    // --------------------------------------------------------------------
    const incomeChartEl = document.querySelector("#incomeChart"),
        incomeChartConfig = {
            series: [
                {
                    data: JSON.parse(
                        document.querySelector("#incomeChart")?.dataset
                            .attendanceByHour || "[0,0,0,0,0,0,0,0]"
                    ),
                },
            ],
            chart: {
                height: 215,
                parentHeightOffset: 0,
                parentWidthOffset: 0,
                toolbar: {
                    show: false,
                },
                type: "area",
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                width: 2,
                curve: "smooth",
            },
            legend: {
                show: false,
            },
            markers: {
                size: 6,
                colors: "transparent",
                strokeColors: "transparent",
                strokeWidth: 5,
                discrete: [
                    {
                        fillColor: config.colors.white,
                        seriesIndex: 0,
                        dataPointIndex: 7,
                        strokeColor: config.colors.success,
                        strokeWidth: 2,
                        size: 6,
                        radius: 8,
                    },
                ],
                hover: {
                    size: 7,
                },
            },
            colors: [config.colors.success],
            fill: {
                type: "gradient",
                gradient: {
                    shade: shadeColor,
                    shadeIntensity: 0.6,
                    opacityFrom: 0.5,
                    opacityTo: 0.25,
                    stops: [0, 95, 100],
                },
            },
            grid: {
                borderColor: borderColor,
                strokeDashArray: 3,
                padding: {
                    top: -20,
                    bottom: -8,
                    left: -10,
                    right: 8,
                },
            },
            xaxis: {
                categories: [
                    "9AM",
                    "10AM",
                    "11AM",
                    "12PM",
                    "1PM",
                    "2PM",
                    "3PM",
                    "4PM",
                ],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: true,
                    style: {
                        fontSize: "13px",
                        colors: axisColor,
                    },
                },
            },
            yaxis: {
                labels: {
                    show: false,
                },
                min: 0,
                max: 50,
                tickAmount: 4,
            },
        };
    if (typeof incomeChartEl !== undefined && incomeChartEl !== null) {
        const incomeChart = new ApexCharts(incomeChartEl, incomeChartConfig);
        incomeChart.render();
    }

    // Attendance Per Hour Mini Chart - Radial Chart
    // --------------------------------------------------------------------
    const weeklyExpensesEl = document.querySelector("#expensesOfWeek"),
        weeklyExpensesConfig = {
            series: [
                parseInt(
                    document.querySelector("#expensesOfWeek")?.dataset
                        .attendancePerHour || 0
                ),
            ],
            chart: {
                width: 60,
                height: 60,
                type: "radialBar",
            },
            plotOptions: {
                radialBar: {
                    startAngle: 0,
                    endAngle: 360,
                    strokeWidth: "8",
                    hollow: {
                        margin: 2,
                        size: "45%",
                    },
                    track: {
                        strokeWidth: "50%",
                        background: borderColor,
                    },
                    dataLabels: {
                        show: true,
                        name: {
                            show: false,
                        },
                        value: {
                            formatter: function (val) {
                                return parseInt(val) + "/hr";
                            },
                            offsetY: 5,
                            color: "#697a8d",
                            fontSize: "13px",
                            show: true,
                        },
                    },
                },
            },
            fill: {
                type: "solid",
                colors: config.colors.success,
            },
            stroke: {
                lineCap: "round",
            },
            grid: {
                padding: {
                    top: -10,
                    bottom: -15,
                    left: -10,
                    right: -10,
                },
            },
            states: {
                hover: {
                    filter: {
                        type: "none",
                    },
                },
                active: {
                    filter: {
                        type: "none",
                    },
                },
            },
        };
    if (typeof weeklyExpensesEl !== undefined && weeklyExpensesEl !== null) {
        const weeklyExpenses = new ApexCharts(
            weeklyExpensesEl,
            weeklyExpensesConfig
        );
        weeklyExpenses.render();
    }
})();
