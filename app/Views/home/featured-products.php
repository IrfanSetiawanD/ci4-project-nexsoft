<!-- ================= FEATURED PRODUCTS ================= -->

<section id="products" class="py-24 bg-white">

  <div class="max-w-7xl mx-auto px-6">

    <div class="text-center max-w-3xl mx-auto">

      <span class="inline-flex px-4 py-2 rounded-full bg-indigo-100 text-indigo-700 font-semibold text-sm">

        FEATURED PRODUCTS

      </span>

      <h2 class="mt-6 text-5xl font-bold">

        Software Pilihan Terbaik

      </h2>

      <p class="mt-6 text-lg text-gray-600">

        Temukan berbagai software original dari vendor terpercaya
        untuk meningkatkan produktivitas dan keamanan bisnis Anda.

      </p>

    </div>


    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-16">

      <?php if (!empty($featuredProducts)): ?>

        <?php foreach ($featuredProducts as $product): ?>

          <div class="group bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-2xl hover:border-indigo-500 transition">

            <!-- Image -->

            <div class="h-56 bg-gray-100 flex items-center justify-center overflow-hidden">

              <?php if (!empty($product['image'])): ?>

                <img
                  src="<?= base_url('uploads/products/' . $product['image']) ?>"
                  class="w-full h-full object-cover group-hover:scale-105 duration-300">

              <?php else: ?>

                <div class="text-center">

                  <i class="fa-solid fa-box text-6xl text-gray-300"></i>

                  <p class="mt-3 text-gray-400">

                    No Image

                  </p>

                </div>

              <?php endif; ?>

            </div>

            <!-- Body -->

            <div class="p-7">

              <div class="inline-block px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 text-xs font-semibold">

                <?= esc($product['category'] ?? 'Software') ?>

              </div>

              <h3 class="mt-5 text-2xl font-bold">

                <?= esc($product['name']) ?>

              </h3>

              <p class="mt-4 text-gray-600 line-clamp-3">

                <?= esc($product['description']) ?>

              </p>

              <div class="mt-6 flex justify-between items-center">

                <div>

                  <p class="text-sm text-gray-400">

                    Starting From

                  </p>

                  <p class="text-2xl font-bold text-indigo-700">

                    Rp <?= number_format($product['price'], 0, ',', '.') ?>

                  </p>

                </div>

              </div>

              <div class="mt-8 flex gap-3">

                <a href="<?= site_url('products/' . $product['slug']) ?>"
                  class="flex-1 text-center bg-indigo-700 text-white py-3 rounded-xl hover:bg-indigo-800">

                  View Detail

                </a>

                <a href="#contact"
                  class="flex-1 text-center border border-indigo-700 text-indigo-700 py-3 rounded-xl hover:bg-indigo-700 hover:text-white">

                  Request Quote

                </a>

              </div>

            </div>

          </div>

        <?php endforeach; ?>

      <?php endif; ?>

    </div>


    <div class="text-center mt-16">

      <a href="<?= site_url('products') ?>"
        class="inline-flex items-center px-8 py-4 rounded-xl bg-gray-900 text-white hover:bg-black transition">

        View All Products

        <i class="fa-solid fa-arrow-right ml-3"></i>

      </a>

    </div>

  </div>

</section>