/**
 * Created by petervandam on 24/01/16.
 */

function addInteraction() {

    resizeSize = 0;

    $('.task').each(function() {
        $(this).uniqueId();
    });

    $('.resizable').each(function() {
        if($(this).not('.ui-resizable')) {
            $(this).resizable({
                grid: 40,
                maxHeight: 50,
                minHeight: 50,
                start: function(event, ui) {
                    resizeSize = ui.size.width;
                },
                resize: function(event, ui) {
                    var amount = (ui.size.width - resizeSize) / 40;
                    if (amount > 0) {
                        $(this).find('.endtime').html(countTimeUp($(this).find('.endtime').html(), amount));
                    } else {
                        $(this).find('.endtime').html(countTimeDown($(this).find('.endtime').html(), amount));
                    }
                    resizeSize = ui.size.width;
                },
                stop: function(event, ui) {
                    var starttime = $(this).find('.startime').html();
                    var endtime = $(this).find('.endtime').html();
                    $(this).find('.tasktime').html(calculateTime(starttime, endtime));
                    gapFiller();
                }
            });
        };
    });
    $('.draggable').each(function() {
        if($(this).not('ui-draggable')) {
            $(".draggable").draggable({
                snap: ".quarter",
                start: function(event, ui) {

                },
                stop: function(event, ui) {
                    var starttime = $(this).find('.startime').html();
                    var endtime = $(this).find('.endtime').html();
                    $(this).find('.tasktime').html(calculateTime(starttime, endtime));
                }
            });
        }
    });
    $('.quarter').each(function() {
        if($(this).not('ui-droppable')) {
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
                    $(this).attr('data-taken', $(ui.draggable).attr('id'));
                    gapFiller();
                },
                over: function(event, ui) {

                },
                activate: function(event, ui) {
                    first = true;
                },
                tolerance: "touch",
                hoverClass: "active"
            });
        }
    });
}
