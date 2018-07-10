<div id="beheer_wrap">
<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Content</th>
        <th>Imagelink</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
        {foreach from=$all_articles item=article}
            <tr>
                <td>{$article[0]}</td><td>{$article[1]}</td><td>{$article[2]}</td><td>{$article[3]}</td>
                <td>
                    <a href="index.php?page=delete&id={$article[0]}" class="verwijderen">Verwijderen</a>
                </td>
                <td>
                    <a href="index.php?page=edit&id={$article[0]} " class="edit">Edit</a>
                </td>
            </tr>
            {/foreach}

</table>
</div>