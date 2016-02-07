<html>
<head>
    <title>SlideBooker</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript" src="scripts/main.js"></script>
    <script type="text/javascript" src="scripts/time.js"></script>
    <script type="text/javascript" src="scripts/interaction.js"></script>
    <script type="text/javascript" src="scripts/gap-filler.js"></script>
    <meta http-equiv="refresh" content="2">
</head>
<body>
<h1>SlideBooker (Work in Progress)</h1>

<p>Dit is een idee voor een nieuwe manier voor het boeken van uren.<br />
    Voor deze test is het aan te raden het venster fullscreen te maken zodat de timeline volledig in beeld past.</p>

<ul>
    <li>Schuif de taken hieronder naar de tijdlijn beneden om de opdracht te gaan boeken</li>
    <li>Vervang de omschrijving van de taak door de tekst te selecteren en aan te passen</li>
    <li>Verklein of vergroot de opdracht door aan de randen te trekken</li>
    <li><a href="https://github.com/webstylecenter/SlideBooker" target="_blank">Download repository</a></li>
</ul>

<form id="booker">

    <table>
        <tr>
            <th>Project</th>
            <th>Opdracht</th>
            <th>Starttijd</th>
            <th>Eindtijd</th>
            <th>Tijdsduur</th>
        </tr>
        <?php

        for ($i=1; $i<=20; $i++) {

            $disabled = ($i == 1 ? '' : ' disabled="disabled"');
            echo '<tr>
                    <td>
                        <select name="project'.$i.'"'.$disabled.'">
                            <option value="">Maak een keuze</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" value=""'.$disabled.'" />
                    </td>
                    <td>
                        <select name="starttijd'.$i.'"'.$disabled.'">
                            <option value="">'.($i == 1 ? '09:00' : '-').'</option>
                        </select>
                    </td>
                    <td>
                        <select name="project'.$i.'"'.$disabled.'">
                            <option value="">'.($i == 1 ? '09:15' : '-').'</option>
                        </select>
                    </td>
                    <td>'.($i == 1 ? '00:15' : '').'</td>
                </tr>';

        }

        ?>
        <tr>
            <td>
                <select name="projectFinal">
                    <option value="peter">Peter van Dam</option>
                </select>
            </td>
            <td>
                <input type="text" value="Random stuff" />
            </td>
            <td colspan="3">
                06:00
            </td>
        </tr>
        <tr>
            <td colspan="5">
                <input type="button" value="Save" />
            </td>
        </tr>
    </table>

</form>

<div id="progressbar">
    <table cellspacing="0" cellpadding="0">
        <tr>
            <td>09:00</td>
            <?php

                $time = 0;
                while($time < 375) {
                    echo '<td class="'.(rand(1, 3) == 1 ? 'taken' : 'free').'">&nbsp;</td>';
                    $time=$time+15;
                }


            ?>
            <td>15:45</td>
        </tr>
    </table>
</div>

</body>
</html>
