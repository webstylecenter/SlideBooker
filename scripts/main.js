/**
 * Created by petervandam on 13/01/16.
 */
$(function() {
    $( ".resizable" ).resizable({
        grid: 40,
        maxHeight: 50,
        minHeight: 50
    });

    $(".draggable").draggable({
        snap: ".quarter",
    });

    $(".quarter").droppable({
        drop: function(event, ui) {
            $(this).css('background-color', "whitesmoke");
        },
        tolerance: "touch",
        hoverClass: "active"
    });
});
