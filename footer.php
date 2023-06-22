    <?php wp_footer();?>
    
    <footer class="footer">
      <div class="footer__wrapper">
        <a href="<?php echo site_url('/')?>">BLOG</a>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        <p>Copyrights 2022. All Right Reserved</p>
        <?php echo get_template_directory();?>
        <?php echo get_template_directory_uri();?>
      </div>
    </footer>
  </body>
</html>