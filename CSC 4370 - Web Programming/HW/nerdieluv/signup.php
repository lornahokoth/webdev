<head>
    <link rel="stylesheet" href="./nerdieluv.css">
    <title>NerdLuv</title>
</head>
<header id="bannerarea">
    <img src="./images/nerd-love.png" alt="nerd love logo" />
    <br>
    <label>Where meek geeks meet!</label>
</header>
<fieldset>
    <legend>
        New User Signup:
    </legend>
    <form action="./signup-submit.php" method="POST">
        <dl>
            <label><strong>Name:</strong></label>
            <div>
                <input type="text" name="name" size="16" />
            </div>

            <label><strong>Gender:</strong></label>
            <div>
                <input type="radio" name="gender" id="male" value="Male" />
                <label for="male"> Male </label>
                <input type="radio" name="gender" id="female" value="Female" />
                <label for="female"> Female </label>
            </div>
            <label><strong>Age:</strong></label>
            <div>
                <input type="number" name="age" maxlength="2" size="6" />
            </div>
            <label><strong>Personality Type:</strong></label>
            <div>
                <input type="text" name="name" maxlength="4" size="6" />
            </div>
            <label><strong>Favorite OS:</strong></label>
            <div>
                <select name="section" id="class">
                    <option value="WS">Windows</option>
                    <option value="MS">Mac OS X</option>
                    <option value="LX">Linux</option>

                </select>
            </div>
            <label><strong>Seeking age:</strong></label>
                <input type="text" placeholder="min" name="minAge" maxlength="2" size="6" />
                <label for="to"> to </label>
                <input type="text" placeholder="max" name="maxAge" maxlength="2"  size="6" />
            </div>
        </dl>

        <div>
            <input name="form" type="submit" value="Submit" />
        </div>
    </form>
</fieldset>
