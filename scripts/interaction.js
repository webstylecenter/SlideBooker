/**
 * Created by petervandam on 24/01/16.
 */

function addInteraction() {
    $('.resizable').each(function() {
        if($(this).not('.ui-resizable')) {
            $( this ).resizable({
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
                },
                stop: function(event, ui) {
                    var starttime = $(this).find('.startime').html();
                    var endtime = $(this).find('.endtime').html();
                    $(this).find('.tasktime').html(calculateTime(starttime, endtime));
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
