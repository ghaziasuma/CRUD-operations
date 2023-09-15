<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Time Machine</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <!-- wenn angemeldet header anzeigen -->
        <?php if(isset($_SESSION['id']) && isset($_SESSION['login'])): ?>
            <header class="header p-2">
                <div class="mb-2">
                    <div class="avatar w-40" >
                        <img src="images/icon_bild.png" alt="Avatar">
                    </div>
                    
                    <nav class="nav">
                        <a href="#open" class="open" id="open"></a>
                        <a href="#" class="close mt-1"></a>
                        <ul class="pt-4">
                            <li class="mb-1"> <a href="index.php?page=home">Home</a></li>
                            <li class="mb-1"> <a href="index.php?page=profil">Mein Profil</a></li>
                            <li class="mb-1"> <a href="auth/users/logout.php">Logout</a> </li>
                            <li class="mb-1"> <a href="index.php?page=impressum">Impressum</a> </li>
                        </ul>
                    </nav>

                </div>

                <?php 
                    $id = $_SESSION['id'];
                    $stmt = $db->prepare('SELECT * FROM `users` WHERE `id` = :id'); 
                    $stmt->bindValue('id', $id);
                    $stmt->execute();
                    $result = $stmt->fetch();
                ?>
                <div class="name">
                    <h3><?= $result['vorname'].' '.$result['name']; ?></h3>
                </div>
            </header>

        <!-- endif isset session login -->
        <?php endif; ?>

        <?php if(isset($_SESSION['msg'])): ?>
        <div><?= $_SESSION['msg']; unset($_SESSION['msg']); ?></div>
        <?php endif; ?>

    