
<footer class="footer-container">
    <ul>
        <?php
        $links = [
            ['url' => '#', 'label' => 'Mentions Légales'],
            ['url' => '#', 'label' => 'Vie privée'],
            ['url' => '#', 'label' => 'Tous les droits réservés']
        ];

        foreach ($links as $link) {
            echo '<li><a href="' . esc_url($link['url']) . '">' . esc_html($link['label']) . '</a></li>';
        }
       /* get_template_part('template_part/photo', 'single');*/
        ?>
    </ul>
</footer>

<?php wp_footer();
 ?>
</body>

</html>
