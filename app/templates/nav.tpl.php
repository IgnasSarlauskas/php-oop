<!--<nav>
        <div class="wrapper">
                <a href="/"><img src="media/icon.png" alt="icon"></a>
                <ul>
                        <li><a href="drinks.php">Drinks</a></li>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="#">Logout</a></li>
                </ul>
        </div>
</nav>-->




<?php if (isset($data) && !empty($data)): ?>
    <nav>
        <div class="wrapper">
            <a href="/"><img src="<?php print $data['image']; ?>" alt="icon"></a>
            <ul>
                <?php foreach ($data['links'] as $link): ?>
                    <li><a href="<?php print $link['url']; ?>"><?php print $link['title']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>      
<?php endif; ?>
