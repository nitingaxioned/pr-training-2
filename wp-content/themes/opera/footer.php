<!--footer section start-->
<footer>
    <div class="wrapper">
        <div class="footer-intro">

        </div>
        <div class="footer-nav">
            <nav>
                <?php wp_nav_menu(array(
                    'theme_location' => 'primary-menu',
                    'menu_class' => 'nav-list'
                ))?>
            </nav>
            <div class="footer-sub-nav">
                <a class="microsoft-bi" href="#FIXME">Microsoft BI Site Health </a>
            </div>
        </div>
    </div>
    <div class="footbar">footbar</div>
</footer>
<!--footer section end-->
</div>
<!--container end-->
<?php wp_footer(); ?>
</body>
</html>