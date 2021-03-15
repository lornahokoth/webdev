<form action="./signup-submit.php" method="POST">
    <dl>
        <dt>Name:</dt>
        <dd>
            <input type="text" name="name" />
        </dd>

        <dt>Gender: </dt>
        <dd>
            <input type="radio" name="gender" id="male" value="Male" />
            <label for="male"> Male </label>
            <input type="radio" name="gender" id="female" value="Female" />
            <label for="female"> Female </label>
        </dd>
        <dt>Age: </dt>
        <dd>
            <input type="text" name="name" />
        </dd>
        <dt>Personality Type: </dt>
        <dd>
            <input type="text" name="name" />
        </dd>
        <dt>Favorite OS: </dt>
        <dd>
          <select name="section" id="class">
            <option value="WS">Windows</option>
            <option value="MS">MacOS</option>
            <option value="LX">Linux</option>
            
          </select>
        </dd>
    </dl>

    <div>
        <input name="form" type="submit" value="Submit" />
    </div>
</form>