<x-layouts.app title="Produk">
    <br>
    <x-ui.section-container id="products">
        <livewire:product-list />
    </x-ui.section-container>

    <x-ui.section-container id="cart">
        <livewire:cart-summary />
    </x-ui.section-container>
</x-layouts.app>