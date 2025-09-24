<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar Gramedia Clone</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

  <!-- Baris Atas -->
  <div class="w-full bg-gray-100 border-b py-1">
    <div class="max-w-7xl mx-auto px-6">
      <div class="flex justify-end space-x-6 text-sm text-gray-700 py-1">
        <a href="#" class="font-semibold hover:underline">Promo</a>
        <a href="#" class="font-semibold hover:underline">Toko Kami</a>
        <a href="#" class="font-semibold hover:underline">Hubungi Kami</a>
      </div>
    </div>
  </div>

  <!-- Navbar Utama -->
  <nav class="w-full bg-white border-b">
    <div class="max-w-8xl mx-auto px-6">
      <div class="flex items-center justify-between py-3">
        
        <!-- Logo + kategori -->
        <div class="flex items-center space-x-36">
          <!-- Logo -->
          <a href="#" class="flex items-center font-bold text-blue-900">
            <span class="text-5xl mr-2">G</span>
            <span class="text-lg hidden sm:inline">Gramedia.com</span>
          </a>

          <!-- Dropdown kategori -->
          <button class="flex items-center space-x-2 text-gray-700 font-bold text-sm hover:text-blue-600">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
              </svg>
            <span>Kategori</span>
          </button>
        </div>

        <!-- Search + Cart -->
        <div class="flex-1 px-8 ">
          <div class="flex items-center relative">
            <!-- Search -->
            <input type="text" placeholder="Cari Produk, Judul Buku, atau Penulis"
              class="w-9/12 rounded-full border px-4 py-3 pl-10 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
        
            <!-- Icon Search -->
            <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
            </svg>
        
            <!-- Cart -->
            <button class="ml-3 text-gray-700 hover:text-blue-600 flex-shrink-0">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.50Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
              </svg>
            </button>
          </div>
      
          <!-- Keyword suggestion -->
          <div class="flex space-x-6 mt-1 text-xs text-gray-500">
            <a href="#" class="hover:text-blue-600">Seorang Pria yang Melalui</a>
            <a href="#" class="hover:text-blue-600">Seporsi Mie Ayam</a>
            <a href="#" class="hover:text-blue-600">Pocket Potters</a>
            <a href="#" class="hover:text-blue-600">Sisi Tergelap Surga</a>
          </div>
        </div>


        <!-- Cart + Auth -->
        <div class="flex items-center space-x-4">
          <!-- Masuk -->
          <a href="#"
            class="border border-gray-300 text-gray-700 px-4 py-3 rounded-lg font-semibold hover:border-blue-500 hover:text-blue-600">
            Masuk
          </a>

          <!-- Daftar -->
          <a href="#"
            class="bg-blue-600 text-white px-4 py-3 rounded-lg font-semibold hover:bg-blue-700">
            Daftar
          </a>
        </div>

      </div>
    </div>
  </nav>
  
<section class="max-w-7xl mx-auto px-6 py-6 grid grid-cols-1 lg:grid-cols-3 gap-4">
  
  <!-- Banner utama (kiri) -->
  <div class="col-span-2">
    <div class="bg-blue-300 h-96 rounded-xl flex items-center justify-center text-white text-2xl font-bold">
      Banner Utama / Slider
    </div>
  </div>

  <!-- Banner kanan -->
  <div class="flex flex-col space-y-4">
    <!-- Banner atas -->
    <div class="bg-green-300 h-[11.5rem] w-11/12 rounded-xl flex items-center justify-center text-white font-bold">
      Banner Promo 1
    </div>
    <!-- Banner bawah -->
    <div class="bg-red-300 h-[11.5rem] w-11/12 rounded-xl flex items-center justify-center text-white font-bold">
      Banner Promo 2
    </div>
  </div>

</section>

