<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'media',
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-[#09090b] text-gray-900 dark:text-white flex items-center justify-center min-h-screen p-6 transition-colors duration-300">

    <div class="w-full max-w-md p-10 bg-white dark:bg-[#18181b] border border-gray-200 dark:border-[#27272a] rounded-xl shadow-xl dark:shadow-2xl transition-all">
        
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold">Profile</h2>
            <a href="/admin" class="mt-4 inline-flex items-center text-sm text-[#ea580c] hover:text-[#f97316] font-medium transition-colors">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                back
            </a>
        </div>

        <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ $user->name }}" required 
                    class="mt-1 block w-full px-3 py-2 bg-white dark:bg-[#27272a] border border-gray-300 dark:border-[#3f3f46] text-gray-900 dark:text-white rounded-lg shadow-sm focus:ring-2 focus:ring-[#ea580c] focus:border-[#ea580c] outline-none transition sm:text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email address <span class="text-red-500">*</span></label>
                <input type="email" name="email" value="{{ $user->email }}" required 
                    class="mt-1 block w-full px-3 py-2 bg-white dark:bg-[#27272a] border border-gray-300 dark:border-[#3f3f46] text-gray-900 dark:text-white rounded-lg shadow-sm focus:ring-2 focus:ring-[#ea580c] focus:border-[#ea580c] outline-none transition sm:text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">New password</label>
                <input type="password" name="password" placeholder="••••••••"
                    class="mt-1 block w-full px-3 py-2 bg-white dark:bg-[#27272a] border border-gray-300 dark:border-[#3f3f46] text-gray-900 dark:text-white rounded-lg shadow-sm focus:ring-2 focus:ring-[#ea580c] focus:border-[#ea580c] outline-none transition sm:text-sm"
                    oninput="validatePass(this)">
                <p id="profile-pass-hint" class="mt-2 text-[11px] text-red-500 hidden font-medium">
                    ⚠ New password must be at least 6 characters long.
                </p>
            </div>

            <button type="submit" 
                class="w-full flex justify-center py-2.5 px-4 rounded-lg shadow-sm text-sm font-bold text-white bg-[#ea580c] hover:bg-[#d97706] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#ea580c] transition-all duration-150 active:scale-[0.98]">
                Save changes
            </button>
        </form>
    </div>

    <script>
        function validatePass(input) {
            const hint = document.getElementById('profile-pass-hint');
            if (input.value.length > 0 && input.value.length < 6) {
                hint.classList.remove('hidden');
            } else {
                hint.classList.add('hidden');
            }
        }
    </script>
</body>
</html>


