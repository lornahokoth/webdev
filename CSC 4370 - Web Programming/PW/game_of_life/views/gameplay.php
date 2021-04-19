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
    <h1 id="title"> GAME OF LIFE </h1>
    <div id="gameOverlay"></div>
    <div class="box gamearea">
        <div class="gameboard">
            <table id="golTable" name="golTable">

            </table>
        </div>
        <div class="controls">
            <fieldset id="options">
                <legend>
                    Game Options
                </legend>
                <div class="row">
                    <div class="leftCol">
                        <label for="rows">Num Rows: </label>
                        <input type="number" class="numInput" id="rows" name="rows" min="5" max="40" onchange="checkTableSize('rows')">
                    </div>
                    <div class="middleCol">
                        <label for="patterns">Patterns: </label>
                        <select name="patterns" id="patterns" onchange="populateTable()">
                            <option value="">--Select a Pattern--</option>
                            <option value="custom">Custom</option>
                            <option value="bees">The Beehive</option>
                            <option value="blink">The Blinker</option>
                            <option value="pulsar">The Pulsar</option>
                        </select>
                    </div>
                    <div class="rightCol">
                        <button id="startBtn" onclick="startGame()" class="gameplayButton">Start</button>
                        <button id="resetBtn" onclick="resetGame()" class="hidden gameplayButton">Reset</button>
                    </div>
                </div>
                <div class="row">
                    <div class="leftCol">
                        <label for="cols">Num Columns: </label>
                        <input type="number" class="numInput" id="cols" name="cols" min="5" max="40" onchange="checkTableSize('cols')">
                    </div>
                    <div class="middleCol">
                        <label>Increment:</label>
                        <input type="range" min="1" max="23" value="1" class="slider"  id="numGenerations" oninput="updateGens()">
                        <input type="number" class="numInput" id="numGens" name="numGens" min="1" max="23" onchange="checkGens()">
                        <button id="generate" onclick="generate()" class="gameplayButton">Generate</button>
                    </div>
                    <div class="rightCol">
                        <button id="stopBtn" onclick="stop()" class="gameplayButton">Stop</button>
                    </div>
                </div>
            </fieldset>
            <fieldset id="stats">
                <legend>
                    Game Stats
                </legend>
                <div class="row">
                    <label for="gen">Generation: </label>
                    <label id="gen" name="gen" class="stats"></label>
                </div>
                <div class="row">
                    <label for="pop">Population: </label>
                    <label id="pop" name="pop" class="stats"></label>
                </div>
            </fieldset>
            <fieldset id="menu">
                <legend>
                    Menu
                </legend>
                <div class="row">
                    <a href="./homepage.php">
                    <button class="gameplayButton">Quit</button>
                </a>
                </div>
                <div class="row">
                    <a href="../controllers/login.php?func=logout">
                    <button class="gameplayButton">Log Out</button>
                </a>
                </div>
            </fieldset>
        </div>
    </div>
  </body>
</html>
