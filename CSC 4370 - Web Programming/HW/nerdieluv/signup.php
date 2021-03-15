<head>
    <link rel="stylesheet" href="./nerdieluv.css">
    <title>NerdLuv</title>
</head>
<header id="bannerarea">
    <img src="./images/nerd-love.png" alt="nerd love logo" />
    <br>
    <label>Where meek geeks meet!</label>
</header>
<form action="./signup-submit.php" method="POST">
    <dl>
        <dt>Name:</dt>
        <div>
            <input type="text" name="name" size="16" />
        </div>

        <dt>Gender:</dt>
        <div>
            <input type="radio" name="gender" id="male" value="Male" />
            <label for="male"> Male </label>
            <input type="radio" name="gender" id="female" value="Female" />
            <label for="female"> Female </label>
        </div>
        <dt>Age:</dt>
        <div>
            <input type="number" name="age" maxlength="2" size="6" />
        </div>
        <dt>Personality Type: </dt>
        <div>
            <input type="text" name="name" maxlength="4" size="6" />
        </div>
        <dt>Favorite OS:</dt>
        <div>
            <select name="section" id="class">
                <option value="WS">Windows</option>
                <option value="MS">Mac OS X</option>
                <option value="LX">Linux</option>

            </select>
        </div>
        <dt>Seeking age:</dt>
        <div>

            <input type="number" name="minAge" size="6" />
            <label for="to"> to </label>
            <input type="number" name="maxAge" size="6" />
        </div>
    </dl>

    <div>
        <input name="form" type="submit" value="Submit" />
    </div>
</form>