<!-- ===================== SECTION KATEGORI ===================== -->
<section class="max-w-7xl mx-auto px-6 py-1">
  <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-7 gap-6 text-center">
    <!-- Item kategori -->
    <div class="bg-white rounded-2xl p-4 flex flex-col items-center space-y-2 transition-all duration-300 hover:shadow-2xl hover: cursor-pointer">
      <div class="w-24 h-28 bg-red-100 rounded-full flex items-center justify-center text-2xl">
        <img src="https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/highlighted_menu/rero26z6r-.png" alt="">
      </div>
      <span class="text-sm font-medium">Pre Order</span>
    </div>

    <div class="bg-white rounded-2xl p-4 flex flex-col items-center space-y-2 transition-all duration-300 hover:shadow-2xl hover: cursor-pointer">
      <div class="w-24 h-28 bg-yellow-100 rounded-full flex items-center justify-center text-2xl">
        <img src="https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/highlighted_menu/v6ac21ll62.png" alt="">
      </div>
      <span class="text-sm font-medium">New Arrival</span>
    </div>

    <div class="bg-white rounded-2xl p-4 flex flex-col items-center space-y-2 transition-all duration-300 hover:shadow-2xl hover: cursor-pointer">
            <div class="w-24 h-28 bg-yellow-100 rounded-full flex items-center justify-center text-2xl">
        <img src="https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/highlighted_menu/2cdo-i51a8.png" alt="">
      </div>
      <span class="text-sm font-medium">Gramedia Digital</span>
    </div>

    <div class="bg-white rounded-2xl p-4 flex flex-col items-center space-y-2 transition-all duration-300 hover:shadow-2xl hover: cursor-pointer">
      <div class="w-24 h-28 bg-blue-100 rounded-full flex items-center justify-center text-2xl">
        <img src="https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/highlighted_menu/zvz687a199.png" alt="">
      </div>
      <span class="text-sm font-medium">Tas</span>
    </div>

    <div class="bg-white rounded-2xl p-4 flex flex-col items-center space-y-2 transition-all duration-300 hover:shadow-2xl hover: cursor-pointer">
      <div class="w-24 h-28 bg-purple-100 rounded-full flex items-center justify-center text-2xl">
        <img src="https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/highlighted_menu/6a78z4tv49.png" alt="">
      </div>
      <span class="text-sm font-medium">Stationery</span>
    </div>

    <div class="bg-white rounded-2xl p-4 flex flex-col items-center space-y-2 transition-all duration-300 hover:shadow-2xl hover: cursor-pointer">
      <div class="w-24 h-28 bg-orange-100 rounded-full flex items-center justify-center text-2xl">
        <img src="https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/highlighted_menu/52coaxr1cr.png" alt="">
      </div>
      <span class="text-sm font-medium">Olahraga</span>
    </div>

    <div class="bg-white rounded-2xl p-4 flex flex-col items-center space-y-2 transition-all duration-300 hover:shadow-2xl hover: cursor-pointer">
      <div class="w-24 h-28 bg-teal-100 rounded-full flex items-center justify-center text-2xl">
        <img src="https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/highlighted_menu/32xv351t32.png" alt="">
      </div>
      <span class="text-sm font-medium">Toys</span>
    </div>
  </div>
</section>
<!-- ===================== SECTION KATEGORI TERLARIS ===================== -->
<section class="max-w-7xl mx-auto px-6 py-8">
  <!-- Judul -->
  <h2 class="text-xl font-bold mb-4">Kategori Terlaris</h2>

  <!-- Grid kategori -->
  <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">

    <!-- Card kategori -->
    <div class="relative rounded-lg overflow-hidden group cursor-pointer">
      <img src="https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/product-metas/1-35kal33-.jpg" alt="Komik"
        class="w-full h-40 object-cover group-hover:scale-105 transition duration-300">
      <div class="absolute inset-0 bg-black/40 flex items-end p-3">
        <span class="text-white font-semibold text-sm">Komik Aksi & Petualangan</span>
      </div>
    </div>

    <div class="relative rounded-lg overflow-hidden group cursor-pointer">
      <img src="https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/product-metas/1-35kal33-.jpg" alt="Romantis"
        class="w-full h-40 object-cover group-hover:scale-105 transition duration-300">
      <div class="absolute inset-0 bg-black/40 flex items-end p-3">
        <span class="text-white font-semibold text-sm">Fiksi Romantis</span>
      </div>
    </div>

    <div class="relative rounded-lg overflow-hidden group cursor-pointer">
      <img src="https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/product-metas/1-35kal33-.jpg" alt="Fantasi"
        class="w-full h-40 object-cover group-hover:scale-105 transition duration-300">
      <div class="absolute inset-0 bg-black/40 flex items-end p-3">
        <span class="text-white font-semibold text-sm">Fiksi Fantasi</span>
      </div>
    </div>

    <div class="relative rounded-lg overflow-hidden group cursor-pointer">
      <img src="https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/product-metas/1-35kal33-.jpg" alt="Sejarah"
        class="w-full h-40 object-cover group-hover:scale-105 transition duration-300">
      <div class="absolute inset-0 bg-black/40 flex items-end p-3">
        <span class="text-white font-semibold text-sm">Fiksi Sejarah</span>
      </div>
    </div>

    <div class="relative rounded-lg overflow-hidden group cursor-pointer">
      <img src="https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/product-metas/1-35kal33-.jpg" alt="Misteri"
        class="w-full h-40 object-cover group-hover:scale-105 transition duration-300">
      <div class="absolute inset-0 bg-black/40 flex items-end p-3">
        <span class="text-white font-semibold text-sm">Fiksi Misteri & Detektif</span>
      </div>
    </div>

  </div>
</section>


<!-- ===================== SECTION BANNER EBOOK ===================== -->
<section class="max-w-7xl mx-auto px-6 py-8">
  <div class="rounded-xl overflow-hidden">
    <img src="https://image.gramedia.net/rs:fit:0:280/plain/https://static.gramedia.net/_next/static/media/banner-ebook.e479d2f9.png" alt="Banner Ebook"
      class="w-full object-cover">
  </div>
</section>

</body>
</html>
