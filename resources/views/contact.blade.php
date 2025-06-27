<x-layouts.app title="Kontak">
    <br>
    <x-ui.section-container id="contact" title="Kontak">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 bg-white rounded-2xl shadow-lg p-8 md:p-12">
            <div class="flex flex-col items-center justify-center gap-4 p-8 border border-primary/30 rounded-2xl bg-gradient-to-br from-green-50 via-white to-green-100 shadow-md hover:scale-105 transition-transform duration-200">
                <x-buttons.icon-button class="size-fit text-5xl rounded-xl p-4 bg-green-100 hover:bg-green-200 transition-all duration-200"
                    href="https://wa.me/6285776074800?text=Halo%20saya%20mau%20tanya%20tentang%20BookingLaundry"
                    target="_blank">
                    <i class="fa-brands fa-whatsapp" style="color:#25D366; filter: drop-shadow(0 2px 6px #25D36688);"></i>
                </x-buttons.icon-button>
                <span class="text-green-700 font-bold text-lg">+62 81234567890</span>
                <span class="text-gray-500 text-sm">WhatsApp</span>
            </div>
            <div class="flex flex-col items-center justify-center gap-4 p-8 border border-primary/30 rounded-2xl bg-gradient-to-br from-pink-50 via-white to-pink-100 shadow-md hover:scale-105 transition-transform duration-200">
                <x-buttons.icon-button class="size-fit text-5xl rounded-xl p-4 bg-pink-100 hover:bg-pink-200 transition-all duration-200"
                    href="https://www.instagram.com/BookingLaundry" target="_blank">
                    <i class="fa-brands fa-instagram" style="background:radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%); color:transparent; background-clip:text; -webkit-background-clip:text; filter: drop-shadow(0 2px 6px #fd594988);"></i>
                </x-buttons.icon-button>
                <span class="text-pink-700 font-bold text-lg">@booking.laundry</span>
                <span class="text-gray-500 text-sm">Instagram</span>
            </div>
            <div class="flex flex-col items-center justify-center gap-4 p-8 border border-primary/30 rounded-2xl bg-gradient-to-br from-blue-50 via-white to-blue-100 shadow-md hover:scale-105 transition-transform duration-200">
                <x-buttons.icon-button class="size-fit text-5xl rounded-xl p-4 bg-blue-100 hover:bg-blue-200 transition-all duration-200"
                    href="mailto:info@bookinglaundry.com" target="_blank">
                    <i class="fa-solid fa-envelope" style="background: linear-gradient(90deg, #4285F4 0%, #34A853 25%, #FBBC05 50%, #EA4335 75%, #4285F4 100%); color:transparent; background-clip:text; -webkit-background-clip:text; filter: drop-shadow(0 2px 6px #4285F488);"></i>
                </x-buttons.icon-button>
                <span class="text-blue-700 font-bold text-lg">info@bookinglaundry.com</span>
                <span class="text-gray-500 text-sm">Email</span>
            </div>
        </div>
    </x-ui.section-container>
</x-layouts.app>