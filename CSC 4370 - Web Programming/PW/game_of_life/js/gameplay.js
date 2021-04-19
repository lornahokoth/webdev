var startingGen;
var currentGen;
var nextGen;
var numGens;
var population;
const timer = ms => new Promise(res => setTimeout(res, ms));

function loadGameplay(rows = 17, cols = 21) {
    var username = getCookie("username");
    var status = getCookie("status");
    if(username == "" || status == "failure") {
        window.location.href = "../views/homepage.php";
    }
    input = document.getElementById("numGens");
    slider = document.getElementById("numGenerations");
    input.value = slider.value;
    row = document.getElementById("rows");
    col = document.getElementById("cols");
    row.value = rows;
    col.value = cols;
    numGens = 0;
    population = 0;
    document.getElementById("gen").innerHTML = numGens;
    document.getElementById("pop").innerHTML = population;
    document.getElementById("numGenerations").setAttribute("disabled", false);
    document.getElementById("generate").setAttribute("disabled", false);
    document.getElementById("rows").removeAttribute("disabled");
    document.getElementById("cols").removeAttribute("disabled");
    document.getElementById("patterns").removeAttribute("disabled");
    document.getElementById("patterns").value="";
    buildTable();
}

function buildTable() {
    rows = document.getElementById("rows").value;
    cols = document.getElementById("cols").value;
    table = document.getElementById("golTable");
    table.innerHTML = "";

    buildArrays(rows, cols);
    for (i = 0; i < rows; i++) {
        row = table.insertRow();
        for (j = 0; j < cols; j++) {
            cell = row.insertCell();
            cell.classList.add("dead");
            cell.addEventListener('click', function () {
                toggleAlive(this)
            })
        }
    }
}

function buildArrays(rows, cols) {
    currentGen = new Array(rows);
    for (i = 0; i < rows; i++) {
        currentGen[i] = new Array(cols);
    }
    for(i = 0; i < rows; i++) {
        for(j = 0; j < cols; j++) {
            currentGen[i][j] = 0;
        }
    }
    nextGen = currentGen.map(function (arr) {
        return arr.slice();
    })
    startingGen = currentGen.map(function (arr) {
        return arr.slice();
    })
}

function updateGens() {
    input = document.getElementById("numGens");
    slider = document.getElementById("numGenerations");
    input.value = slider.value;
}

function checkGens() {
    input = document.getElementById("numGens");
    slider = document.getElementById("numGenerations");
    if(input.value > 23) {
        input.value = 23;
    } else if (input.value < 1) {
        input.value = 1;
    }
    slider.value = input.value;
}

function checkTableSize(element) {
    maxValue = 40;
    if(element == "rows") {
        maxValue = 24;
    }
    ele = document.getElementById(element);
    if (ele.value < 5) {
        ele.value = 5;
    } else if (ele.value > maxValue) {
        ele.value = maxValue;
    }
    rows = document.getElementById("rows").value;
    cols = document.getElementById("cols").value;
    loadGameplay(rows, cols);
}

function toggleAlive(ele) {
    if (ele.classList.contains("alive")) {
        ele.classList.remove("alive");
        ele.classList.add("dead");
        population--;
    } else {
        ele.classList.add("alive");
        ele.classList.remove("dead");
        population++;
    }
    if(! document.getElementById("patterns").hasAttribute("disabled")) {
        document.getElementById("patterns").value="custom";
    }
    document.getElementById("pop").innerHTML = population;
}

function startGame() {
    start = document.getElementById("startBtn");
    reset = document.getElementById("resetBtn");
    start.classList.add("hidden");
    reset.classList.remove("hidden");
    rows = document.getElementById("rows").value;
    cols = document.getElementById("cols").value;
    
    document.getElementById("numGenerations").removeAttribute("disabled");
    document.getElementById("generate").removeAttribute("disabled");
    document.getElementById("rows").setAttribute("disabled", false);
    document.getElementById("cols").setAttribute("disabled", false);
    document.getElementById("patterns").setAttribute("disabled", false);

    currentGen = populateArray(currentGen);
    nextGen = currentGen.map(function (arr) {
        return arr.slice();
    })
    startingGen = currentGen.map(function (arr) {
        return arr.slice();
    })
}

