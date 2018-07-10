{foreach from=$formvars item=formvar}
    <div id='edit_wrapper'>
        <h2>Edit id{$formvar[0]}</h2>
        <form method='post' action='index.php?page=verwerkedit'>
            <input type='hidden' name='id' value={$formvar[0]}>
            <label>Title:<br><input name='title' value='{$formvar[1]}' <br></label><br>
            <label>Content:<br><textarea rows='30' cols='100' name='content'>{$formvar[2]}</textarea><br></label>
            <label>Imagelink:<input name='imagelink' value='{$formvar[3]}'<br></label>
            <input type='submit' name='submit' value='Edit'>
        </form>
    </div>
    {/foreach}