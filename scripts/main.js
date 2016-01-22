/**
 * Created by petervandam on 13/01/16.
 */
$(function() {
    $( ".resizable" ).resizable({
        grid: 40,
        maxHeight: 50,
        minHeight: 50,
        resize: function(event, ui) {

            var amount = (ui.size.width - ui.originalSize.width) / 40;
            if (amount > 0) {
                $(this).find('.endtime').html(countTimeUp($(this).find('.endtime').html(), amount));
            } else {
                $(this).find('.endtime').html(countTimeDown($(this).find('.endtime').html(), amount));
            }
        }
    });

    $(".draggable").draggable({
        snap: ".quarter",
        start: function(event, ui) {

        }
    });

    $(".quarter").droppable({
        drop: function(event, ui) {
            var starttime = $(this).data('starttime');
            var endtime = $(this).data('endtime');
            if (true === first) {
                $(ui.draggable).find('.startime').html(starttime);
                first = false;
            } else {
                $(ui.draggable).find('.endtime').html(endtime);
            }
        },
        over: function(event, ui) {


        },
        activate: function(event, ui) {
            first = true;
        },
        tolerance: "touch",
        hoverClass: "active"
    });
});


function countTimeUp(time) {

    time = time.split(':');
    time[1] = parseInt(time[1]) + 15;
    if (time[1] == 60) {
        time[1] = '00';
        time[0] = parseInt(time[0]) + 1;
    }

    time = time[0] + ':' + time[1];
    return time;

}

function countTimeDown(time) {

    time = time.split(':');
    time[1] = parseInt(time[1]) - 15;
    if (time[1] == -15) {
        time[1] = '45';
        time[0] = parseInt(time[0]) - 1;
    }

    time = time[0] + ':' + time[1];
    return time;


}
