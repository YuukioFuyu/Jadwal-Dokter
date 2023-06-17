        <script type="text/javascript">
            $(function () {
                $('#penjualan_chart').highcharts({
                    chart: {
                        zoomType: 'x'
                    },
                    title: {
                        text: 'Total Penjualan 4SMARTPHONE'
                    },
                    xAxis: {
                        type: 'datetime',
                        minRange: 14 * 24 * 3600000 // fourteen days
                    },
                    yAxis: {
                        title: {
                            text: 'Total Penjualan'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        area: {
                            fillColor: {
                                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
                                stops: [
                                    [0, Highcharts.getOptions().colors[0]],
                                    [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                                ]
                            },
                            marker: {
                                radius: 2
                            },
                            lineWidth: 1,
                            states: {
                                hover: {
                                    lineWidth: 1
                                }
                            },
                            threshold: null
                        }
                    },

                    series: [{
                        type: 'area',
                        name: 'Total Penjualan',
                        pointInterval: 24 * 3600 * 1000,
        //                pointStart: Date.UTC(2006, 0, 01),
                        <?php
                            $a = explode("-", $min);
                            echo "pointStart: Date.UTC(" . $a[0] . ", " . ($a[1] - 1) . ", " . $a[2] . "),\n";
                        ?>
                        data: [
                            <?php
                            $i = 0;
                            foreach ($grafik as $g):
                                if ($i == 0) {
                                    echo $g["total"];
                                    $i++;
                                } else {
                                    echo ', ' . $g["total"];
                                }
                            endforeach;
                            ?>
                        ]
                    }]
                });
            });

            $(function () {
                $('#laba_chart').highcharts({
                    chart: {
                        zoomType: 'x'
                    },
                    title: {
        //                text: 'USD to EUR exchange rate from 2006 through 2008'
                        text: 'Total Laba 4SMARTPHONE'
                    },
        //            subtitle: {
        //                text: document.ontouchstart === undefined ?
        //                    'Click and drag in the plot area to zoom in' :
        //                    'Pinch the chart to zoom in'
        //            },
                    xAxis: {
                        type: 'datetime',
                        minRange: 14 * 24 * 3600000 // fourteen days
                    },
        //            yAxis: {
        //                title: {
        //                    text: 'Exchange rate'
        //                }
        //            },
                    yAxis: {
                        title: {
                            text: 'Total Laba'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        area: {
                            fillColor: {
                                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
                                stops: [
                                    [0, Highcharts.getOptions().colors[0]],
                                    [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                                ]
                            },
                            marker: {
                                radius: 2
                            },
                            lineWidth: 1,
                            states: {
                                hover: {
                                    lineWidth: 1
                                }
                            },
                            threshold: null
                        }
                    },

                    series: [{
                        type: 'area',
        //                name: 'USD to EUR',
                        name: 'Total Laba',
                        pointInterval: 24 * 3600 * 1000,
        //                pointStart: Date.UTC(2006, 0, 01),
                        <?php
                            $a = explode("-", $min);
                            echo "pointStart: Date.UTC(" . $a[0] . ", " . ($a[1] - 1) . ", " . $a[2] . "),\n";
                        ?>
                        data: [
                            <?php
                            $i = 0;
                            foreach ($grafik as $g):
                                if ($i == 0) {
                                    echo $g["total"];
                                    $i++;
                                } else {
                                    echo ', ' . $g["total"];
                                }
                            endforeach;
                            ?>
                        ]
                    }]
                });
            });
        </script>