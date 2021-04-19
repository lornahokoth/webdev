var startingGen; //This is the initial generation.  Used when resetting game
var currentGen; //currentGen stores the data for the current generation.  displayTable uses this
                //to display the generation
var nextGen; //Used as a temporary storage for what happens when generate is clicked
var numGens; //variable to keep track of how many generations have existed
var population; //variable to keep track of the current number of alive cells
const timer = ms => new Promise(res => setTimeout(res, ms)); //This is used to create a delay
                                                             //between generations

//loadGameplay loads the initial state of the game.  It accepts a number for rows and columns
//so it can draw the board.  If none are provided it defaults them.  The function also sets
//the default state for the rest of the page.
function loadGameplay(rows = 17, cols = 21) {
    var username = getCookie("username");
    var status = getCookie("status");

    //This is a check to ensure that only someone logged in can run the experiment
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

//buildTable creates an empty table to be displayed on the page.
//an onclick event is added to each cell of the table to allow it to toggle alive and dead
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

//buildArrays is used to build the initial set of arrays.  Number of rows and columns is
//passed in to set the default size of these arrays.  Map and slice were used to create
//a deep copy of the array since using the standard assignment does a shallow copy 
//which means that if you change one you change the other.
function buildArrays(rows, cols) {
    //creates an empty array that is rows x cols
    currentGen = new Array(rows);
    for (i = 0; i < rows; i++) {
        currentGen[i] = new Array(cols);
    }

    //fills the array with 0
    for(i = 0; i < rows; i++) {
        for(j = 0; j < cols; j++) {
            currentGen[i][j] = 0;
        }
    }
    
    //creates copies of the arrays
    nextGen = currentGen.map(function (arr) {
        return arr.slice();
    })
    startingGen = currentGen.map(function (arr) {
        return arr.slice();
    })
}

//This is a simple function to update the number of generations that will be run when generate
//is clicked.  This is called when the slider changes so that the input field will be updated
function updateGens() {
    input = document.getElementById("numGens");
    slider = document.getElementById("numGenerations");
    input.value = slider.value;
}

//This is a simple function to update the number of generations that will be run when generate
//is clicked.  This is called when a change is made to the increment input field.  If the value
//entered is greater than the max (23) it will set it to 23.  If it's lower than the min (1)
//it will set it to 1.  This will also update the slider position to match.
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

//This is a check to varify that the number of rows and columns falls inside the specified range
//calls loadGameplay to build a fresh table for the user to use.
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

//Function called when a cell is clicked.  Will toggle the cell alive/dead.
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

    if(!document.getElementById("patterns").hasAttribute("disabled")) {
        document.getElementById("patterns").value="custom";
    }
    document.getElementById("pop").innerHTML = population;
}

//This function creates a reset point and enables the generation functions.  It will also disable
//the ability to select a pattern.  The user can still click the table to add/remove alive cells.
function startGame() {
    rows = document.getElementById("rows").value;
    cols = document.getElementById("cols").value;

    //hides the start button and displays the reset button
    start = document.getElementById("startBtn");
    reset = document.getElementById("resetBtn");
    start.classList.add("hidden");
    reset.classList.remove("hidden");
    
    //enables/disables the game functions.
    document.getElementById("numGenerations").removeAttribute("disabled");
    document.getElementById("generate").removeAttribute("disabled");
    document.getElementById("rows").setAttribute("disabled", false);
    document.getElementById("cols").setAttribute("disabled", false);
    document.getElementById("patterns").setAttribute("disabled", false);

    //populates the arrays based on the table in the browser.
    currentGen = populateArray(currentGen);
    nextGen = currentGen.map(function (arr) {
        return arr.slice();
    })
    startingGen = currentGen.map(function (arr) {
        return arr.slice();
    })
}

//populateTable is run when the Patterns dropdown changes.  This function will create a pattern
//that has been predefined.  Each pattern has a minimum number of rows/cols it can be and if the
//current table is below that it will be expanded to fit.
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

        //updates the array for the bee pattern
        //centerRow and centerCol are used so the pattern starts as close to the center of the
        //table as possible
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

        //updates the array for the blink pattern
        //centerRow and centerCol are used so the pattern starts as close to the center of the
        //table as possible
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

        //updates the array for the pulsar pattern
        //centerRow and centerCol are used so the pattern starts as close to the center of the
        //table as possible
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

//populateArray is used to read the current state of the gameplay table and
//update the given array with that data.
function populateArray(arr) {
    table = document.getElementById("golTable");
    //The nested for loop allows us to naviage the table while keeping track
    //of the row/column so we can update the array
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

//disable and enable screen function makes it so that the user can't click anywhere
//while a series of generations are animated.
function disableScreen() {
    document.getElementById("gameOverlay").classList.add("gameplayOverlay");
}

function enableScreen() {
    document.getElementById("gameOverlay").classList.remove("gameplayOverlay");
}

//This function is what creates the iterations of the cells for each generation.
//It is async to allow for the await timer to run for the predefined .5 seconds between
//each generation.
async function generate() {
    //creates a copy of the current generation
    currentGen = populateArray(currentGen);
    nextGen = currentGen.map(function (arr) {
        return arr.slice();
    })
    
    numSteps = document.getElementById("numGenerations").value;
    rows = document.getElementById("rows").value;
    cols = document.getElementById("cols").value;

    disableScreen();

    //runs through the alogrithm to determine if the cell should be alive or dead
    //in the next generation
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

        //wait timer of .5 seconds between each generation
        await timer(500);
        displayTable();
    }

    enableScreen();
}

//displayTable is used to load the current generation onto the table so
//the user can see it.
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

//this function sets the game back to the state it was in when the start button
//was clicked.
function resetGame() {
    currentGen = startingGen.map(function (arr) {
        return arr.slice();
    })
    numGens = 1;
    
    document.getElementById("numGenerations").value = 1;
    document.getElementById("numGens").value = 1;
    
    displayTable();
}

//stop will end the current experiment and reset everything back to the original state
//when the page was first loaded.
function stop() {
    document.getElementById("numGenerations").value = 1;
    document.getElementById("numGens").value = 1;
    
    start = document.getElementById("startBtn");
    reset = document.getElementById("resetBtn");
    start.classList.remove("hidden");
    reset.classList.add("hidden");

    loadGameplay();
}