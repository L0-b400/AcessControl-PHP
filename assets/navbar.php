<?php
require '../process/validate.php'
?>
<nav class="navbar">
    <div class="nav-left">
      <a href="index.php">Início</a>
      <a href="dashboard.php">Dashboard</a>
      <?php if ($tipo == "admin") {
        echo '<a href="../admin/register.php">Register</a>';
      };
      ?>
      
      <!-- adicione outros links aqui -->
    </div>
    <div class="nav-right user-info">
      Olá, <?= $nome ?> (<?= $tipo ?>)
      <a href="logout.php" style="color:#f66;">Sair</a>
    </div>
</nav>