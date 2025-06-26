<x-layouts.app title="Kontak">
    <br>
    <x-ui.section-container id="contact" title="Kontak">
        <div class="grid grid-cols-4 grid-rows-2 gap-4">
            <div class="col-span-3 row-span-2 p-4 border border-primary rounded-xl">
                <form action="" method="post" class="flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <x-forms.input name="name" label="Nama*" type="text" />
                        <x-forms.input name="phone" label="Nomor Telepon*" type="number" />
                        <x-forms.input name="message" label="Pesan*" type="textarea" />
                    </div>

                    <div class="flex">
                        <x-buttons.button type="submit">Kirim</x-buttons.button>
                    </div>
                </form>
            </div>
            <div
                class="p-4 border border-primary rounded-xl flex flex-col gap-2 font-medium justify-center items-center">
                <x-buttons.icon-button class="size-fit text-4xl rounded-xl p-4"
                    href="https://wa.me/6285776074800?text=Halo%20saya%20mau%20tanya%20tentang%20BookingLaundry"
                    target="_blank">
                    <i class="fa-brands fa-whatsapp"></i>
                </x-buttons.icon-button>
                <span>+62 81234567890</span>
            </div>
            <div
                class="p-4 border border-primary rounded-xl flex flex-col gap-2 font-medium justify-center items-center">
                <x-buttons.icon-button class="size-fit text-4xl rounded-xl p-4"
                    href="https://www.instagram.com/BookingLaundry" target="_blank">
                    <i class="fa-brands fa-instagram"></i>
                </x-buttons.icon-button>
                <span>@booking.laundry</span>
            </div>
        </div>
    </x-ui.section-container>
</x-layouts.app>