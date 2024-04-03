  <!--Footer-->
  <footer class="bg-light text-lg-left fixed-bottom">
           <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright
      </div>
      <!-- Copyright -->
    </footer>
    <!--Footer-->
    
  </body>

  <!-- MDB -->
  <script type="text/javascript" src="<?=URL;?>public/MDB/js/mdb.min.js"></script>
  <script src="<?=URL;?>public/js/axios.min.js"></script> 
  <script src="<?=URL;?>public/js/libs.js"></script> 
    <?php 
    if (isset($this->js)) 
    {
        foreach ($this->js as $js)
        {
            echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
        }
    }
    ?>
</html>