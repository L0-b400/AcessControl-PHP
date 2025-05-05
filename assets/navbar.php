<?php
require '../process/validate.php'
?>
<nav>
      <div class="logo">
        <img src="assets/img/logo.png" alt="logo" />
      </div>
      <div class="center">
        <ul>
        <li>
          <a href="#">Home</a>
        </li>
        <li>
          <a href="../public/dashboard.php">Dashboard</a>
        </li>
        <li>
          <?php if ($tipo == "admin") {
          echo '<a href="../admin/register.php">Register</a>';
          };?>
        </li>
        <li>
          <a href="https://wa.me/51996811385">Help Us</a>
        </li>
        </ul>
      </div>
      <ul>
      
        <li>
        Olá, <?= $nome ?> (<?= $tipo ?>)
        <a class="red" href="logout.php">Sair</a>
        </li>
      </ul>


      <div class="hamburger">
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
      </div>
    </nav>
    <!-- <div class="menubar">
      <ul>
        <li>
          <a href="#">Home</a>
        </li>
        <li>
          <a href="#">Services</a>
        </li>
        <li>
          <a href="#">Blog</a>
        </li>
        <li>
          <a href="#">Contact Us</a>
        </li>
      </ul>
    </div>
    <script src="../assets/js/scripts.js"></script> -->