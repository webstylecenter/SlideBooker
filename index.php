<html>
<head>
    <title>SlideBooker</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript" src="scripts/main.js"></script>
    <!-- <meta http-equiv="refresh" content="2"> -->
</head>
<body>
<h1>SlideBooker (Work in Progress)</h1>

<p>Dit is een idee voor een nieuwe manier voor het boeken van uren</p>

<ul>
    <li>Schuif de taken hieronder naar de tijdlijn beneden om de opdracht te gaan boeken</li>
    <li>Vervang de omschrijving van de taak door de tekst te selecteren en aan te passen</li>
    <li>Verklein of vergroot de opdracht door aan de randen te trekken</li>
</ul>

<div class="group">
    <div class="resizable draggable blue">
        <h3>Beterhout - BHREM 192</h3>
        <input type="text" value="Wijziging aangebracht die straks weer eruit mag"/>
        <div class="startime">-</div>
        <div class="tasktime">task</div>
        <div class="endtime">-</div>
    </div>
    <div class="resizable draggable blue">
        <h3>Beterhout - BHREM 192</h3>
        <input type="text" value="Wijziging aangebracht die straks weer eruit mag"/>
        <div class="startime">-</div>
        <div class="tasktime">-</div>
        <div class="endtime">-</div>
    </div>
</div>
<div class="group">
    <div class="resizable draggable red">
        <h3>Mira - mira 92</h3>
        <input type="text" value="Wijziging aangebracht die straks weer eruit mag"/>
        <div class="startime">-</div>
        <div class="tasktime">-</div>
        <div class="endtime">-</div>
    </div>
</div>

<div class="resizable draggable orange">
    <h3>KastenDiscount - KAST 48</h3>
    <input type="text" value="Wijziging aangebracht die straks weer eruit mag"/>
    <div class="startime">-</div>
    <div class="tasktime">-</div>
    <div class="endtime">-</div>
</div>

<div id="timeline">
    <?php

    $hours = array(9, 10, 11, 12, 13, 14, 15, 16, 17);
    foreach ($hours as $hour) {
        echo '<div class="hour">
                <div class="quarter" data-starttime="'.$hour.':00" data-endtime="'.$hour.':15">'.$hour.':00</div>
                <div class="quarter" data-starttime="'.$hour.':15" data-endtime="'.$hour.':30">15</div>
                <div class="quarter" data-starttime="'.$hour.':30" data-endtime="'.$hour.':45">30</div>
                <div class="quarter" data-starttime="'.$hour.':45" data-endtime="'.($hour+1).':00">45</div>
            </div>';
    }

    ?>
</div>
</body>
</html>
