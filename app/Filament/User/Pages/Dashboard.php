<?php
namespace App\Filament\User\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.user.pages.dashboard';

    protected static ?string $title = 'User Dashboard';

    protected static ?int $navigationSort = -2;

    protected static ?string $navigationLabel = 'Dashboard';

    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }
}
