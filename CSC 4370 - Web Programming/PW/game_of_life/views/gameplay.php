<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/stylesheet.css" />
    <script src="../js/common.js"></script>
    <script src="../js/gameplay.js"></script>
    <title>Game of Life</title>
  </head>
  <body onload="loadGameplay()">
    <?php include("./header.php"); ?>
    <div id="gameOverlay"></div>
    <div class="body">
        <div class="gamestats">
            <fieldset>
                <legend>
                    Game Stats
                </legend>
                <label for="gen">Generation: </label>
                <label id="gen" name="gen"></label>
                <br>
                <label for="pop">Population: </label>
                <label id="pop" name="pop"></label>
            </fieldset>
        </div>
        <div class="gameboard">
            <table id="golTable" name="golTable">

            </table>
        </div>
        <div class="gameoptions">
            <fieldset>
                <legend>
                    Game Options
                </legend>
                <button id="startBtn" onclick="startGame()">Start</button>
                <button id="resetBtn" onclick="resetGame()" class="hidden">Reset</button>
                <button id="stopBtn" onclick="stop()">Stop</button>
                <label>Increment</label>
                <input type="range" min="1" max="23" value="1" class="slider"  id="numGenerations" oninput="updateGens()">
                <label id="numGens"></label>
                <button id="generate" onclick="generate()">Generate</button>
                <label for="patterns">Patterns: </label>
                <select name="patterns" id="patterns" onchange="populateTable()">
                    <option value="">--Select a Pattern--</option>
                    <option value="custom">Custom</option>
                    <option value="bees">The Beehive</option>
                    <option value="blink">The Blinker</option>
                    <option value="pulsar">The Pulsar</option>
                    <!-- <option value="glider">The Glider</option> -->
                </select>
                <label for="rows">Num Rows: </label>
                <input type="number" id="rows" name="rows" min="5" max="40" onchange="checkTableSize('rows')">
                <label for="cols">Num Columns: </label>
                <input type="number" id="cols" name="cols" min="5" max="40" onchange="checkTableSize('cols')">
            </fieldset>
        </div>
    </div>
    <?php include("./footer.php"); ?>
  </body>
</html>
