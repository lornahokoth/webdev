<html>

<head>
    <link rel="stylesheet" href="./nerdieluv.css">
    <title>NerdLuv</title>
</head>

<body>
    <header id="bannerarea">
    <a href="./index.php"><img src="./images/nerd-love.png" alt="nerd love logo" /></a>
        <br>
        <label>Where meek geeks meet!</label>
    </header>
    <?php
    $name = $_GET["name"];
    $file = fopen("./data/singles.txt", "r");
    $found = array();
    while (!feof($file)) {
        $line = fgets($file);
        $data = explode(",", $line);
        if ($name == $data[0]) {
            $found = $data;
            break;
        }
    }
    fclose($file);
    $file = fopen("./data/singles.txt", "r");
    $matches = array();
    while (!feof($file)) {
        $line = fgets($file);
        $data = explode(",", $line);
        if ($name == $data[0]) {
            continue;
        }
        if ($found[1] == $data[1]) {
            continue;
        }
        if ($data[2] < $found[5] || $data[2] > $found[6]) {
            continue;
        }
        if ($found[2] < $data[5] || $found[2] > $data[6]) {
            continue;
        }
        if ($data[4] != $found[4]) {
            continue;
        }
        if ($data[3][0] != $found[3][0] &&
            $data[3][1] != $found[3][1] &&
            $data[3][2] != $found[3][2] &&
            $data[3][3] != $found[3][3])
        {
            continue;
        }
        
        $matches[] = $data;
    }?>
    
    <h1>Matches for <?php echo $name; ?></h1>
    
    <?php
        foreach($matches as $match) {?>
            <div class="match">
                <img src="./images/match.png" alt="match"/>
                <p><?php echo $match[0]; ?></p>
                <ul>
                    <li>
                        <strong>gender: </strong>
                        <label class="column"><?php echo $match[1]; ?></label>
                    </li>
                    <li>
                        <strong>age: </strong>
                        <label class="column"><?php echo $match[2]; ?></label>
                    </li>
                    <li>
                        <strong>type: </strong>
                        <label class="column"><?php echo $match[3]; ?></label>
                    </li>
                    <li>
                        <strong>OS: </strong>
                        <label class="column"><?php echo $match[4]; ?></label>
                    </li>
                </ul>
            </div>
    <?php }?>
    <footer>
        <pre>
This page is for single nerds to meet and date each other!
Type in your personal information and wait for the nerdy luv to begin!
Thank you for using our site.
Results and page (C) Copyright NerdLuv Inc.
        </pre>
        <p>
            <a href="./index.php"><img src="./images/back.png" alt="back"/>Back to front page</a>
        </p>
    </footer>
</body>

</html>