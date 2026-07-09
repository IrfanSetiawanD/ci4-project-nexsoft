<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php $product = $product ?? []; $relatedProducts = $relatedProducts ?? []; ?>

<!-- Breadcrumb -->
<section class="bg-gray-100 border-b">

  <div class="max-w-7xl mx-auto px-6 lg:px-8 py-4">

    <div class="flex items-center gap-2 text-sm text-gray-500">

      <a href="<?= base_url() ?>" class="hover:text-indigo-700">
        Home
      </a>

      <span>/</span>

      <a href="<?= site_url('products') ?>" class="hover:text-indigo-700">
        Products
      </a>

      <span>/</span>

      <span class="text-gray-800 font-medium">
        <?= esc($product['name'] ?? '') ?>
      </span>

    </div>

  </div>

</section>

<!-- Product -->
<section class="py-16 bg-white">

  <div class="max-w-7xl mx-auto px-6 lg:px-8">

    <div class="grid lg:grid-cols-2 gap-16">

      <!-- Image -->
      <div>

        <div class="rounded-3xl overflow-hidden shadow-lg border">

          <img
            src="<?= base_url('uploads/products/' . ($product['image'] ?? 'no-image.png')) ?>"
            alt="<?= esc($product['name']) ?>"
            class="w-full h-[500px] object-cover">

        </div>

        <div class="grid grid-cols-4 gap-4 mt-6">

          <div class="border rounded-xl overflow-hidden">

            <img
              src="<?= base_url('uploads/products/' . ($product['image'] ?? 'no-image.png')) ?>"
              class="w-full h-24 object-cover">

          </div>

          <div class="border rounded-xl overflow-hidden">

            <img
              src="<?= base_url('uploads/products/' . ($product['image'] ?? 'no-image.png')) ?>"
              class="w-full h-24 object-cover">

          </div>

          <div class="border rounded-xl overflow-hidden">

            <img
              src="<?= base_url('uploads/products/' . ($product['image'] ?? 'no-image.png')) ?>"
              class="w-full h-24 object-cover">

          </div>

          <div class="border rounded-xl overflow-hidden">

            <img
              src="<?= base_url('uploads/products/' . ($product['image'] ?? 'no-image.png')) ?>"
              class="w-full h-24 object-cover">

          </div>

        </div>

      </div>

      <!-- Detail -->
      <div>

        <span class="inline-block bg-indigo-100 text-indigo-700 px-4 py-2 rounded-full text-sm font-semibold">

          <?= esc($product['category_name']) ?>

        </span>

        <h1 class="mt-5 text-5xl font-bold text-gray-900">

          <?= esc($product['name']) ?>

        </h1>

        <p class="mt-6 text-lg text-gray-600">

          <?= esc($product['short_description']) ?>

        </p>

        <!-- Info -->
        <div class="mt-10 space-y-4">

          <div class="flex justify-between border-b pb-3">

            <span class="font-semibold">
              Brand
            </span>

            <span>
              <?= esc($product['brand_name']) ?>
            </span>

          </div>

          <div class="flex justify-between border-b pb-3">

            <span class="font-semibold">
              Principal
            </span>

            <span>
              <?= esc($product['principal_name']) ?>
            </span>

          </div>

          <div class="flex justify-between border-b pb-3">

            <span class="font-semibold">
              License
            </span>

            <span>
              <?= esc($product['license_type_name']) ?>
            </span>

          </div>

          <div class="flex justify-between border-b pb-3">

            <span class="font-semibold">
              SKU
            </span>

            <span>
              <?= esc($product['sku']) ?>
            </span>

          </div>

          <div class="flex justify-between border-b pb-3">

            <span class="font-semibold">
              Availability
            </span>

            <span class="text-green-600 font-semibold">

              <?= esc($product['stock_status']) ?>

            </span>

          </div>

        </div>

        <!-- Price -->
        <div class="mt-10">

          <div class="text-4xl font-bold text-indigo-700">

            Rp <?= number_format($product['price'], 0, ',', '.') ?>

          </div>

        </div>

        <!-- CTA -->
        <div class="flex flex-wrap gap-4 mt-10">

          <a
            href="<?= site_url('contact') ?>"
            class="px-8 py-4 rounded-xl bg-indigo-700 text-white hover:bg-indigo-800 transition">

            Request Quotation

          </a>

          <a
            href="https://wa.me/6281234567890"
            target="_blank"
            class="px-8 py-4 rounded-xl border border-green-600 text-green-600 hover:bg-green-600 hover:text-white transition">

            WhatsApp Sales

          </a>

        </div>

      </div>

    </div>

  </div>

</section>

<!-- Description -->
<section class="py-20 bg-gray-50">

  <div class="max-w-7xl mx-auto px-6 lg:px-8">

    <h2 class="text-3xl font-bold">

      Product Description

    </h2>

    <div class="mt-8 prose max-w-none">

      <?= $product['description'] ?>

    </div>

  </div>

</section>

<!-- Related Products -->
<section class="py-20">

  <div class="max-w-7xl mx-auto px-6 lg:px-8">

    <div class="flex justify-between items-center mb-10">

      <h2 class="text-3xl font-bold">

        Related Products

      </h2>

      <a
        href="<?= site_url('products') ?>"
        class="text-indigo-700 hover:underline">

        View All →

      </a>

    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

      <?php if (!empty($relatedProducts)) : ?>

        <?php foreach ($relatedProducts as $item) : ?>

          <div class="bg-white rounded-2xl shadow hover:shadow-xl overflow-hidden transition">

            <img
              src="<?= base_url('uploads/products/' . ($item['image'] ?? 'no-image.png')) ?>"
              class="w-full h-52 object-cover">

            <div class="p-5">

              <h3 class="font-bold text-lg">

                <?= esc($item['name']) ?>

              </h3>

              <a
                href="<?= site_url('products/' . $item['slug']) ?>"
                class="inline-block mt-5 text-indigo-700 font-semibold">

                View Details →

              </a>

            </div>

          </div>

        <?php endforeach; ?>

      <?php else : ?>

        <div class="col-span-4 text-center py-12 text-gray-500">

          No related products found.

        </div>

      <?php endif; ?>

    </div>

  </div>

</section>

<?= $this->endSection() ?>