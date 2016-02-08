/**
 * Created by petervandam on 24/01/16.
 */

function addInteraction() {

    resizeSize = 0;

    $('.task').each(function() {
        $(this).uniqueId();
    });

    $('.draggable').each(function() {
        if($(this).not('ui-draggable')) {
            $(".draggable").draggable({
                snap: ".droppable"
            });
        }
    });

    $('.droppable').each(function() {
        if($(this).not('ui-droppable')) {
            $(".droppable").droppable({
                drop: function(event, ui) {
                    var projectSelector = '#' + $(this).attr('data-selector');
                    $(projectSelector).val($(ui.draggable).attr('data-projectvalue'))
                    $(this).val($(ui.draggable).attr('data-task'));
                    $(ui.draggable).fadeOut('slow');
                    gapFiller();
                },
                hoverClass: "active"
            });
        }
    });
}
