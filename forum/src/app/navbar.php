
<!-- Navbar -->
    <nav class="navbar">
        <ul class="navbardefault">
            <li class="nav"><a href="index.php">Forum</a></li>
            <li class="nav"><a href="#">Contact</a></li>
            <?php if(isLoggedIn()): ?>
                <li style="float: right" class="nav"><a>Welkom <?php echo $_SESSION['username'] ?></a></li>
                <li style="float: right" class="nav"><a href="logout.php">Logout</a></li>
                <li style="float: right" class="nav"><a href="profiel.php">Mijn profiel</a></li>
                <?php if(isAdmin()): ?>
                    <li style="float: right" class="nav"><a href="adminpanel.php">Adminpanel</a></li>
                <?php endif; ?>
            <?php else: ?>
                <li style="float: right" class="nav"><a href="login.php">Login</a></li>
                <li style="float: right" class="nav"><a href="Register.php">Registreren</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <!---- einde navbar -->

