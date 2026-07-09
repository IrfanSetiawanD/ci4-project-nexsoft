<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero -->
<section class="bg-gradient-to-r from-indigo-700 to-blue-700 py-24">

  <div class="max-w-7xl mx-auto px-6">

    <div class="text-center text-white">

      <h1 class="text-5xl font-extrabold mb-6">
        Insights & Technology Blog
      </h1>

      <p class="text-xl text-indigo-100 max-w-3xl mx-auto">
        Temukan artikel terbaru mengenai Microsoft, Cyber Security,
        Cloud Computing, Artificial Intelligence, Digital Workplace,
        dan berbagai solusi teknologi untuk bisnis modern.
      </p>

    </div>

  </div>

</section>

<!-- Search -->
<section class="py-12 bg-white border-b">

  <div class="max-w-7xl mx-auto px-6">

    <div class="flex flex-col md:flex-row gap-4">

      <input
        type="text"
        placeholder="Search article..."
        class="flex-1 border rounded-xl px-5 py-4 focus:ring-2 focus:ring-indigo-600 outline-none">

      <select
        class="border rounded-xl px-5 py-4">

        <option>All Categories</option>
        <option>Microsoft</option>
        <option>Cyber Security</option>
        <option>Cloud</option>
        <option>Design Software</option>
        <option>Productivity</option>

      </select>

      <button
        class="bg-indigo-700 text-white px-8 rounded-xl hover:bg-indigo-800 transition">

        Search

      </button>

    </div>

  </div>

</section>

<!-- Featured Blog -->
<section class="py-20 bg-gray-50">

  <div class="max-w-7xl mx-auto px-6">

    <div class="grid lg:grid-cols-2 gap-12 items-center">

      <div>

        <img
          src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=1200"
          class="rounded-2xl shadow-lg w-full h-[420px] object-cover"
          alt="Featured Blog">

      </div>

      <div>

        <span class="bg-indigo-100 text-indigo-700 px-4 py-2 rounded-full text-sm font-semibold">
          Featured Article
        </span>

        <h2 class="text-4xl font-bold mt-6 mb-5">
          Digital Transformation Strategy for Modern Businesses
        </h2>

        <p class="text-gray-600 leading-8 mb-8">
          Pelajari bagaimana perusahaan dapat meningkatkan efisiensi,
          keamanan data, dan produktivitas melalui implementasi cloud,
          software original, dan strategi digital transformation.
        </p>

        <div class="flex items-center gap-6 text-sm text-gray-500 mb-8">

          <span>
            <i class="fa-solid fa-user mr-2"></i>
            NexSoft Team
          </span>

          <span>
            <i class="fa-solid fa-calendar mr-2"></i>
            July 2026
          </span>

        </div>

        <a href="<?= base_url('blog/digital-transformation-strategy') ?>"
          class="inline-block bg-indigo-700 text-white px-8 py-4 rounded-xl hover:bg-indigo-800 transition">

          Read Article

        </a>

      </div>

    </div>

  </div>

</section>

<!-- Blog List -->
<section class="py-24 bg-white">

  <div class="max-w-7xl mx-auto px-6">

    <div class="text-center mb-16">

      <span class="text-indigo-600 uppercase font-semibold tracking-widest">
        Latest Articles
      </span>

      <h2 class="text-4xl font-bold mt-4">
        Explore Our Knowledge Center
      </h2>

    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">

      <?php for ($i = 1; $i <= 6; $i++) : ?>

        <article
          class="bg-white border rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition">

          <img
            src="https://picsum.photos/600/400?random=<?= $i ?>"
            class="w-full h-56 object-cover">

          <div class="p-7">

            <span class="text-sm text-indigo-600 font-semibold">

              Technology

            </span>

            <h3 class="text-2xl font-bold mt-3 mb-4">

              Best Software Solutions for Enterprise Businesses

            </h3>

            <p class="text-gray-600 leading-7">

              Pelajari bagaimana software original dapat meningkatkan
              keamanan, produktivitas, dan efisiensi perusahaan.

            </p>

            <div
              class="flex justify-between items-center mt-8">

              <span class="text-gray-500 text-sm">

                July 2026

              </span>

              <a
                href="<?= base_url('blog/sample-article') ?>"
                class="text-indigo-700 font-semibold">

                Read More →

              </a>

            </div>

          </div>

        </article>

      <?php endfor; ?>

    </div>

    <!-- Pagination -->

    <div class="flex justify-center mt-16 gap-3">

      <a href="#"
        class="px-5 py-3 border rounded-lg hover:bg-indigo-700 hover:text-white">

        1

      </a>

      <a href="#"
        class="px-5 py-3 border rounded-lg hover:bg-indigo-700 hover:text-white">

        2

      </a>

      <a href="#"
        class="px-5 py-3 border rounded-lg hover:bg-indigo-700 hover:text-white">

        3

      </a>

    </div>

  </div>

</section>

<!-- Newsletter -->
<section class="bg-indigo-700 py-24">

  <div class="max-w-4xl mx-auto px-6 text-center text-white">

    <h2 class="text-4xl font-bold mb-6">

      Stay Updated

    </h2>

    <p class="text-xl text-indigo-100 mb-10">

      Dapatkan artikel terbaru mengenai teknologi,
      software, cloud, AI, dan cyber security langsung ke email Anda.

    </p>

    <div class="flex flex-col md:flex-row gap-4 justify-center">

      <input
        type="email"
        placeholder="Your email address"
        class="flex-1 max-w-xl rounded-xl px-5 py-4 text-gray-900">

      <button
        class="bg-white text-indigo-700 px-8 rounded-xl font-semibold hover:bg-gray-100 transition">

        Subscribe

      </button>

    </div>

  </div>

</section>

<?= $this->endSection() ?>