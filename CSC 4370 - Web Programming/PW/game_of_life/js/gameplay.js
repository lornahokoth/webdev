var currentGen;
var nextGen;

function loadGameplay() {    
    label = document.getElementById("numGens");
    slider = document.getElementById("numGenerations");
    label.innerHTML = slider.value;
    row = document.getElementById("rows");
    col = document.getElementById("cols");
    row.value = 15;
    col.value = 20;
    buildTable();
}

function updateGens() {
    label = document.getElementById("numGens");
    slider = document.getElementById("numGenerations");
    label.innerHTML = slider.value;
}

function checkTableSize(element) {
    ele = document.getElementById(element);
    if(ele.value < 5) {
        ele.value = 5;
    } else if(ele.value > 40) {
        ele.value = 40;
    }
}

function buildTable() {
    rows = document.getElementById("rows").value;
    cols = document.getElementById("cols").value;
    table = document.getElementById("golTable");
    
    for(i = 0; i < rows; i++) {
        row = table.insertRow();
        for(j = 0; j < cols; j++) {
            cell = row.insertCell();
            cell.classList.add("dead");
            cell.setAttribute("id", i + '_' + j);
            cell.addEventListener('click', function() {
                toggleAlive(this)
            })
        }
    }
}

function toggleAlive(ele) {
    if(ele.classList.contains("alive")) {
        ele.classList.remove("alive");
        ele.classList.add("dead");
    } else {
        ele.classList.add("alive");
        ele.classList.remove("dead");
    }
}

function start() {
    start = document.getElementById("startBtn");
    reset = document.getElementById("resetBtn");
    start.classList.add("hidden");
    reset.classList.remove("hidden");
    rows = document.getElementById("rows").value;
    cols = document.getElementById("cols").value;

    buildCurrentGenArray(rows, cols);
}