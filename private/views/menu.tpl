<div class="balk">
    <div id="zoek">
    <form method="get" action="index.php">
        <input type="hidden" name="page" value="news">
        <input id="zoekveld" placeholder="Search.." name="searchterm">
        <input id="zoekknop" type="submit" name="submit" value="zoek">
    </form>
    </div>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.php?page=home">HOME</a>
    <a href="index.php?page=news">NEWS</a>
    <a href="index.php?page=contact">CONTACT</a>
    <a href="index.php?page=zoek">ZOEKEN</a>
    <a href="index.php?page=terms">TERMS</a>
</div>

    <span onclick="openNav()"><i class="fas fa-bars barsmenu"></i></i></span>
</div>
    <script>function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        } </script>

