<body id="colored">
<div class="container-fluid">

  <!-- Navigation -->
  <nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header transparent">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php
        echo base_url();
        ?>">
          CrypTux
        </a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <?php
          if (!empty($this->session->userdata['userData']['id'])){?>
          <li>
            <a href="<?php
            echo base_url();
            ?>">Play now</a>
          </li>
          <?php } ?>
          <li>
            <a href="<?php
            echo base_url();
            ?>game">Game</a>
          </li>
          <li>
            <a href="<?php
            echo base_url();
            ?>leaderboard">Leaderboard</a>
          </li>
          <li>
            <a href="<?php
            echo base_url();
            ?>clues">Clues</a>
          </li>
          <li>
            <a href="<?php
            echo base_url();
            ?>developers">Developers</a>
          </li>
          <?php
          if (!empty($this->session->userdata['userData']['id'])){?>
          <li>
            <a href="<?php
            echo base_url();
            ?>profile">Profile</a>
          </li>
          <li>
            <a href="<?php
            echo base_url();
            ?>user_authentication/logout">Logout</a>
          </li>
          <?php }  else {?>
            <li>
              <a href="<?php
              echo base_url();
              ?>user_authentication">Play now</a>
            </li>
            <?php }?>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>
</div>
