"use strict";

var options;
var urlGraph = null;
var label;
var range;
var graph;
var x;
var z;
var startDate;
var endDate;

var windowSize = window.matchMedia("(max-width: 768px)");
var windowSize2 = window.matchMedia("(max-width: 375px)");
var windowSize3 = window.matchMedia("(max-width: 280px)");

$(function () {

    function hideCalendar() {
        $('#dp').hide();
        $('#week-picker-wrapper').hide();
        $('#mp').hide();
        $('#yp').hide();
        dropdown_size_change(0);
    }

    $(document).click(function (e) {
        hideCalendar();
    });

    function dropdown_size_change(option) {
        if (option == 1) {
            $("#periodeDropdown").removeClass("col-md-3");
            $("#periodeDropdown").addClass("col-md-2");
        } else {
            $("#periodeDropdown").removeClass("col-md-1");
            $("#periodeDropdown").addClass("col-md-3");
        }
    }

    hideCalendar();

    function periodeActive(id) {
        $('#periodeDropdown li').parent().find('a.dropdown-item.active').removeClass('active');
        $('#periodeDropdown li#' + id + ' a.dropdown-item').addClass('active');
    }

    var date_today = moment().format("YYYY/MM/DD");
    var date_yesterday = moment().subtract(1, 'days').format("YYYY/MM/DD");
    var date_last7day = moment().subtract(8, 'days').format("YYYY/MM/DD");
    var date_last30day = moment().subtract(31, 'days').format("YYYY/MM/DD");

    var extLang = $('#periodeDropdown li#realtime').text();

    $('#periode').val(extLang + ' : ' + '' + moment().utcOffset('+0700').set({
        minute: 0,
        second: 0,
        millisecond: 0
    }).format("H:mm") + ' (GMT+7)');

    function periodeHover() {
        $('#periodeDropdown li').hover(function (e) {
            e.preventDefault();
            var p_li_id = $(this).attr('id');
            if (p_li_id == 'realtime') {
                hideCalendar();
                $('#periodeDropdown li#' + p_li_id + ' a').attr('title', date_today);
                $('#periodeDropdown li#' + p_li_id + ' a').tooltip({
                    html: true
                });
            } else if (p_li_id == 'yesterday') {
                hideCalendar();
                $('#periodeDropdown li#' + p_li_id + ' a').attr('title', date_yesterday);
                $('#periodeDropdown li#' + p_li_id + ' a').tooltip({
                    html: true
                });
            } else if (p_li_id == '7days') {
                hideCalendar();
                $('#periodeDropdown li#' + p_li_id + ' a').attr('title', date_last7day + '-' + date_yesterday);
                $('#periodeDropdown li#' + p_li_id + ' a').tooltip({
                    html: true
                });
            } else if (p_li_id == '30days') {
                hideCalendar();
                $('#periodeDropdown li#' + p_li_id + ' a').attr('title', date_last30day + '-' + date_yesterday);
                $('#periodeDropdown li#' + p_li_id + ' a').tooltip({
                    html: true
                });
            } else if (p_li_id == 'day') {
                dropdown_size_change(1);
                $('#dp').show();
                $('#week-picker-wrapper').hide();
                $('#mp').hide();
                $('#yp').hide();
            } else if (p_li_id == 'week') {
                dropdown_size_change(1);
                $('#dp').hide();
                $('#week-picker-wrapper').show();
                $('#mp').hide();
                $('#yp').hide();
            } else if (p_li_id == 'month') {
                dropdown_size_change(1);
                $('#dp').hide();
                $('#week-picker-wrapper').hide();
                $('#mp').show();
                $('#yp').hide();
            } else if (p_li_id == 'year') {
                dropdown_size_change(1);
                $('#dp').hide();
                $('#week-picker-wrapper').hide();
                $('#mp').hide();
                $('#yp').show();
            }
        });
    }

    if (!windowSize.matches && !windowSize2.matches && !windowSize3.matches) {
        periodeHover();
    }

    $(window).resize(function () {
        if (!windowSize.matches && !windowSize2.matches && !windowSize3.matches) {
            periodeHover();
        }
    });

    $('#periodeDropdown li.list-select').click(function (e) {
        e.preventDefault();

        var p_li_id = $(this).attr('id');
        var lbl = $(this).text();

        if (p_li_id == 'realtime') {
            hideCalendar();
            $('#periode').val('Realtime : ' + '' + moment().utcOffset('+0700').set({
                minute: 0,
                second: 0,
                millisecond: 0
            }).format("H:mm") + ' (GMT+7)');
            z = date_today + "%20-%20" + date_today;
            graphRealtime(date_today);

        } else if (p_li_id == 'yesterday') {
            hideCalendar();
            $('#periode').val(lbl + ' : ' + date_yesterday + ' (GMT+7)');
            z = date_yesterday + "%20-%20" + date_yesterday;
            graphDay(date_yesterday);

        } else if (p_li_id == '7days') {
            hideCalendar();
            $('#periode').val('Last 7 Days' + ' : ' + date_last7day + " - " + date_yesterday + ' (GMT+7)');
            z = date_last7day + "%20-%20" + date_yesterday;
            graphLastweek(date_last7day, date_yesterday);

        } else if (p_li_id == '30days') {
            hideCalendar();
            $('#periode').val(lbl + ' : ' + date_last30day + " - " + date_yesterday + ' (GMT+7)');
            z = date_last30day + "%20-%20" + date_yesterday;
            graphLastmonth(date_last30day, date_yesterday);
        }

        periodeActive(p_li_id);
        hideCalendar();

        $('#dp').datepicker('hide');
        $('#week-picker-wrapper').datepicker('hide');
        $('#mp').datepicker('hide');
        $('#yp').datepicker('hide');

        // if (p_li_id == 'day') {
        //     e.stopPropagation();
        //     dropdown_size_change(1);
        //     $('#dp').show();
        //     $('#week-picker-wrapper').hide();
        //     $('#mp').hide();
        //     $('#yp').hide();
        // } else if (p_li_id == 'week') {
        //     e.stopPropagation();
        //     dropdown_size_change(1);
        //     $('#dp').hide();
        //     $('#week-picker-wrapper').show();
        //     $('#mp').hide();
        //     $('#yp').hide();
        // } else if (p_li_id == 'month') {
        //     e.stopPropagation();
        //     dropdown_size_change(1);
        //     $('#dp').hide();
        //     $('#week-picker-wrapper').hide();
        //     $('#mp').show();
        //     $('#yp').hide();
        // } else if (p_li_id == 'year') {
        //     e.stopPropagation();
        //     dropdown_size_change(1);
        //     $('#dp').hide();
        //     $('#week-picker-wrapper').hide();
        //     $('#mp').hide();
        //     $('#yp').show();
        // }
    });

    $('#periodeDropdown li.list-select-calendar').click(function (e) {
        e.preventDefault();

        var p_li_id = $(this).attr('id');
        var lbl = $(this).text();

        if (p_li_id == 'day') {
            e.stopPropagation();

            dropdown_size_change(1);

            $('#dp').show();
            $('#week-picker-wrapper').hide();
            $('#mp').hide();
            $('#yp').hide();

        } else if (p_li_id == 'week') {
            e.stopPropagation();

            dropdown_size_change(1);

            $('#dp').hide();
            $('#week-picker-wrapper').show();
            $('#mp').hide();
            $('#yp').hide();

        } else if (p_li_id == 'month') {
            e.stopPropagation();

            dropdown_size_change(1);

            $('#dp').hide();
            $('#week-picker-wrapper').hide();
            $('#mp').show();
            $('#yp').hide();

        } else if (p_li_id == 'year') {
            e.stopPropagation();

            dropdown_size_change(1);

            $('#dp').hide();
            $('#week-picker-wrapper').hide();
            $('#mp').hide();
            $('#yp').show();
        }
    });
    //day picker
    var start_date, end_date;

    function set_day_picker(date) {

        start_date = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        end_date = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        $('#dp').datepicker('update', start_date);
        $('#periode').val($('#lang_Day').val() + ' : ' + moment(start_date).format('MM/DD/YYYY') + ' (GMT+7)');
        z = (start_date.getMonth() + 1) + '/' + start_date.getDate() + '/' + start_date.getFullYear() + '%20-%20' + (end_date.getMonth() + 1) + '/' + end_date.getDate() + '/' + end_date.getFullYear();

        var date = (start_date.getMonth() + 1) + '/' + start_date.getDate() + '/' + start_date.getFullYear();
        graphDay(date);
        // loadGraph(x);

        periodeActive('dp');
        hideCalendar();

        $('#dp').datepicker('hide');
        $("#periodeDropdown").dropdown("toggle");
    }

    $('#dp').datepicker({
        autoclose: true,
        forceParse: false,
        showWeek: true,
        todayHighlight: true,
        startDate: new Date(new Date().getFullYear() - 2, '0', '01'),
        endDate: new Date(new Date().getFullYear(), moment().month(), moment().date() - 1),
    }).on("changeDate", function (e) {
        set_day_picker(e.date);
    });

    //week picker
    function set_week_picker(date) {
        start_date = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay());
        end_date = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 6);
        $('#week-picker-wrapper').datepicker('update', start_date);
        $('#periode').val($('#lang_Week').val() + ' : ' + (start_date.getMonth() + 1) + '/' + start_date.getDate() + '/' + start_date.getFullYear() + ' - ' + (end_date.getMonth() + 1) + '/' + end_date.getDate() + '/' + end_date.getFullYear());
        z = (start_date.getMonth() + 1) + '/' + start_date.getDate() + '/' + start_date.getFullYear() + '%20-%20' + (end_date.getMonth() + 1) + '/' + end_date.getDate() + '/' + end_date.getFullYear();
        // loadGraph(x);

        var start = (start_date.getMonth() + 1) + '/' + start_date.getDate() + '/' + start_date.getFullYear();
        var end = (end_date.getMonth() + 1) + '/' + end_date.getDate() + '/' + end_date.getFullYear();
        graphWeek(start, end);

        periodeActive('wp');
        hideCalendar();
        $('#week-picker-wrapper').datepicker('hide');
        $("#periodeDropdown").dropdown("toggle");
    }
    $('#week-picker-wrapper').datepicker({
        autoclose: true,
        forceParse: false,
        showWeek: true,
        todayHighlight: true,
        startDate: new Date(new Date().getFullYear() - 2, '0', '01'),
        endDate: new Date(new Date().getFullYear(), moment().month(), moment().date() - 1),
        container: '#week-picker-wrapper',
    }).on("changeDate", function (e) {
        set_week_picker(e.date);
    });

    //month picker
    function set_month_picker(date) {
        start_date = new Date(date.getFullYear(), date.getMonth(), 1);
        end_date = new Date(date.getFullYear(), date.getMonth() + 1, 0);
        $('#mp').datepicker('update', start_date);
        $('#periode').val($('#lang_Month').val() + ' : ' + (start_date.getMonth() + 1) + '/' + start_date.getDate() + '/' + start_date.getFullYear() + ' - ' + (end_date.getMonth() + 1) + '/' + end_date.getDate() + '/' + end_date.getFullYear());
        z = (start_date.getMonth() + 1) + '/' + start_date.getDate() + '/' + start_date.getFullYear() + '%20-%20' + (end_date.getMonth() + 1) + '/' + end_date.getDate() + '/' + end_date.getFullYear();

        var start = start_date.getFullYear() + '-' + (start_date.getMonth() + 1) + '-' + start_date.getDate();
        var end = end_date.getFullYear() + '-' + (end_date.getMonth() + 1) + '-' + end_date.getDate();

        graphMonth(start, end);

        periodeActive('mp');
        hideCalendar();
        $('#mp').datepicker('hide');
        $("#periodeDropdown").dropdown("toggle");
    }

    $('#mp').datepicker({
        autoclose: true,
        forceParse: false,
        todayHighlight: true,
        minViewMode: 1,
        startDate: new Date(new Date().getFullYear() - 2, '0', '01'),
        endDate: new Date(new Date().getFullYear(), moment().month(), moment().date()),
    }).on("changeDate", function (e) {
        set_month_picker(e.date);
    });

    //year picker
    function set_year_picker(date) {
        start_date = new Date(date.getFullYear(), date.getMonth(), 1);
        end_date = new Date(date.getFullYear() + 1, 0, 0);

        $('#yp').datepicker('update', start_date);
        $('#periode').val($('#lang_Year').val() + ' : ' + (start_date.getMonth() + 1) + '/' + start_date.getDate() + '/' + start_date.getFullYear() + ' - ' + (end_date.getMonth() + 1) + '/' + end_date.getDate() + '/' + end_date.getFullYear());
        z = (start_date.getMonth() + 1) + '/' + start_date.getDate() + '/' + start_date.getFullYear() + '%20-%20' + (end_date.getMonth() + 1) + '/' + end_date.getDate() + '/' + end_date.getFullYear();

        var start = start_date.getFullYear() + '-' + (start_date.getMonth() + 1) + '-' + start_date.getDate();
        var end = end_date.getFullYear() + '-' + (end_date.getMonth() + 1) + '-' + end_date.getDate();

        graphYear(start, end);

        periodeActive('yp');
        hideCalendar();
        $('#yp').datepicker('hide');
        $("#periodeDropdown").dropdown("toggle");
    }
    $('#yp').datepicker({
        autoclose: true,
        forceParse: false,
        todayHighlight: true,
        minViewMode: 2,
        startDate: new Date(new Date().getFullYear() - 1, '0', '01'),
        endDate: new Date(new Date().getFullYear(), moment().month(), moment().date()),
    }).on("changeDate", function (e) {
        set_year_picker(e.date);
    });
});
