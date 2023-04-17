<?php 
include("sales_data_fetch.php");
?>
<script>
! function(o) {
    "use strict";

    function e() {}
    e.prototype.initCharts = function() {
        window.Apex = {
            chart: {
                parentHeightOffset: 0,
                toolbar: {
                    show: !1
                }
            },
            grid: {
                padding: {
                    left: 0,
                    right: 0
                }
            },
            colors: ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"]
        };
        var e = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"],
            t = o("#sales-weekly-chart").data("colors"),
            r = {
                chart: {
                    height: 270,
                    type: "bar",
                    dropShadow: {
                        enabled: !0,
                        opacity: .2,
                        blur: 7,
                        left: -7,
                        top: 7
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    curve: "smooth",
                    width: 4
                },
                series: [{
                    name: "Current Week",
                    data: [
                        <?php echo $salesThisMon.','.$salesThisTue.','.$salesThisWed.','.$salesThisThu.','.$salesThisFri; ?>
                    ]

                }, {
                    name: "Previous Week",
                    data: [
                        <?php echo $salesLastMon.','.$salesLastTue.','.$salesLastWed.','.$salesLastThu.','.$salesLastFri; ?>
                    ]
                }],
                colors: e = t ? t.split(",") : e,
                zoom: {
                    enabled: !1
                },
                legend: {
                    show: !1
                },
                xaxis: {
                    type: "string",
                    categories: ["Mon", "Tue", "Wed", "Thu", "Fri"],
                    tooltip: {
                        enabled: !1
                    },
                    axisBorder: {
                        show: !1
                    }
                },
                grid: {
                    strokeDashArray: 7
                },
                yaxis: {
                    labels: {
                        formatter: function(e) {
                            return e + " Sales"
                        },
                        offsetX: -15
                    }
                }
            };
        e = (new ApexCharts(document.querySelector("#sales-weekly-chart"), r).render(), ["#727cf5", "#e3eaef"]);
    }, e.prototype.init = function() {
        this.initCharts()
    }, o.Dashboard = new e, o.Dashboard.Constructor = e
}(window.jQuery),
function(t) {
    "use strict";
    t(document).ready(function(e) {
        t.Dashboard.init()
    })
}(window.jQuery);
</script>