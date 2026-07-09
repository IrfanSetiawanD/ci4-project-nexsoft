<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero -->
<section class="bg-gradient-to-r from-indigo-700 to-blue-700 py-24">

  <div class="max-w-7xl mx-auto px-6 text-center text-white">

    <span class="uppercase tracking-widest text-indigo-200 font-semibold">
      Contact Us
    </span>

    <h1 class="text-5xl font-extrabold mt-6">

      Let's Discuss Your
      Software Requirements

    </h1>

    <p class="text-xl text-indigo-100 max-w-3xl mx-auto mt-8">

      Hubungi tim NexSoft Commerce untuk konsultasi produk,
      penawaran harga, implementasi software, maupun kebutuhan
      transformasi digital perusahaan Anda.

    </p>

  </div>

</section>

<!-- Contact -->
<section class="py-24 bg-white">

  <div class="max-w-7xl mx-auto px-6">

    <div class="grid lg:grid-cols-5 gap-14">

      <!-- Contact Info -->

      <div class="lg:col-span-2 space-y-8">

        <div>

          <span class="text-indigo-600 uppercase font-semibold">

            Get In Touch

          </span>

          <h2 class="text-4xl font-bold mt-4">

            We're Ready To Help

          </h2>

        </div>

        <div class="space-y-6">

          <div class="flex items-start gap-5">

            <div class="w-14 h-14 rounded-xl bg-indigo-100 flex items-center justify-center">

              <i class="fa-solid fa-location-dot text-indigo-700 text-xl"></i>

            </div>

            <div>

              <h3 class="font-bold text-lg">

                Office Address

              </h3>

              <p class="text-gray-600 mt-2">

                Jl. Sudirman No.123<br>
                Jakarta Selatan, Indonesia

              </p>

            </div>

          </div>

          <div class="flex items-start gap-5">

            <div class="w-14 h-14 rounded-xl bg-indigo-100 flex items-center justify-center">

              <i class="fa-solid fa-phone text-indigo-700 text-xl"></i>

            </div>

            <div>

              <h3 class="font-bold text-lg">

                Phone

              </h3>

              <p class="text-gray-600 mt-2">

                (+62) 812-3456-7890

              </p>

            </div>

          </div>

          <div class="flex items-start gap-5">

            <div class="w-14 h-14 rounded-xl bg-indigo-100 flex items-center justify-center">

              <i class="fa-solid fa-envelope text-indigo-700 text-xl"></i>

            </div>

            <div>

              <h3 class="font-bold text-lg">

                Email

              </h3>

              <p class="text-gray-600 mt-2">

                sales@nexsoftcommerce.com

              </p>

            </div>

          </div>

          <div class="flex items-start gap-5">

            <div class="w-14 h-14 rounded-xl bg-indigo-100 flex items-center justify-center">

              <i class="fa-brands fa-whatsapp text-indigo-700 text-xl"></i>

            </div>

            <div>

              <h3 class="font-bold text-lg">

                WhatsApp

              </h3>

              <p class="text-gray-600 mt-2">

                (+62) 812-3456-7890

              </p>

            </div>

          </div>

        </div>

        <!-- Office Hours -->

        <div class="bg-gray-50 rounded-2xl p-8">

          <h3 class="font-bold text-2xl mb-6">

            Business Hours

          </h3>

          <div class="space-y-3 text-gray-600">

            <div class="flex justify-between">

              <span>Monday - Friday</span>
              <span>08:30 - 17:30</span>

            </div>

            <div class="flex justify-between">

              <span>Saturday</span>
              <span>09:00 - 14:00</span>

            </div>

            <div class="flex justify-between">

              <span>Sunday</span>
              <span>Closed</span>

            </div>

          </div>

        </div>

      </div>

      <!-- Form -->

      <div class="lg:col-span-3">

        <div class="bg-white border rounded-3xl shadow-lg p-10">

          <h2 class="text-3xl font-bold mb-8">

            Send Us a Message

          </h2>

          <form action="#" method="post" class="space-y-6">

            <div class="grid md:grid-cols-2 gap-6">

              <input
                type="text"
                placeholder="Full Name"
                class="border rounded-xl px-5 py-4 focus:ring-2 focus:ring-indigo-600 outline-none">

              <input
                type="email"
                placeholder="Email Address"
                class="border rounded-xl px-5 py-4 focus:ring-2 focus:ring-indigo-600 outline-none">

            </div>

            <div class="grid md:grid-cols-2 gap-6">

              <input
                type="text"
                placeholder="Phone Number"
                class="border rounded-xl px-5 py-4 focus:ring-2 focus:ring-indigo-600 outline-none">

              <input
                type="text"
                placeholder="Company Name"
                class="border rounded-xl px-5 py-4 focus:ring-2 focus:ring-indigo-600 outline-none">

            </div>

            <select
              class="w-full border rounded-xl px-5 py-4">

              <option>Select Product Interest</option>
              <option>Microsoft</option>
              <option>Adobe</option>
              <option>Cloud Solution</option>
              <option>Cyber Security</option>
              <option>PDF Solution</option>

            </select>

            <textarea
              rows="6"
              placeholder="Tell us about your project..."
              class="w-full border rounded-xl px-5 py-4 focus:ring-2 focus:ring-indigo-600 outline-none"></textarea>

            <button
              class="bg-indigo-700 hover:bg-indigo-800 text-white px-10 py-4 rounded-xl font-semibold transition">

              Send Message

            </button>

          </form>

        </div>

      </div>

    </div>

  </div>

