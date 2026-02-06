<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Profile</h2>
    </x-slot>

    <div class="max-w-xl mx-auto py-6">

        @if (session('success'))
            <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <x-input-label value="Name" />
                <x-text-input class="w-full" name="name"
                    :value="old('name', $user->name)" required />
            </div>

            <div class="mb-4">
                <x-input-label value="Email" />
                <x-text-input class="w-full" name="email"
                    :value="old('email', $user->email)" required />
            </div>

            <x-primary-button>Update</x-primary-button>
        </form>
    </div>
</x-app-layout>
