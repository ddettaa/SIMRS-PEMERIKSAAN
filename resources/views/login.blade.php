<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - SIMRS</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen w-screen bg-gradient-to-br from-[#2e4e4e] to-[#85baba] flex items-center justify-center relative">

  <!-- Logo di kiri bawah -->
  <img src="simrs.jpg" alt="Logo SIMRS" class="absolute bottom-4 left-4 w-10 h-10" />

  <!-- Container Utama -->
  <div class="w-[900px] h-[500px] bg-white rounded-2xl shadow-xl overflow-hidden flex">

    <!-- Gambar Dokter -->
    <div class="w-1/2">
      <img src="dokter.jpg" alt="Dokter" class="w-full h-full object-cover rounded-r-2xl" />
    </div>

    <!-- Sisi Form -->
    <div class="w-1/2 bg-[#f0f4fc] flex items-center justify-center">

      <!-- Kotak Kecil di Dalam -->
      <div class="bg-white rounded-xl shadow-lg p-8 w-[80%]">
        <h2 class="text-lg font-semibold mb-6">Login</h2>
        <form>
          <div class="mb-6">
            <input type="text" placeholder="Dokter1" class="w-full border-b border-gray-300 bg-transparent placeholder-gray-400 text-sm focus:outline-none py-2" />
          </div>
          <div class="mb-6">
            <input type="password" placeholder="********" class="w-full border-b border-gray-300 bg-transparent placeholder-gray-400 text-sm focus:outline-none py-2" />
          </div>
          <button type="submit" class="w-full bg-[#558c89] text-white py-2 rounded-full shadow-md hover:bg-[#457c78] transition">
            Login
          </button>
        </form>
      </div>

    </div>
  </div>

</body>
</html>
