<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
</head>
<body class="bg-[#09090b] flex items-center justify-center min-h-screen p-6">

    <div class="w-full max-w-md p-8 bg-[#18181b] border border-[#27272a] rounded-xl shadow-2xl">
        <div class="text-center mb-8">
            <h1 class="text-xl font-bold text-white tracking-tight">Laravel</h1>
            <h2 class="mt-2 text-3xl font-bold text-white">Sign up</h2>
            <p class="mt-2 text-sm text-gray-400">
                or <a href="/admin/login" class="text-[#f59e0b] font-semibold hover:text-[#d97706]">sign in to your account</a>
            </p>
        </div>

        <form action="{{ route('signup.post') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-300">Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" required 
                    class="mt-1 block w-full px-3 py-2 bg-[#27272a] border border-[#3f3f46] text-white rounded-lg shadow-sm focus:ring-2 focus:ring-[#ea580c] focus:border-[#ea580c] outline-none transition sm:text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300">Email address <span class="text-red-500">*</span></label>
                <input type="email" name="email" required 
                    class="mt-1 block w-full px-3 py-2 bg-[#27272a] border border-[#3f3f46] text-white rounded-lg shadow-sm focus:ring-2 focus:ring-[#ea580c] focus:border-[#ea580c] outline-none transition sm:text-sm">
            </div>

            <div x-data="{ password: '' }">
                <label class="block text-sm font-medium text-gray-300">Password <span class="text-red-500">*</span></label>
                <input type="password" name="password" required 
                    class="mt-1 block w-full px-3 py-2 bg-[#27272a] border border-[#3f3f46] text-white rounded-lg shadow-sm focus:ring-2 focus:ring-[#ea580c] focus:border-[#ea580c] outline-none transition sm:text-sm"
                    oninput="checkPassword(this)">
                
                <p id="password-hint" class="mt-2 text-[11px] text-red-400 hidden">
                    ⚠ Password must be at least 6 characters long.
                </p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300">Confirm password <span class="text-red-500">*</span></label>
                <input type="password" name="password_confirmation" required 
                    class="mt-1 block w-full px-3 py-2 bg-[#27272a] border border-[#3f3f46] text-white rounded-lg shadow-sm focus:ring-2 focus:ring-[#ea580c] focus:border-[#ea580c] outline-none transition sm:text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-300">Role <span class="text-red-500">*</span></label>
                <select name="role" required 
                    class="mt-1 block w-full px-3 py-2 bg-[#27272a] border border-[#3f3f46] text-white rounded-lg shadow-sm focus:ring-2 focus:ring-[#ea580c] focus:border-[#ea580c] outline-none transition sm:text-sm appearance-none cursor-pointer">
                    <option value="" disabled selected class="text-gray-500">Select an option</option>
                    <option value="buyer">Buyer</option>
                    <option value="seller">Seller</option>
                </select>
            </div>

            <button type="submit" 
                class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-[#ea580c] hover:bg-[#d97706] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#ea580c] transition duration-150">
                Sign up
            </button>
        </form>
    </div>

    <script>
        function checkPassword(input) {
            const hint = document.getElementById('password-hint');
            if (input.value.length > 0 && input.value.length < 6) {
                hint.classList.remove('hidden');
            } else {
                hint.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
