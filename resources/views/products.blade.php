<x-layouts.app title="Products">
    <br>
    <x-ui.section-container id="products" title="Products">
        <div class="grid grid-cols-4 gap-4">
            {{-- Product 1 --}}
            <div class="border border-primary rounded-lg p-4 size-full flex flex-col gap-6 justify-between">
                {{-- Product Information --}}
                <div class="flex flex-col gap-2">
                    <div class="h-40 w-full overflow-hidden flex justify-center rounded">
                        <img src="{{ asset('images/placeholder.jpg') }}" alt="Placeholder Image" class="h-full">
                    </div>
                    <div class="flex flex-col gap-1">
                        <h3 class="text-lg font-semibold">Molto Sachet 40ml</h3>
                        <span class="text-primary">Rp1.500</span>
                    </div>
                </div>

                {{-- Cart Button --}}
                <div class="flex gap-2 text-xs items-center">
                    <x-buttons.button>
                        <i class="fa-solid fa-minus"></i>
                    </x-buttons.button>
                    <x-forms.input type="number" name="quantity" value="1" class="text-center" />
                    <x-buttons.button>
                        <i class="fa-solid fa-plus"></i>
                    </x-buttons.button>
                </div>
            </div>
        </div>
    </x-ui.section-container>

    <x-ui.section-container id="cart">
        <div class="flex flex-col gap-4">
            <div class="flex font-semibold justify-between items-center text-lg">
                <span>Subtotal <span class="font-normal">(2 Items)</span></span>
                <span class="text-primary">Rp3.000</span>
            </div>
            <div class="flex gap-2 justify-end">
                <x-buttons.button variant="outline">Clear Cart</x-buttons.button>
                <x-buttons.button variant="primary">Checkout</x-buttons.button>
            </div>
        </div>
    </x-ui.section-container>
</x-layouts.app>