function populateTable() {
    pattern = document.getElementById("patterns").value;
    rows = document.getElementById("rows").value;
    cols = document.getElementById("cols").value;
    if(pattern == "bees") {
        minRows = 6;
        minCols = 6;
        if(rows < minRows || cols < minCols) {
            if(rows < minRows) {
                document.getElementById("rows").value = minRows;
                rows = minRows;
            }
            if(cols < minCols) {
                document.getElementById("cols").value = minCols;
                cols = minCols;
            }
            loadGameplay(rows, cols);
            document.getElementById("patterns").value="bees";
        }
        buildArrays(rows, cols);
        centerRow = Math.floor(rows / 2);
        centerCol = Math.floor(cols / 2);
        currentGen[centerRow - 2][centerCol - 2] = 1;
        currentGen[centerRow - 2][centerCol - 1] = 1;
        currentGen[centerRow - 1][centerCol - 2] = 1;
        currentGen[centerRow][centerCol + 1] = 1;
        currentGen[centerRow + 1][centerCol] = 1;
        currentGen[centerRow + 1][centerCol + 1] = 1;
        displayTable();
    } else if(pattern == "blink") {
        buildArrays(rows, cols);
        centerRow = Math.floor(rows / 2);
        centerCol = Math.floor(cols / 2);
        currentGen[centerRow][centerCol - 1] = 1;
        currentGen[centerRow][centerCol] = 1;
        currentGen[centerRow][centerCol + 1] = 1;
        displayTable();
    } else if(pattern == "pulsar") {
        minRows = 17;
        minCols = 17;
        if(rows < minRows || cols < minCols) {
            if(rows < minRows) {
                document.getElementById("rows").value = minRows;
                rows = minRows;
            }
            if(cols < minCols) {
                document.getElementById("cols").value = minCols;
                cols = minCols;
            }
            loadGameplay(rows, cols);
            document.getElementById("patterns").value="pulsar";
        }
        buildArrays(rows, cols);
        centerRow = Math.floor(rows / 2);
        centerCol = Math.floor(cols / 2);
        currentGen[centerRow - 7][centerCol - 3] = 1;
        currentGen[centerRow - 7][centerCol + 3] = 1;

        currentGen[centerRow - 6][centerCol - 3] = 1;
        currentGen[centerRow - 6][centerCol + 3] = 1;

        currentGen[centerRow - 5][centerCol - 3] = 1;
        currentGen[centerRow - 5][centerCol - 2] = 1;
        currentGen[centerRow - 5][centerCol + 3] = 1;
        currentGen[centerRow - 5][centerCol + 2] = 1;

        currentGen[centerRow - 3][centerCol - 7] = 1;
        currentGen[centerRow - 3][centerCol - 6] = 1;
        currentGen[centerRow - 3][centerCol - 5] = 1;
        currentGen[centerRow - 3][centerCol - 2] = 1;
        currentGen[centerRow - 3][centerCol - 1] = 1;
        currentGen[centerRow - 3][centerCol + 7] = 1;
        currentGen[centerRow - 3][centerCol + 6] = 1;
        currentGen[centerRow - 3][centerCol + 5] = 1;
        currentGen[centerRow - 3][centerCol + 2] = 1;
        currentGen[centerRow - 3][centerCol + 1] = 1;

        currentGen[centerRow - 2][centerCol - 5] = 1;
        currentGen[centerRow - 2][centerCol - 3] = 1;
        currentGen[centerRow - 2][centerCol - 1] = 1;
        currentGen[centerRow - 2][centerCol + 5] = 1;
        currentGen[centerRow - 2][centerCol + 3] = 1;
        currentGen[centerRow - 2][centerCol + 1] = 1;

        currentGen[centerRow - 1][centerCol - 3] = 1;
        currentGen[centerRow - 1][centerCol - 2] = 1;
        currentGen[centerRow - 1][centerCol + 3] = 1;
        currentGen[centerRow - 1][centerCol + 2] = 1;

        currentGen[centerRow + 1][centerCol - 3] = 1;
        currentGen[centerRow + 1][centerCol - 2] = 1;
        currentGen[centerRow + 1][centerCol + 3] = 1;
        currentGen[centerRow + 1][centerCol + 2] = 1;
        
        currentGen[centerRow + 2][centerCol - 5] = 1;
        currentGen[centerRow + 2][centerCol - 3] = 1;
        currentGen[centerRow + 2][centerCol - 1] = 1;
        currentGen[centerRow + 2][centerCol + 5] = 1;
        currentGen[centerRow + 2][centerCol + 3] = 1;
        currentGen[centerRow + 2][centerCol + 1] = 1;

        currentGen[centerRow + 3][centerCol - 7] = 1;
        currentGen[centerRow + 3][centerCol - 6] = 1;
        currentGen[centerRow + 3][centerCol - 5] = 1;
        currentGen[centerRow + 3][centerCol - 2] = 1;
        currentGen[centerRow + 3][centerCol - 1] = 1;
        currentGen[centerRow + 3][centerCol + 7] = 1;
        currentGen[centerRow + 3][centerCol + 6] = 1;
        currentGen[centerRow + 3][centerCol + 5] = 1;
        currentGen[centerRow + 3][centerCol + 2] = 1;
        currentGen[centerRow + 3][centerCol + 1] = 1;

        currentGen[centerRow + 5][centerCol - 3] = 1;
        currentGen[centerRow + 5][centerCol - 2] = 1;
        currentGen[centerRow + 5][centerCol + 3] = 1;
        currentGen[centerRow + 5][centerCol + 2] = 1;

        currentGen[centerRow + 6][centerCol - 3] = 1;
        currentGen[centerRow + 6][centerCol + 3] = 1;
        
        currentGen[centerRow + 7][centerCol - 3] = 1;
        currentGen[centerRow + 7][centerCol + 3] = 1;
        displayTable();
    }
}

