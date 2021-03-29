<?php
    $difficulties = array('beginner', 'intermediate', 'expert', 'master');
    if(!empty($_GET['difficulty']) && in_array($_GET['difficulty'], $difficulties)) {
        $difficulty = $_GET['difficulty'];
    } else {
        $difficulty = "beginner";
    }
    $fileData = file_get_contents("../textfile/leaderboard-$difficulty.txt");
    $fileArray = explode(PHP_EOL, $fileData);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Leaderboard</title>
    <link rel="icon" href="../assets/Logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="../css/format.css" />
    <link rel="stylesheet" href="../css/leaderboard.css" />
</head>

<body class="background">
    <div id="Background">
        <?php include("top.php"); ?>
        <div id="main-container">
            <div id="middle-row">
                <div id="levels">
                    <a href="./leaderboard.php?difficulty=beginner" class="lvl <?php if($difficulty == 'beginner') { echo 'selected'; }?>">BEGINNER</a>
                    <a href="./leaderboard.php?difficulty=intermediate" class="lvl <?php if($difficulty == 'intermediate') { echo 'selected'; }?>">INTERMEDIATE</a>
                    <a href="./leaderboard.php?difficulty=expert" class="lvl <?php if($difficulty == 'expert') { echo 'selected'; }?>">EXPERT</a>
                    <a href="./leaderboard.php?difficulty=master" class="lvl <?php if($difficulty == 'master') { echo 'selected'; }?>">MASTER</a>
                </div>
            </div>
            <div id="bottom-row">
                <div id="play-container">
                    <a href="./play.php" id="play-button">
                        PLAY NOW!
                    </a>
                </div>
                <div id="leaders-container">
                    <?php
                        $count = 1;
                        foreach($fileArray as $leader) {
                            if($leader != '') {
                                $data = explode('|', $leader);
                    ?>
                        <div class="leader">
                            <div class="leader-num"><?php echo $count?></div>
                            <div class="leader-name"><?php echo $data[0]; ?></div>
                            <div class="leader-time"><?php echo gmdate("H:i:s", $data[1]) . substr(round(substr($data[1], strpos($data[1], '.')), 4), 1); ?></div>
                        </div>
                    <?php
                            }
                            $count++;
                        }
                    ?>
                </div>
            </div>
            <?php include("bottom.html"); ?>
        </div>
    </div>
</body>

</html>