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
                snap: ".droppable",
                start: function(event, ui) {

                },
                stop: function(event, ui) {

                }
            });
        }
    });
    $('.droppable').each(function() {
        if($(this).not('ui-droppable')) {
            $(".droppable").droppable({
                drop: function(event, ui) {

                    gapFiller();
                },
                over: function(event, ui) {

                },
                activate: function(event, ui) {
                    first = true;
                },
                hoverClass: "active"
            });
        }
    });
}
