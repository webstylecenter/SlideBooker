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

function enableNextRow(nr) {
    nr++;
    enableRow(nr);
}

function enableRow(nr) {
    $('#row'+nr).find('*').each(function() {
        $(this).prop('disabled', false);
    });
}

function updateTime(el, nr) {
    var selectedTime = $(el).val();
    setNextStartTime(nr, selectedTime);
    updateAmountOfTime(nr);
    enableNextRow(nr);
}

function setNextStartTime(nr, selectedTime) {
    var timeInfo = selectedTime.split(':');
    var hour = timeInfo[0];
    var minute = timeInfo[1];
    nr++;

    if ($('#starttijd'+nr).val() == '09:00') {
        $('#starttijd'+nr).val(selectedTime);

        // Set next time
        minute = parseInt(minute) + 15;
        if (minute == 60) {
            var time = (parseInt(hour)+1)+':00';
        } else {
            var time = hour+':'+minute;
        }

        $('#eindtijd'+nr).val(time);
        updateAmountOfTime(nr);
    }
}

function updateAmountOfTime(nr) {
    var start = $('#starttijd'+nr).val();
    var eind = $('#eindtijd'+nr).val();
    var time = calculateTime(start, eind);
    $('#time'+nr).val(time);
}
