@php $menu = \TomatoPHP\FilamentMenus\Models\Menu::query()->where('key', 'header')->first()?->menuItems()->orderBy('order')->get() @endphp

@foreach($menu as $item)
    <x-cms-menu-item label="{{ $item->title[app()->getLocale()] }}" url="{{ $item->url }}" />
@endforeach

