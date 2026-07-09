<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero -->
<section class="bg-gradient-to-r from-indigo-700 to-blue-700 py-20">

  <div class="max-w-5xl mx-auto px-6 text-center text-white">

    <span class="bg-white/20 px-4 py-2 rounded-full text-sm font-semibold">
      Technology
    </span>

    <h1 class="text-5xl font-extrabold mt-6 leading-tight">

      Digital Transformation Strategy for Modern Businesses

    </h1>

    <div class="flex flex-wrap justify-center gap-8 mt-8 text-indigo-100">

      <span>
        <i class="fa-solid fa-user mr-2"></i>
        NexSoft Team
      </span>

      <span>
        <i class="fa-solid fa-calendar mr-2"></i>
        July 2026
      </span>

      <span>
        <i class="fa-solid fa-clock mr-2"></i>
        8 Minutes Read
      </span>

    </div>

  </div>

</section>

<!-- Featured Image -->
<section class="-mt-12">

  <div class="max-w-6xl mx-auto px-6">

    <img
      src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=1600"
      alt="Blog Image"
      class="rounded-3xl shadow-2xl w-full h-[500px] object-cover">

  </div>

</section>

<!-- Content -->
<section class="py-20">

  <div class="max-w-7xl mx-auto px-6">

    <div class="grid lg:grid-cols-3 gap-14">

      <!-- Article -->
      <div class="lg:col-span-2">

        <article class="prose prose-lg max-w-none">

          <p class="text-lg text-gray-600 leading-8">

            Transformasi digital bukan lagi pilihan, tetapi menjadi kebutuhan
            bagi perusahaan modern untuk meningkatkan efisiensi operasional,
            produktivitas karyawan, keamanan data, dan daya saing bisnis.

          </p>

          <h2 class="text-3xl font-bold mt-10 mb-5">

            Why Digital Transformation Matters

          </h2>

          <p class="text-gray-700 leading-8 mb-6">

            Dengan memanfaatkan cloud computing, software original,
            artificial intelligence, dan cyber security, perusahaan
            dapat mempercepat proses bisnis sekaligus mengurangi biaya
            operasional jangka panjang.

          </p>

          <img
            src="https://picsum.photos/1000/500?random=2"
            class="rounded-2xl my-10 w-full">

          <h2 class="text-3xl font-bold mt-10 mb-5">

            Key Benefits

          </h2>

          <ul class="space-y-3 text-gray-700">

            <li>✔ Improve employee productivity</li>

            <li>✔ Better collaboration with cloud platform</li>

            <li>✔ Higher cybersecurity protection</li>

            <li>✔ Lower operational costs</li>

            <li>✔ Better customer experience</li>

          </ul>

          <h2 class="text-3xl font-bold mt-12 mb-5">

            Conclusion

          </h2>

          <p class="text-gray-700 leading-8">

            Implementasi software original dan teknologi cloud menjadi
            investasi jangka panjang yang memberikan dampak signifikan
            terhadap pertumbuhan perusahaan.

          </p>

        </article>

        <!-- Share -->

        <div class="mt-16 border-t pt-8">

          <h3 class="font-bold text-xl mb-5">

            Share this article

          </h3>

          <div class="flex gap-4">

            <a href="#"
              class="w-12 h-12 rounded-full bg-blue-600 text-white flex items-center justify-center">

              <i class="fab fa-facebook-f"></i>

            </a>

            <a href="#"
              class="w-12 h-12 rounded-full bg-sky-500 text-white flex items-center justify-center">

              <i class="fab fa-twitter"></i>

            </a>

            <a href="#"
              class="w-12 h-12 rounded-full bg-blue-700 text-white flex items-center justify-center">

              <i class="fab fa-linkedin-in"></i>

            </a>

            <a href="#"
              class="w-12 h-12 rounded-full bg-green-500 text-white flex items-center justify-center">

              <i class="fab fa-whatsapp"></i>

            </a>

          </div>

        </div>

      </div>

      <!-- Sidebar -->
      <aside>

        <!-- Author -->

        <div class="bg-white border rounded-2xl p-8 shadow-sm mb-8">

          <div class="text-center">

            <img
              src="https://i.pravatar.cc/150?img=12"
              class="w-24 h-24 rounded-full mx-auto mb-5">

            <h3 class="text-xl font-bold">

              NexSoft Editorial Team

            </h3>

            <p class="text-gray-500 mt-2">

              Technology Writer

            </p>

          </div>

        </div>

        <!-- Categories -->

        <div class="bg-white border rounded-2xl p-8 shadow-sm mb-8">

          <h3 class="text-xl font-bold mb-6">

            Categories

          </h3>

          <ul class="space-y-4">

            <li><a href="#" class="hover:text-indigo-700">Microsoft</a></li>

            <li><a href="#" class="hover:text-indigo-700">Cloud</a></li>

            <li><a href="#" class="hover:text-indigo-700">Cyber Security</a></li>

            <li><a href="#" class="hover:text-indigo-700">Artificial Intelligence</a></li>

            <li><a href="#" class="hover:text-indigo-700">Design Software</a></li>

          </ul>

        </div>

        <!-- Recent Posts -->

        <div class="bg-white border rounded-2xl p-8 shadow-sm">

          <h3 class="text-xl font-bold mb-6">

            Recent Articles

          </h3>

          <?php for ($i = 1; $i <= 4; $i++) : ?>

            <div class="flex gap-4 mb-5">

              <img
                src="https://picsum.photos/120/120?random=<?= $i ?>"
                class="w-20 h-20 rounded-xl object-cover">

              <div>

                <a href="#"
                  class="font-semibold hover:text-indigo-700">

                  Best Software Solutions for Enterprise

                </a>

                <p class="text-sm text-gray-500 mt-1">

                  July 2026

                </p>

              </div>

            </div>

          <?php endfor; ?>

        </div>

      </aside>

    </div>

  </div>

</section>

<!-- CTA -->
<section class="bg-indigo-700 py-24">

  <div class="max-w-4xl mx-auto px-6 text-center text-white">

    <h2 class="text-4xl font-bold mb-6">

      Need the Right Software Solution?

    </h2>

    <p class="text-xl text-indigo-100 mb-10">

      Konsultasikan kebutuhan software bisnis Anda bersama tim NexSoft
      untuk mendapatkan solusi terbaik.

    </p>

    <a
      href="<?= base_url('contact') ?>"
      class="inline-flex items-center bg-white text-indigo-700 px-8 py-4 rounded-xl font-semibold hover:bg-gray-100 transition">

      Contact Our Consultant

    </a>

  </div>

</section>

<?= $this->endSection() ?>