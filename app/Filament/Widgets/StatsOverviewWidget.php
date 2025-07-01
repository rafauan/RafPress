<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Post;
use App\Models\User;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('All Posts', Post::count())
                ->description('Total number of posts')
                ->descriptionIcon('heroicon-o-clipboard-document-list')
                ->icon('heroicon-o-document-text')
                ->color('primary')
                ->chart(Post::selectRaw('DATE(created_at) as date')
                    ->where('created_at', '>=', now()->subDays(7))
                    ->get()
                    ->groupBy('date')
                    ->map(fn ($group) => $group->count())
                    ->values()
                    ->toArray()
                )
                ->url(route('filament.admin.resources.posts.index')),

            Stat::make('Users', User::count())
                ->description('Registered users')
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->icon('heroicon-o-users')
                ->color('success')
                ->chart(User::selectRaw('DATE(created_at) as date')
                    ->where('created_at', '>=', now()->subDays(7))
                    ->get()
                    ->groupBy('date')
                    ->map(fn ($group) => $group->count())
                    ->values()
                    ->toArray()
                )
                ->url(route('filament.admin.resources.users.index')),

            Stat::make('New Posts This Week', Post::where('created_at', '>=', now()->startOfWeek())->count())
                ->description('Created since Monday')
                ->descriptionIcon('heroicon-o-calendar-days')
                ->icon('heroicon-o-plus')
                ->color('warning')
                ->chart(Post::selectRaw('DATE(created_at) as date')
                    ->where('created_at', '>=', now()->startOfWeek())
                    ->get()
                    ->groupBy('date')
                    ->map(fn ($group) => $group->count())
                    ->values()
                    ->toArray()
                )
                ->url(route('filament.admin.resources.posts.index')),
        ];
    }
}
