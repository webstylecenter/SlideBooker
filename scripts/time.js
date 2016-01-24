/**
 * Created by petervandam on 24/01/16.
 */

function countTimeUp(time) {

    time = time.split(':');
    time[1] = parseInt(time[1]) + 15;
    if (time[1] == 60) {
        time[1] = '00';
        time[0] = parseInt(time[0]) + 1;
    }

    time = time[0] + ':' + time[1];

    $(".hour").find("[data-endtime='"+time+"']").attr('data-taken', 'yes');
    return time;

}

function countTimeDown(time) {

    $(".hour").find("[data-endtime='"+time+"']").attr('data-taken', 'no');

    time = time.split(':');
    time[1] = parseInt(time[1]) - 15;
    if (time[1] == -15) {
        time[1] = '45';
        time[0] = parseInt(time[0]) - 1;
    }

    if (time[0] < 10) {time[0] = '0'+time[0];}
    time = time[0] + ':' + time[1];
    return time;

}

function calculateTime(starttime, endtime) {

    var startDate = new Date('2016-01-01T' + starttime + ':00Z');
    var endDate = new Date('2016-01-01T'+endtime+':00Z');
    var difference = new Date(endDate - startDate);

    var hours = difference.getHours()-1;
    var minutes = difference.getMinutes();

    if (isNaN(hours)) { hours = 0; }
    if (isNaN(minutes)) { minutes = 0; }
    if (minutes < 10) { minutes = '0'+minutes; }

    return hours + ":" + minutes;

}
