<footer>
   <div class="recruit">
       <div class="title">採用情報</div>
       <div class="mintitle">RECRUIT</div>
       <div class="conts">KAGUの新卒・中途採用情報を掲載しております。<br>アルバイト情報についても掲載しております。</div>
       <div class="btn">採用情報一覧へ</div>
    </div>
    
  <div class="footer-inner">
      
      <div class="footer-flex">
          
      <div class="info">
          <div class="title">KAGU</div>
          <div class="mintitle">株式会社KAGU</div>
          <div class="address">愛知県名古屋市○○区○○町xx-x</div>
          <div class="tel">TEL.052-000-0000</div>
      </div>
      
      <!--フッターナビ-->
    <div class="footer-nav-area">
      <?php wp_nav_menu( array(
            'theme_location' => 'footer-nav',
            'container' => 'nav',
            'container_class' => 'footer-nav',
            'container_id' => 'footer-nav',
            'fallback_cb' => ''
            ) ); ?>
    </div>
          
      </div>
      
      
    <div class="clear">
    <div class="copyright">
      <p>©2020<?php bloginfo( 'name' ); ?>inc.</p>
    </div>
        <div class="privacy"><p>プライバシーポリシー</p></div>
      </div>
      
  </div>
    
</footer>

<?php wp_footer(); ?>
</body>
</html>

