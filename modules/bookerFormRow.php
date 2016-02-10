<?php

function generateRow($i) {

    $disabled = ($i == 1 ? '' : ' disabled="disabled"');
    $return = '<tr id="row'.$i.'">
                <td>
                    <select id="project'.$i.'" name="project'.$i.'"'.$disabled.'" onchange="enableNextRow('.$i.');">
                        <option value="">Maak een keuze</option>
                        <option value="Beterhout">Beterhout</option>
                        <option value="Mira">Mira</option>
                        <option value="KastenDiscount">KastenDiscount</option>
                    </select>
                </td>
                <td>
                    <select id="type'.$i.'" name="type'.$i.'"'.$disabled.'" onchange="enableNextRow('.$i.');">
                        <option value="">Maak een keuze</option>
                        <option value="development">Development</option>
                        <option value="overig">Overig</option>
                    </td>
                </td>
                <td>
                    <input type="text" value=""'.$disabled.'" class="droppable" data-selector="project'.$i.'" onchange="enableNextRow('.$i.');" />
                </td>
                <td>
                    '.timeSelector('starttijd', $i).'
                </td>
                <td>
                    '.timeSelector('eindtijd', $i).'
                </td>
                <td>'.($i == 1 ? '00:15' : '').'</td>
                <td>
                    <input type="radio" name="factureren'.$i.'" id="factureren'.$i.'"'.$disabled.'" value="1" checked="checked" /> Ja
                    <input type="radio" name="factureren'.$i.'" id="factureren'.$i.'"'.$disabled.'" value="0" /> Nee
                </td>
            </tr>';

    return $return;


}

function timeSelector($name, $i) {

    $disabled = ($i == 1 ? '' : ' disabled="disabled"');
    $updateTime = ($name == 'eindtijd' ? ' onchange="updateTime('.$i.');"' : '');

    $selector = '<select name="'.$name.$i.'"'.$disabled.$updateTime.'">';
    $hours = array(
        '09', 10, 11, 12, 13, 14, 15, 16, 17
    );
    $minutes = array(
        '00', 15, 30, 45
    );

    foreach($hours as $hour) {
        foreach($minutes as $minute) {
            $selector .= '<option value="'.$hour.':'.$minute.'">'.$hour.':'.$minute.'</option>';
        }
        $last = '<option value="'.($hour+1).':00">'.($hour+1).':00</option>';
    }

    $selector .= $last;
    $selector .= '</select>';

    return $selector;

}
