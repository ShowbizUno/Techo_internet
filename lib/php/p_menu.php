<nav class="navbar navbar-expand-md navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <img src="./admin/images/logo.png" alt="logo"/>
        <img src="./admin/images/full_logo2.png" alt="logo"/>&nbsp;
        <span class="navbar-toggler-icon"></span>&nbsp;
        <a href="index.php?page=login.php" class="black font-weight-bold">
             <!--<i class="fas fa-key"></i> ou autre icône -->
        </a>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a href="" class="navbar-brand collapse navbar-collapse">
            <img src="./admin/images/full_logo2.png" alt="logo" id="logo_haut_page">
        </a>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="./index.php?page=accueil.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Boutique
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">CD</a>
                    <a class="dropdown-item" href="#">DVD</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./index.php?page=instruments_digitaux.php">Instruments</a>
                </div>
            </li>
            <li class="nav-item active">
                <?php if (!isset($_SESSION['client'])) { ?>
                    <a class="nav-link" href="./index.php?page=inscription.php">S'inscrire <span class="sr-only">(current)</span></a>
                    <?php }
                ?>
            </li>
            <li class="nav-item active">
                <?php if (!isset($_SESSION['client'])) { ?>
                    <a class="nav-link" href="./index.php?page=login.php">Connect admin <span class="sr-only">(current)</span></a>
                    <?php }
                ?>
            </li>
            <li class="nav-item active">
                <?php if (!isset($_SESSION['client'])) { ?>
                    <a class="nav-link" href="./index.php?page=logincli.php">Connect client <span class="sr-only">(current)</span></a>
                    <?php
                } else {
                    ?>
                    <a class="nav-link" href="./index.php?page=disconnect.php">Deconnexion</a>
                <?php }
                ?>
            </li>
        </ul>
        <!--<form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>-->
    </div>
</nav>
<br>