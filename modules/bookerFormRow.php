<?php

function generateRow($i)
{
    $disabled = $i !== 1 ? ' disabled="disabled"' : '';

    $return = '<tr id="row' . $i . '">
                <td>
                    <select id="project' . $i . '" name="project' . $i . '"' . $disabled . '" onchange="enableNextRow(' . $i . ');">
                        <option value="">Maak een keuze</option>
                        <option value="Beterhout">Beterhout</option>
                        <option value="Mira">Mira</option>
                        <option value="KastenDiscount">KastenDiscount</option>
                    </select>
                </td>
                <td>
                    <select id="type' . $i . '" name="type' . $i . '"' . $disabled . '" onchange="enableNextRow(' . $i . ');">
                        <option value="">Maak een keuze</option>
                        <option value="development">Development</option>
                        <option value="overig">Overig</option>
                    </td>
                </td>
                <td>
                    <input type="text" value=""' . $disabled . '" class="droppable" data-selector="project' . $i . '" data-type-selector="type' . $i . '" data-rownr="' . $i . '" onchange="enableNextRow(' . $i . ');" />
                </td>
                <td>
                    ' . timeSelector('starttijd', $i, new \DateTime('9:00'), new \DateTime('18:00'), 15) . '
                </td>
                <td>
                    ' . timeSelector('eindtijd', $i, new \DateTime('9:00'), new \DateTime('18:00'), 15) . '
                </td>
                <td>
                   '.totalTimeSelector('time', $i).'
               </td>
                <td>
                    <input type="radio" name="factureren' . $i . '" id="factureren' . $i . '"' . $disabled . '" value="1" checked="checked" /> Ja
                    <input type="radio" name="factureren' . $i . '" id="factureren' . $i . '"' . $disabled . '" value="0" /> Nee
                </td>
            </tr>';

    return $return;
}

function timeSelector($name, $i, \DateTime $start, \DateTime $end, $interval)
{
    $disabled = $i !== 1 ? ' disabled="disabled"' : '';
    $updateTime = ($name === 'eindtijd' ? ' onchange="updateTime(this, ' . $i . ');"' : '');

    $selector = '<select id="' . $name . $i . '" name="' . $name . $i . '"' . $disabled . $updateTime . '">';
    while ($start <= $end) {
        $selector .= '<option value="' . $start->format('H') . ':' . $start->format('i') . '">' . $start->format(
                'H'
            ) . ':' . $start->format('i') . '</option>';

        $start->modify('+' . $interval . ' minutes');
    }
    $selector .= '</select>';

    return $selector;
}

function totalTimeSelector($name, $i) {
    $disabled = $i !== 1 ? ' disabled="disabled"' : '';
    $html = '';
    $html .= '<select id="'. $name . $i.'" name="'. $name . $i.'"' . $disabled . '" onchange="enableNextRow(' . $i . ');setTotalTime('.$i.')">';
    for ($h=0; $h<10; $h=$h+1) {
        for ($m=0; $m<60; $m=$m+15) {
            $val = $h.':'.($m < 10 ? '0'.$m : $m);
            $html .= '<option value="'.$val.'">'.$val.'</option>';
        }
    }
    $html .= '</select>';
    return $html;
}
