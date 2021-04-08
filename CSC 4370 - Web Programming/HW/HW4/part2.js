var picNames = ["eevee.png", "sylveon.png", "espeon.png", "flareon.png", "glaceon.png", "leafeon.png", "umbreon.png", "jolteon.png", "vaporeon.png", "mew.png", "pikachu.png", "squirtle.png"]
var board
var pics
var timer
var flippedCards = 0
var gameTimer
var startGameTimeout
var flipCardTimeout

function showRules() {
    button = document.getElementById("showRules")
    div = document.getElementById("rules")
    if(div.getAttribute("class") == "hidden") {
        div.setAttribute("class", "")
        button.innerHTML = "Hide Rules"
    } else {
        div.setAttribute("class", "hidden")
        button.innerHTML = "Show Rules"
    }
}

function startGame() {
    document.getElementById("rules").setAttribute("class", "hidden")
    document.getElementById("showRules").innerHTML = "Show Rules"
    pics = document.querySelector('input[name="num_pics"]:checked').value
    timer = document.querySelector('input[name="difficulty"]:checked').value
    table = document.getElementById("board")
    table.innerHTML = ""
    clearInterval(gameTimer)
    clearTimeout(startGameTimeout)
    clearTimeout(flipCardTimeout)
    if(pics == 8) {
        gameTimer = 120
    } else if(pics == 10) {
        gameTimer = 150
    } else {
        gameTimer = 180
    }
    document.getElementById("result").innerHTML = ""
    document.getElementById("result").setAttribute("class", "")
    
    buildBoard()
    displayBoard()
    document.getElementById("timer").innerHTML = gameTimer + "s"
    startGameTimeout = setTimeout(function(){ 
        hideBoard() 
        startCountdown()
    }, timer * 1000)
}

function buildBoard() {
    board = Array(pics * 2)
    
    for(i = 0; i < pics; i++) {
        for(j = 0; j < 2; j++) {
            index = Math.floor(Math.random() * board.length)
            do {
                index = Math.floor(Math.random() * board.length)
            } while(!(typeof board[index] === 'undefined'))
            board[index] = i;
        }
    }
}

function displayBoard() {
    table = document.getElementById("board")
    var count = 0;
    if(pics == 8) {
        rows = 4
        cols = 4
    } else if (pics == 10) {
        rows = 4
        cols = 5
    } else {
        rows = 4
        cols = 6
    }
    for(i = 0; i < rows; i++) {
        row = table.insertRow()
        for(j = 0; j < cols; j++) {
            cell = row.insertCell()
            cell.setAttribute("name", board[count])
            cell.setAttribute("class", "show")
            cell.addEventListener('click', function() {
                flipCard(this)
            })
            cell.innerHTML = "<img src='./images/" + picNames[board[count]] + "' alt='" + picNames[board[count]] + "'/>"
            cell.innerHTML += "<p>" + count + "</p>"
            count++
        }
    }
}

function hideBoard() {
    els = document.getElementsByClassName("show")
    while(els.length > 0) {
        els[0].setAttribute("class", "hide")
    }
}

function flipCard(ele) {
    els = document.getElementsByClassName("show")
    if(els.length == 2) {
        return;
    } else {
        ele.setAttribute("class", "show");
    }
    
    els = document.getElementsByClassName("show")
    console.log(els)
    console.log(els.length)
    if(els.length == 2) {
        if(els[0].getAttribute("name") == els[1].getAttribute("name")) {
            while(els.length > 0) {
                els[0].setAttribute("class", "correct")
            }
        } else {
            flipCardTimeout = setTimeout(function() {
                while(els.length > 0) {
                    els[0].setAttribute("class", "hide")
                }
            }, 2000)
        }
    }
    
    corrects = document.getElementsByClassName("correct")
    if(corrects.length == board.length) {
        clearInterval(gameTime);
        document.getElementById("result").innerHTML = "Congrats, you matched them all!"
        document.getElementById("result").setAttribute("class", "congrats")
    }
}

function startCountdown() {    
    gameTime = setInterval(function() {
        gameTimer--;
        document.getElementById("timer").innerHTML = gameTimer + "s"
        if(gameTimer == 0) {
            clearInterval(gameTime)
            document.getElementById("result").innerHTML = "TIMES UP!  You Lose"
            document.getElementById("result").setAttribute("class", "timesup")
        }
    }, 1000)
}