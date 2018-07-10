<div id="zoek_wrap">
<p><b>Zoeken naar een article:</b></p>
<form>
    Keyword:<input type="text" onkeyup="showHint(this.value)">
</form>
<span id="txtHint"></span>
</div>
<script>
    function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "getsuggestion.php?q=" + str, true);
            xmlhttp.send();
        }
    }
</script>
