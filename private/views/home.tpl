
<div id="wrap-home">
    <img src="img/news.png">
</div>
{foreach from=$home item=home_article}
<div id='homenews'>
    <div id="home-text">
        <h1>{$home_article[0]}</h1>
        <br>
        <p>{$home_article[1]}</p>
        <br>
    </div>
    <div id="home-img">
        <img class="modal-item" src="{$home_article[2]}" alt="{$home_article[0]}" />
    </div>
</div>
    {/foreach}
    <div id="myModal" class="modal">
        <div class="modalContent">
            <span class="close">X</span>
            <img class="modal-content" id="img01">
            <div id="caption">
            </div>
        </div>
    </div>

<script>
    var modal = document.getElementById('myModal');

    var img = document.querySelectorAll('.modal-item');
    var modalImg = document.getElementById("img01");
    var caption = document.getElementById("caption");

    for(i = 0; i<img.length; i++){
        img[i].onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            caption.innerHTML = this.alt;

        }
    }

    var span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
        modal.style.display = "none";
    }
</script>




