<?php
  $session = session();
?>
<nav class="navbar navbar-expand-md navbar-dark bg-info fixed-top">
      <a class="navbar-brand" href="<?= site_url('home/index') ?>"> <img src="<?= base_url() ?>/img/LogoVijipi.png" width="110"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <?php if($session->get('isLoggedIn')): ?>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= site_url('home/index')?>">Home</a>
          </li>
            <li class="nav_item active">
              <a class="nav-link" href="<?= site_url('etalase/index') ?>">Products</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?= site_url('etalase/indexpromo') ?>">Promo</a>
            </li>
            
            <!-- menu dibawah hanya bisa diakses admin -->
            
            <?php if(session()->get('role')==0): ?>
            <li class="nav_item active">
              <a class="nav-link" href="<?= site_url('barang/create') ?>">Add Product</a>
            </li>
            <li class="nav_item active">
              <a class="nav-link" href="<?= site_url('barang/index') ?>">Manage Product</a>
            </li>
            <li class="nav_item active">
              <a class="nav-link" href="<?= site_url('promo/create') ?>">Add Promo</a>
            </li>
            <li class="nav_item active">
              <a class="nav-link" href="<?= site_url('promo/index') ?>">Manage Promo</a>
            </li>
            <!-- sampai disini -->
          <?php endif ?>
        </ul>
        <?php endif ?>

        <div class="form-inline my-2 my-lg-0">
          <ul class="navbar-nav mr-auto">
            <?php if($session->get('isLoggedIn')): ?>
              <li class="nav-item">
                <a class="btn btn-info" href="<?= site_url('auth/logout') ?>">Logout</a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="btn btn-info" href="<?= site_url('auth/login')?>">Login</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-info" href="<?= site_url('auth/register') ?>">Register</a>
              </li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>