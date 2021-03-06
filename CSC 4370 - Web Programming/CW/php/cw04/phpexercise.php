<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PHP Exercise</title>
</head>

<body>
  <h2>Exercise 1: Function</h2>
  <p>
    <?php
    echo "Hello world!"
    ?>
  </p>
  
  <h2>Exercise 2: Loops</h2>
  <?php
  for ($i = 1; $i <= 5; $i++) {
    for ($j = 0; $j < $i; $j++) {
      echo "*";
    }
    echo "<br>";
  }
  ?>
  
  <h2>Exercise 3: Loops</h2>
  <?php
  function triangle($x){
    for ($i = 1; $i <= $x; $i++) {
      for ($j = 0; $j < $i; $j++) {
        echo "*";
      }
      echo "<br>";
    }
  }
  triangle(10);
  ?>
  
  <h2> Exercise 4: Function</h2>
  <?php
    function word_count($word){
      $word = trim($word);
      $prev = $word[0];
      $wordCount = 0;
      for($i = 1; $i < strlen($word); $i++) {
        if($word[$i] == ' ' && $prev != ' ') {
          $wordCount++;
        }
        $prev = $word[$i];
      }
      if($word[strlen($word) - 1] != ' ') {
        $wordCount++;
      }
      return $wordCount;
    }
    $sentence = "The quick brown fox jumps over the lazy dog.";
    echo "There are " . word_count($sentence) . " word(s) in \"" . $sentence . "\"";
  ?>
  
  <h2> Exercise 5: Function</h2>
  <?php
    function countWords($sentence){
      $sentence = strtolower($sentence);
      $sentence = trim($sentence);
      $sentence = str_replace([',', '!', '?', '.'], '', $sentence);
      $words = explode(' ', $sentence);
      $countArray = array();
      foreach($words as $word) {
        if(isset($countArray[$word])) {
          $countArray[$word]++;
        } else {
          $countArray[$word] = 1;
        }
      }
      
      return $countArray;
    }
    $sentence = "These are words.  The words are great.  Let's count the words.";
    echo "Words: \"$sentence\"<br>";
    echo "Word | Count<br>";
    foreach(countWords($sentence) as $key => $value) {
      if($key != '') {
        echo "$key | $value<br>";
      }
    }
  ?>
  
  <h2> Exercise 6: Function</h2>
  <?php
    function removeChar($sentence, $remove){
      $newSentence = '';
      for($i = 0; $i < strlen($sentence); $i++) {
        if($sentence[$i] != $remove) {
          $newSentence = $newSentence . $sentence[$i];
        }
      }
      
      return $newSentence;
    }
    $sentence = "These are words.  The words are great.  Let's count the words.";
    $char = 'e';
    echo "Sentence: \"$sentence\"<br>";
    echo "Character: \"$char<br>\"";
    echo "Removed: \"" . removeChar($sentence, $char) . "\"";
  ?>
</body>

</html>