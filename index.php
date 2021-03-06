<?php

require 'modules/bookerFormRow.php';

?><html>
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
    <!-- <meta http-equiv="refresh" content="2"> -->
</head>
<body>
<h1>SlideBooker (Work in Progress)</h1>
<p>Dit is een idee voor een nieuwe manier voor het boeken van uren.<br />
    Voor deze test is het aan te raden het venster fullscreen te maken zodat de timeline volledig in beeld past.</p>
<ul>
    <li>Schuif de taken hieronder naar een tekstvak onder het kopje Opdracht</li>
    <li>Na het plaatsen zal het projectnaam en opdracht vervangen worden door gegevens uit het geplaatse item</li>
    <li>Kies na </li>
    <li><a href="https://github.com/webstylecenter/SlideBooker" target="_blank">Download repository</a></li>
</ul>
<div id="tasks">
    <div class="group">
        <div class="task resizable draggable blue" data-projectvalue="Beterhout" data-task="BHREM-192 | Wijziging aangebracht die straks weer eruit mogen">
            <h3>Beterhout - BHREM 192</h3>
            <p>Wijziging aangebracht die straks weer eruit mogen</p>
        </div>
        <div class="task resizable draggable blue" data-projectvalue="Beterhout" data-task="BHREM-192 | Wijziging aangebracht die straks weer eruit mogen">
            <h3>Beterhout - BHREM 192</h3>
            <p>Wijziging aangebracht die straks weer eruit mogen</p>
        </div>
    </div>
    <div class="group">
        <div class="task resizable draggable red" data-projectvalue="Mira" data-task="mira-92 | Wijziging aangebracht die straks weer eruit mogen">
            <h3>Mira - mira 92</h3>
            <p>Wijziging aangebracht die straks weer eruit mogen</p>
        </div>
    </div>
    <div class="task resizable draggable orange" data-projectvalue="KastenDiscount" data-task="KAST-48 | Wijziging aangebracht die straks weer eruit mogen">
        <h3>KastenDiscount - KAST 48</h3>
        <p>Wijziging aangebracht die straks weer eruit mogen</p>
    </div>
</div>
<form id="booker">
    <table>
        <tr>
            <th>Project</th>
            <th>Type</th>
            <th>Opdracht</th>
            <th>Starttijd</th>
            <th>Eindtijd</th>
            <th>Tijdsduur</th>
            <th>Factureren</th>
        </tr>
        <?php

        for($i=1;$i<15;$i++) {
            echo generateRow($i);
        }

        ?>
        <tr>
            <td colspan="7">
                <button>+ Rij toevoegen</button>
            </td>
        </tr>
        <tr>
            <td>
                <select name="projectFinal">
                    <option value="peter">Peter van Dam</option>
                </select>
            </td>
            <td colspan="4">
                <input type="text" value="Random stuff" />
            </td>
            <td>
                06:00
            </td>
            <td>
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
