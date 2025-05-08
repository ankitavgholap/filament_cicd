<x-filament-panels::page>
    <div class="p-6 bg-white rounded-xl shadow">
        <h1 class="text-2xl font-bold mb-4">Welcome to your dashboard, {{ auth()->user()->name }}!</h1>
        <p class="text-gray-600">This is your personalized user dashboard where you can manage your account and access your features.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div class="p-4 bg-blue-50 rounded-lg">
                <h2 class="font-semibold text-lg text-blue-700">Your Account</h2>
                <p class="text-blue-600 mt-2">Manage your personal information and settings</p>
            </div>
            
            <div class="p-4 bg-emerald-50 rounded-lg">
                <h2 class="font-semibold text-lg text-emerald-700">Your Activity</h2>
                <p class="text-emerald-600 mt-2">Track your recent activities and stats</p>
            </div>
        </div>
    </div>
</x-filament-panels::page>
