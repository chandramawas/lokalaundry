<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 w-full">
    @forelse ($products as $product)
        <livewire:product-card :name="$product->name" :image="$product->image" :price="$product->price"
            :key="$product->id" />
    @empty
        <div class="col-span-full text-center text-sm text-on-surface-variant">
            Tidak ada produk yang tersedia.
        </div>
    @endforelse
</div>