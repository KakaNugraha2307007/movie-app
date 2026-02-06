<x-guest-layout>
<form method="POST" action="{{ route('register') }}">
@csrf

<h2 class="text-xl font-bold mb-4 text-center">Register</h2>

<x-text-input name="name" class="w-full mb-3" placeholder="Nama" required />
<x-text-input name="email" type="email" class="w-full mb-3" placeholder="Email" required />
<x-text-input name="password" type="password" class="w-full mb-3" placeholder="Password" required />
<x-text-input name="password_confirmation" type="password" class="w-full mb-3" placeholder="Konfirmasi Password" required />

<x-primary-button class="w-full justify-center">
    Register
</x-primary-button>

<p class="text-center text-sm mt-4">
    Sudah punya akun?
    <a href="{{ route('login') }}" class="text-indigo-600 underline">
        Login
    </a>
</p>
</form>
</x-guest-layout>