</section>

<!-- Google Maps -->

<section class="pb-24 bg-white">

  <div class="max-w-7xl mx-auto px-6">

    <div class="rounded-3xl overflow-hidden shadow-lg">

      <iframe
        src="https://maps.google.com/maps?q=jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed"
        class="w-full h-[500px]"
        loading="lazy">
      </iframe>

    </div>

  </div>

</section>

<!-- FAQ -->

<section class="py-24 bg-gray-50">

  <div class="max-w-5xl mx-auto px-6">

    <div class="text-center mb-16">

      <span class="uppercase tracking-widest text-indigo-600 font-semibold">

        Frequently Asked Questions

      </span>

      <h2 class="text-4xl font-bold mt-4">

        Before Contacting Us

      </h2>

    </div>

    <div class="space-y-6">

      <div class="bg-white rounded-2xl p-8 shadow-sm">

        <h3 class="font-bold text-xl mb-3">

          Do you provide software implementation?

        </h3>

        <p class="text-gray-600">

          Ya. Kami menyediakan implementasi, deployment,
          migrasi, hingga training pengguna.

        </p>

      </div>

      <div class="bg-white rounded-2xl p-8 shadow-sm">

        <h3 class="font-bold text-xl mb-3">

          Are all products original?

        </h3>

        <p class="text-gray-600">

          Seluruh lisensi software berasal dari distributor
          maupun principal resmi.

        </p>

      </div>

    </div>

  </div>

</section>

<!-- CTA -->

<section class="bg-indigo-700 py-24">

  <div class="max-w-4xl mx-auto px-6 text-center text-white">

    <h2 class="text-4xl font-bold mb-6">

      Ready to Start Your Digital Transformation?

    </h2>

    <p class="text-xl text-indigo-100 mb-10">

      Konsultasikan kebutuhan software perusahaan Anda
      bersama tim profesional NexSoft Commerce.

    </p>

    <a
      href="https://wa.me/6281234567890"
      target="_blank"
      class="inline-flex items-center gap-3 bg-white text-indigo-700 px-10 py-4 rounded-xl font-semibold hover:bg-gray-100 transition">

      <i class="fab fa-whatsapp text-xl"></i>

      Chat via WhatsApp

    </a>

  </div>

</section>

<?= $this->endSection() ?>