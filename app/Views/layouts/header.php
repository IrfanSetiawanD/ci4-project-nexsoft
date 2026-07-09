<?php

$current = service('uri')->getSegment(1);

?>

<header class="fixed top-0 left-0 w-full z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 shadow-sm">

  <div class="max-w-7xl mx-auto px-6 lg:px-8">

    <div class="flex items-center justify-between h-20">

      <!-- Logo -->
      <a href="<?= base_url('/') ?>" class="flex items-center gap-3">

        <div class="w-11 h-11 rounded-xl bg-indigo-700 flex items-center justify-center">
          <i class="fa-solid fa-cube text-white text-lg"></i>
        </div>

        <div>
          <h1 class="text-xl font-bold text-gray-900">
            NexSoft
          </h1>

          <p class="text-xs text-gray-500">
            Commerce
          </p>
        </div>

      </a>

      <!-- Desktop Menu -->
      <nav class="hidden lg:flex items-center gap-8">

        <a href="<?= base_url('/') ?>"
          class="font-medium transition <?= $current == '' ? 'text-indigo-700' : 'text-gray-700 hover:text-indigo-700' ?>">
          Home
        </a>

        <a href="<?= base_url('products') ?>"
          class="font-medium transition <?= $current == 'products' ? 'text-indigo-700' : 'text-gray-700 hover:text-indigo-700' ?>">
          Products
        </a>

        <a href="<?= base_url('services') ?>"
          class="font-medium transition <?= $current == 'services' ? 'text-indigo-700' : 'text-gray-700 hover:text-indigo-700' ?>">
          Services
        </a>

        <a href="<?= base_url('blog') ?>"
          class="font-medium transition <?= $current == 'blog' ? 'text-indigo-700' : 'text-gray-700 hover:text-indigo-700' ?>">
          Blog
        </a>

        <a href="<?= base_url('about') ?>"
          class="font-medium transition <?= $current == 'about' ? 'text-indigo-700' : 'text-gray-700 hover:text-indigo-700' ?>">
          About
        </a>

      </nav>

      <!-- Right -->
      <div class="hidden lg:flex items-center gap-4">

        <a href="<?= base_url('contact') ?>"
          class="border border-indigo-700 text-indigo-700 px-5 py-2.5 rounded-xl font-semibold hover:bg-indigo-700 hover:text-white transition">

          Contact Sales

        </a>

        <a href="<?= base_url('products') ?>"
          class="bg-indigo-700 text-white px-5 py-2.5 rounded-xl font-semibold hover:bg-indigo-800 transition">

          Explore Products

        </a>

      </div>

      <!-- Mobile Button -->
      <button id="mobileMenuBtn"
        class="lg:hidden text-2xl text-gray-700">

        <i class="fa-solid fa-bars"></i>

      </button>

    </div>

  </div>

  <!-- Mobile Menu -->
  <div id="mobileMenu"
    class="hidden lg:hidden bg-white border-t border-gray-200">

    <div class="flex flex-col px-6 py-5 space-y-4">

      <a href="<?= base_url('/') ?>">Home</a>

      <a href="<?= base_url('products') ?>">Products</a>

      <a href="<?= base_url('services') ?>">Services</a>

      <a href="<?= base_url('blog') ?>">Blog</a>

      <a href="<?= base_url('about') ?>">About</a>

      <a href="<?= base_url('contact') ?>">Contact</a>

      <hr>

      <a href="<?= base_url('contact') ?>"
        class="text-indigo-700 font-semibold">

        Contact Sales

      </a>

      <a href="<?= base_url('products') ?>"
        class="text-indigo-700 font-semibold">

        Explore Products

      </a>

    </div>

  </div>

</header>

<script>
  const btn = document.getElementById('mobileMenuBtn');
  const menu = document.getElementById('mobileMenu');

  btn.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
</script>