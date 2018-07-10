<div id="wrap">
    <div id="title">
        <img src="img/news.png">
    </div>
<div id="buttons2">
    {if $current_page gt 1}
        <a href="index.php?page=news&pageno={$current_page - 1}">PREVIOUS</a>
    {/if}
    {if $current_page lt $number_of_pages}
        <a href="index.php?page=news&pageno={$current_page + 1}">NEXT</a>
    {/if}
</div>
<div id="info">
    <h3>Number of pages: {$number_of_pages}</h3>
    <h3>Current page: {$current_page}</h3>
</div>
<div id="content">
<p>
    {foreach from=$articles item=article}
    <h2>{$article[0]}</h2>
    <p>{$article[1]}</p>
<img src="{$article[2]}" alt="geen img" />
    <p>{$article[3]}</p>
{/foreach}
</p>
</div>
</div>