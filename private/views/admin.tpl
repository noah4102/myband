<div id="wrapper">
    <h1>CMS</h1>
    <a href="index.php?page=beheer">DELETE / EDIT</a>
    <a href="index.php?page=logout">Uitloggen</a>
    <br>
    <br>
    <form method="post" action="index.php?page=verwerkupload">
        <label for="title">Title:</label><br>
        <input name="title" required/><br>
        <label for="title">Content:</label><br>
        <textarea rows="10" cols="35" name="content" required></textarea><br>
        <label for="imagelink">Imagelink:</label><br>
        <input name="imagelink"/><br><br>
        <input type="date" id="date_id" name="date"/><br><br>
        <input type="submit" name="submit" value="Upload">
    </form>
    <hr>
    <h2>Add event</h2>
    <form method="post" action="index.php">
        <label for="title">Title:</label><br>
        <input id="title" name="title" class="cms_input" required placeholder="Title..."/><br>
        <label for="content">Content:</label><br>
        <textarea id="content" rows="10" cols="35" name="content" required placeholder="Content..."></textarea><br>
        <label for="date">Date:</label><br>
        <input type="date" id="date_id" name="date"/><br><br>
        <input type="submit" name="event_submit" value="Upload" class="upload_submit">
    </form>
</div>