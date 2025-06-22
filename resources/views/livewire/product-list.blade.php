<div class="grid grid-cols-4 gap-4">
    @forelse ($products as $product)
        <livewire:product-card :name="$product->name" :image="$product->image" :price="$product->price"
            :key="$product->id" />
    @empty
        <div class="text-center text-sm text-on-surface-variant">
            Tidak ada produk yang tersedia.
        </div>
    @endforelse
</div>