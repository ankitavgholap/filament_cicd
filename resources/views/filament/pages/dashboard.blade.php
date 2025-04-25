<x-filament::page>
    <div class="space-y-6">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
            <!-- Example metric cards -->
            <x-filament::widget>
                <x-filament::card>
                    <h2 class="text-lg font-semibold">Total Users</h2>
                    <p class="text-2xl font-bold">{{ \App\Models\User::count() }}</p>
                </x-filament::card>
            </x-filament::widget>

            <x-filament::widget>
                <x-filament::card>
                    <h2 class="text-lg font-semibold">Total Posts</h2>
                    <p class="text-2xl font-bold">{{ \App\Models\Post::count() }}</p>
                </x-filament::card>
            </x-filament::widget>

            <x-filament::widget>
                <x-filament::card>
                    <h2 class="text-lg font-semibold">Total Activities</h2>
                    <p class="text-2xl font-bold">{{ \App\Models\Activity::count() }}</p>
                </x-filament::card>
            </x-filament::widget>
        </div>

        <!-- Example section: Recent Posts -->
        <x-filament::card>
            <h2 class="text-lg font-semibold mb-4">Recent Posts</h2>
            <ul class="space-y-2">
                @foreach (\App\Models\Post::latest()->take(5)->get() as $post)
                    <li class="border-b pb-2">
                        <strong>{{ $post->title }}</strong><br>
                        <span class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                    </li>
                @endforeach
            </ul>
        </x-filament::card>
    </div>
</x-filament::page>
