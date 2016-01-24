/**
 * Created by petervandam on 13/01/16.
 */
$(function() {

    addInteraction();

});

function createTask(title, description, color) {

    var task = document.createElement('div');
    task.className  = 'task resizable draggable ' + color;

    var itemTitle = document.createElement('h3');
    itemTitle.textContent = title;

    var itemDescription = document.createElement('input');
    itemDescription.type = 'text';
    itemDescription.value  = description;

    var itemStartTime = document.createElement('div');
    itemStartTime.className = 'startime';

    var itemEndTime = document.createElement('div');
    itemEndTime.className = 'endtime';

    task.appendChild(itemTitle);
    task.appendChild(itemDescription);
    task.appendChild(itemStartTime);
    task.appendChild(itemEndTime);

    $('#tasks').append(task);
    addInteraction();

}
