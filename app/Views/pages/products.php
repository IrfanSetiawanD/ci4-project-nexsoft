<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero -->
<section class="bg-gradient-to-r from-indigo-700 to-indigo-900 text-white">

  <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">

    <span class="uppercase tracking-widest text-indigo-200 text-sm">
      Software Catalog
    </span>

    <h1 class="mt-4 text-5xl font-bold">
      Original Software Products
    </h1>

    <p class="mt-6 max-w-3xl text-lg text-indigo-100">
      Browse our complete collection of software licenses,
      cloud subscriptions, cybersecurity solutions,
      productivity applications and enterprise software.
    </p>

  </div>

</section>

<section class="py-20 bg-gray-50">

  <div class="max-w-7xl mx-auto px-6 lg:px-8">

    <div class="grid lg:grid-cols-4 gap-10">

      <!-- LEFT SIDEBAR -->
      <aside>

        <h3 class="text-lg font-bold mb-6 uppercase tracking-wide">

          Product Categories

        </h3>

        <div class="bg-white rounded-2xl shadow overflow-hidden">

          <a href="<?= site_url('products') ?>"
            class="flex items-center justify-between px-6 py-4 border-b hover:bg-gray-50 <?= !isset($category) ? 'font-bold text-indigo-700' : '' ?>">

            <span>All Products</span>

            <i class="fa-solid fa-angle-right"></i>

          </a>

          <?php if (!empty($categories)) : ?>

            <?php foreach ($categories as $cat) : ?>

              <a href="<?= site_url('products/category/' . $cat['slug']) ?>"
                class="flex items-center justify-between px-6 py-4 border-b hover:bg-gray-50 <?= isset($category) && $category['id'] == $cat['id'] ? 'font-bold text-indigo-700 bg-indigo-50' : '' ?>">

                <span><?= esc($cat['name']) ?></span>

                <i class="fa-solid fa-angle-right"></i>

              </a>

            <?php endforeach; ?>
          <?php endif; ?>

        </div>

      </aside>

      <!-- RIGHT CONTENT -->
      <div class="lg:col-span-3">

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

          <?php if (!empty($products)) : ?>

            <?php foreach ($products as $product) : ?>

              <div class="bg-white rounded-2xl shadow hover:shadow-xl transition overflow-hidden">

                <img
                  src="<?= base_url('uploads/products/' . ($product['image'] ?: 'no-image.png')) ?>"
                  class="w-full h-56 object-cover"
                  alt="<?= esc($product['name']) ?>">

                <div class="p-6">

                  <span class="inline-block bg-indigo-100 text-indigo-700 text-xs px-3 py-1 rounded-full">

                    <?= esc($product['category_name'] ?? '-') ?>

                  </span>

                  <h3 class="mt-4 text-xl font-bold">

                    <?= esc($product['name']) ?>

                  </h3>

                  <p class="mt-3 text-gray-600 text-sm">

                    <?= esc($product['short_description']) ?>

                  </p>

                  <div class="mt-6 flex justify-between items-center">

                    <strong class="text-indigo-700 text-lg">

                      Rp <?= number_format($product['price']) ?>

                    </strong>

                    <a
                      href="<?= site_url('products/' . $product['slug']) ?>"
                      class="bg-indigo-700 text-white px-4 py-2 rounded-lg hover:bg-indigo-800">

                      Details

                    </a>

                  </div>

                </div>

              </div>

            <?php endforeach; ?>

          <?php else : ?>

            <div class="col-span-full text-center py-20">

              <i class="fa-solid fa-box-open text-6xl text-gray-300"></i>

              <h2 class="mt-6 text-3xl font-bold">

                No Products Found

              </h2>

            </div>

          <?php endif; ?>

        </div>

      </div>

    </div>

  </div>

</section>

<?= $this->endSection() ?>