function populateArray(arr) {
    table = document.getElementById("golTable");
    for (i = 0, row; row = table.rows[i]; i++) {
        for (j = 0, col; col = row.cells[j]; j++) {
            if (col.classList.contains("alive")) {
                arr[i][j] = 1;
            } else {
                arr[i][j] = 0;
            }
        }
    }
    return arr;
}

function disableScreen() {
    document.getElementById("gameOverlay").classList.add("gameplayOverlay");
}

function enableScreen() {
    document.getElementById("gameOverlay").classList.remove("gameplayOverlay");
}

async function generate() {
    currentGen = populateArray(currentGen);
    nextGen = currentGen.map(function (arr) {
        return arr.slice();
    })
    numSteps = document.getElementById("numGenerations").value;
    rows = document.getElementById("rows").value;
    cols = document.getElementById("cols").value;
    disableScreen();
    for (step = 1; step <= numSteps; step++) {
        for (i = 0; i < rows; i++) {
            for (j = 0; j < cols; j++) {
                numNeighbors = 0;
                for (a = -1; a <= 1; a++) {
                    for (b = -1; b <= 1; b++) {
                        if (i + a < 0 || i + a >= rows) {
                            continue;
                        } else if (j + b < 0 || j + b >= cols) {
                            continue;
                        } else if (a == 0 && b == 0) {
                            continue;
                        } else {
                            if (currentGen[i + a][j + b] == 1) {
                                numNeighbors++;
                            }
                        }
                    }
                }
                if (currentGen[i][j] == 1) {
                    if (numNeighbors < 2 || numNeighbors > 3) {
                        nextGen[i][j] = 0;
                    }
                } else {
                    if (numNeighbors == 3) {
                        nextGen[i][j] = 1;
                    }
                }
            }
        }
        currentGen = nextGen.map(function (arr) {
            return arr.slice();
        })
        numGens++;
        await timer(500);
        displayTable();
    }
    enableScreen();
}

function displayTable() {
    population = 0;
    table = document.getElementById("golTable");
    for (i = 0, row; row = table.rows[i]; i++) {
        for (j = 0, col; col = row.cells[j]; j++) {
            if (currentGen[i][j] == 0) {
                col.classList.remove("alive");
                col.classList.add("dead");
            } else {
                population++;
                col.classList.add("alive");
                col.classList.remove("dead");
            }
        }
    }
    document.getElementById("gen").innerHTML = numGens;
    document.getElementById("pop").innerHTML = population;
}

function resetGame() {
    currentGen = startingGen.map(function (arr) {
        return arr.slice();
    })
    numGens = 1;
    
    document.getElementById("numGenerations").value = 1;
    document.getElementById("numGens").value = 1;
    
    displayTable();
}

function stop() {
    document.getElementById("numGenerations").value = 1;
    document.getElementById("numGens").value = 1;
    
    start = document.getElementById("startBtn");
    reset = document.getElementById("resetBtn");
    start.classList.remove("hidden");
    reset.classList.add("hidden");

    loadGameplay();
}