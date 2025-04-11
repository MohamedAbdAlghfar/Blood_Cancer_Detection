<x-app-layout>
    <x-slot name="header">
    
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="w-full max-w-4xl px-6 space-y-8">
            <!-- Profile Information Section -->
            <div class="p-6 bg-white shadow-lg rounded-lg border border-gray-200">
                
                
                <div class="w-full">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="p-6 bg-white shadow-lg rounded-lg border border-gray-200">
           
                <div class="w-full">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account Section -->
            <div class="p-6 bg-white shadow-lg rounded-lg border border-red-300">
      
                <div class="w-full">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
