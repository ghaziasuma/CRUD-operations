<!-- soll nur angezeigt werden, wenn icht angemeldet -->
<?php if(!isset($_SESSION['id']) && !isset($_SESSION['login']) ): ?>

<div class="index">
    <!-- logo -->
    <div>
        <a href="index.php?page=index"><img src="images/logo.png" alt="Logo Time Machine"></a>
    </div>

    <!-- text -->
    <div class="f-white">
        <h2>Time to travel</h2>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor</p>
    </div>

    <!-- weiterleitung zum Login -->
    <div>
        <a href="index.php?page=login" class="button btn w-60 white f-blue">Zeitreise starten</a>
    </div>
</div>

<?php endif; ?>