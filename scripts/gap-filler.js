/**
 * Created by petervandam on 24/01/16.
 */

function gapFiller() {

    var minutes = $(".hour").find("[data-taken='no']").length * 15;
    $('#randomTasks').html(minutes + " minutes taken by random tasks");

}
