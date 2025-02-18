<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Manipulation</title>
</head>
<body>
    <h1>Example String Manipulation</h1>
    <?php

    $firstName = "Harry";
    $lastName = "Potter";

    $fullName = $firstName . " " . $lastName;
    $fullNameUpper = strtoupper($fullName);
    $nameLength = strlen($fullName);
    $uniqueID = str_replace(" ", "-", $fullName);
    $extractedFirstName = substr($fullName, 0, strpos($fullName, " "));
    $extractedLastName = substr($fullName, strpos($fullName, " ") + 1);

    echo "<p>Full Name: $fullName</p>";
    echo "<p>Full Name (Uppercase): $fullNameUpper</p>";
    echo "<p>Length of Full Name: $nameLength characters</p>";
    echo "<p>Unique ID: $uniqueID</p>";
    echo "<p>Extracted First Name: $extractedFirstName</p>";
    echo "<p>Extracted Last Name: $extractedLastName</p>";

    # Count letter r
    $charToCount = "r";
    $charCount = substr_count($fullName, $charToCount);
    echo "<p>The character '$charToCount' appears $charCount times in
    '$fullName'.</p>";

    # Trim extra whitespace
    $rawInput = " Hermione Granger ";
    $cleanedInput = trim($rawInput);
    echo "<p>Original String (with spaces): '$rawInput'</p>";
    echo "<p>Cleaned String: '$cleanedInput'</p>";

    # Convert to title case
    $sentence = "harry potter and the goblet of fire.";
    $titleCase = ucwords($sentence);
    echo "<p>Original Sentence: $sentence</p>";
    echo "<p>Title Case: $titleCase</p>";

    # Count words in a sentence
    $text = "Harry Potter and the Order of the Phoenix.";
    $wordCount = str_word_count($text);
    echo "<p>The sentence: '$text'</p>";
    echo "<p>Number of words: $wordCount</p>";

    # Find and replace word in string
    $sentence = "Hogwarts is a magical place to learn.";
    $wordToReplace = "magical";
    $replacementWord = "enchanted";
    $modifiedSentence = str_replace($wordToReplace, $replacementWord,
    $sentence);
    echo "<p>Original Sentence: $sentence</p>";
    echo "<p>Modified Sentence: $modifiedSentence</p>";

    # Work with arrays
    $houses = "Gryffindor,Hufflepuff,Ravenclaw,Slytherin";
    $houseArray = explode(",", $houses);
    $randomHouse = $houseArray[array_rand($houseArray)];
    echo "<p>Welcome to Hogwarts! The Sorting Hat has placed you in:
    $randomHouse</p>";

    ?>
</body>
</html>