<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/output.css">
  <title>Login</title>
</head>

<body>
  <section class="flex justify-center items-center min-h-screen">
    <div class="w-full max-w-xs">
      <h1 class="text-4xl font-bold mb-2 text-blue-500">Login</h1>
      <p class="mb-6 text-sm font-medium text-slate-500">
        Silahkan masukan username dan password
      </p>

      <!-- Form Login -->
      <form id="loginForm" method="POST">
        <?php if (session()->getFlashdata('error')): ?>
        <div class="text-red-500 text-center text-lg font-semibold"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <div class="mb-6">
          <label for="username" class="block text-slate-700 text-sm font-bold mb-2">Username</label>
          <input type="text" name="username" id="username" required
            class="text-sm border rounded w-full py-2 px-3 text-slate-700 placeholder:opacity-50 outline-none focus:ring-1 focus:ring-blue-500"
            placeholder="Masukan Username">
        </div>
        <div class="mb-6">
          <label for="password" class="block text-slate-700 text-sm font-bold mb-2">Password</label>
          <input type="password" name="password" id="password" required
            class="text-sm border rounded w-full py-2 px-3 text-slate-700 placeholder:opacity-50 outline-none focus:ring-1 focus:ring-blue-500"
            placeholder="Masukan Password">
        </div>

        <!-- Radio Button to Choose User or Admin -->
        <div class="mb-6">
          <label class="block text-slate-700 text-sm font-bold mb-2">Login Sebagai:</label>
          <div class="flex items-center">
            <input type="radio" name="role" value="user" id="user" checked class="mr-2">
            <label for="user" class="mr-4">User</label>

            <input type="radio" name="role" value="admin" id="admin" class="mr-2">
            <label for="admin">Admin</label>
          </div>
        </div>

        <button type="submit"
          class="w-full bg-blue-500 py-3 px-2 rounded-md font-bold text-white hover:bg-blue-700">Login</button>
      </form>
    </div>
  </section>

  <!-- JavaScript to Change Form Action -->
  <script>
  document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission
    var role = document.querySelector('input[name="role"]:checked').value;

    // Set the form action based on the selected role
    if (role === 'admin') {
      this.action = '/admin/authenticate';
    } else {
      this.action = '/user/authenticate';
    }

    this.submit(); // Submit the form
  });
  </script>
</body>

</html>