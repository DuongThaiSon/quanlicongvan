$(document).ready(function () {
    $(".continue-js").click(function () {
        $("#create-cv").addClass("d-none");
        $(".form-themcv").addClass("d-block");
    });

    $(".back-js").click(function () {
        $(".form-themcv").removeClass("d-block");
        $("#create-cv").removeClass("d-none");
    });

    // $('input[name="username"],input[name="pass"]').focus(function () {
    //     $(this).prev().animate({
    //         'opacity': '1'
    //     }, 200);
    // });
    // $('input[name="username"],input[name="pass"]').blur(function () {
    //     $(this).prev().animate({
    //         'opacity': '.5'
    //     }, 200);
    // });
    // $('input[name="username"],input[name="pass"]').keyup(function () {
    //     if (!$(this).val() == '') {
    //         $(this).next().animate({
    //             'opacity': '1',
    //             'right': '30'
    //         }, 200);
    //     } else {
    //         $(this).next().animate({
    //             'opacity': '0',
    //             'right': '20'
    //         }, 200);
    //     }
    // });

    // $('.login-signup a').click(function () {
    //     $('form').animate({
    //         height: "toggle",
    //         opacity: "toggle"
    //     }, "slow")
    // });

    $('.btn-toggle').click(function () {
        $('.master').toggleClass('is-collapsed');
    });



    var readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);

            hideUploadText();
        }
    }
    $(".file-upload").on('change', function () {
        readURL(this);
    });

    $(".upload-button").on('click', function () {
        $(".file-upload").click();
    });

    function hideUploadText() {
        $('.choose-avatar').addClass('d-none');
    }

    $('.btn-fix-info').click(function () {
        $('.list').toggleClass('d-block');
    })

    $('.input-search').click(function () {
        $('.advance').toggleClass('d-block');
    })

    $('.btn-discard').click(function () {
        $('.advance').removeClass('d-block');
    })

    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    //WidgetChart 1
    var ctx = document.getElementById("widgetChart1");
    if (ctx) {
        ctx.height = 130;
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                type: 'line',
                datasets: [{
                    data: [78, 81, 80, 45, 34, 12, 40],
                    label: 'Dataset',
                    backgroundColor: 'rgba(255,255,255,.1)',
                    borderColor: 'rgba(255,255,255,.55)',
                }, ]
            },
            options: {
                maintainAspectRatio: true,
                legend: {
                    display: false
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                },
                responsive: true,
                scales: {
                    xAxes: [{
                        gridLines: {
                            color: 'transparent',
                            zeroLineColor: 'transparent'
                        },
                        ticks: {
                            fontSize: 2,
                            fontColor: 'transparent'
                        }
                    }],
                    yAxes: [{
                        display: false,
                        ticks: {
                            display: false,
                        }
                    }]
                },
                title: {
                    display: false,
                },
                elements: {
                    line: {
                        borderWidth: 0
                    },
                    point: {
                        radius: 0,
                        hitRadius: 10,
                        hoverRadius: 4
                    }
                }
            }
        });
    }


    //WidgetChart 2
    var ctx = document.getElementById("widgetChart2");
    if (ctx) {
        ctx.height = 130;
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                type: 'line',
                datasets: [{
                    data: [1, 18, 9, 17, 34, 22],
                    label: 'Dataset',
                    backgroundColor: 'transparent',
                    borderColor: 'rgba(255,255,255,.55)',
                }, ]
            },
            options: {

                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                responsive: true,
                tooltips: {
                    mode: 'index',
                    titleFontSize: 12,
                    titleFontColor: '#000',
                    bodyFontColor: '#000',
                    backgroundColor: '#fff',
                    titleFontFamily: 'Montserrat',
                    bodyFontFamily: 'Montserrat',
                    cornerRadius: 3,
                    intersect: false,
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            color: 'transparent',
                            zeroLineColor: 'transparent'
                        },
                        ticks: {
                            fontSize: 2,
                            fontColor: 'transparent'
                        }
                    }],
                    yAxes: [{
                        display: false,
                        ticks: {
                            display: false,
                        }
                    }]
                },
                title: {
                    display: false,
                },
                elements: {
                    line: {
                        tension: 0.00001,
                        borderWidth: 1
                    },
                    point: {
                        radius: 4,
                        hitRadius: 10,
                        hoverRadius: 4
                    }
                }
            }
        });
    }


    //WidgetChart 3
    var ctx = document.getElementById("widgetChart3");
    if (ctx) {
        ctx.height = 130;
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                type: 'line',
                datasets: [{
                    data: [65, 59, 84, 84, 51, 55],
                    label: 'Dataset',
                    backgroundColor: 'transparent',
                    borderColor: 'rgba(255,255,255,.55)',
                }, ]
            },
            options: {

                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                responsive: true,
                tooltips: {
                    mode: 'index',
                    titleFontSize: 12,
                    titleFontColor: '#000',
                    bodyFontColor: '#000',
                    backgroundColor: '#fff',
                    titleFontFamily: 'Montserrat',
                    bodyFontFamily: 'Montserrat',
                    cornerRadius: 3,
                    intersect: false,
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            color: 'transparent',
                            zeroLineColor: 'transparent'
                        },
                        ticks: {
                            fontSize: 2,
                            fontColor: 'transparent'
                        }
                    }],
                    yAxes: [{
                        display: false,
                        ticks: {
                            display: false,
                        }
                    }]
                },
                title: {
                    display: false,
                },
                elements: {
                    line: {
                        borderWidth: 1
                    },
                    point: {
                        radius: 4,
                        hitRadius: 10,
                        hoverRadius: 4
                    }
                }
            }
        });
    }


    //WidgetChart 4
    var ctx = document.getElementById("widgetChart4");
    if (ctx) {
        ctx.height = 115;
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: "My First dataset",
                    data: [78, 81, 80, 65, 58, 75, 60, 75, 65, 60, 60, 75],
                    borderColor: "transparent",
                    borderWidth: "0",
                    backgroundColor: "rgba(255,255,255,.3)"
                }]
            },
            options: {
                maintainAspectRatio: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        display: false,
                        categoryPercentage: 1,
                        barPercentage: 0.65
                    }],
                    yAxes: [{
                        display: false
                    }]
                }
            }
        });
    };

    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
});
