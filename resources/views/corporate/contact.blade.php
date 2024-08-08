@extends('layouts.app')
@section('seo')
    @php
        $seo = \App\Models\Meta::all()->keyBy('page');
    @endphp
    @include('partials.seo', [
        'title' => $seo->get('contact')->title ?? setting('seo.seo_title'),
        'description' => $seo->get('contact')->description ?? setting('seo.seo_des'),
        'image' => strlen($seo->get('contact')->image) > 2 ? Voyager::image($seo->get('contact')->image) : Voyager::image(setting('seo.seo_img')),
        'keywords' => $seo->get('contact')->keywords ?? setting('seo.seo_key'),
    ])
@endsection
@section('content')
<img src="{{Voyager::image(setting('content.sep_img'))}}" alt="Image Separator" class="w-100 d-block">
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 pe-md-5">
                <h1 class="mb-3">{{setting('content.contact_title')}}</h1>
                <p>{{setting('content.contact_desc')}}</p>
            </div>
            <div class="col-md-6">
                <div class="p-5 bg-light">
                    <form id="contactForm">
                        <input name="name" type="text" class="form-control rounded-0 border-0 mb-3 p-2 px-3" placeholder="Name*" required>
                        <input name="email" type="email" class="form-control rounded-0 border-0 mb-3 p-2 px-3" placeholder="Email*" required>
                        <input name="phone" type="number" class="form-control rounded-0 border-0 mb-3 p-2 px-3" placeholder="Phone*" required>
                        <textarea name="message" placeholder="Message*" required cols="30" rows="10" class="form-control mb-3 rounded-0 border-0 p-2 px-3"></textarea>
                        <div class="d-flex align-items-center justify-content-end">
                            <button class="btn btn-warning rounded-0 p-2 px-3 akg-sec-bg border-0" type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("contactForm");
        const whatsappNumber = "1234567890"; // Ganti dengan nomor WhatsApp Anda

        form.addEventListener("submit", function(event) {
            event.preventDefault(); // Mencegah pengiriman form secara default

            const formData = new FormData(form);
            const name = formData.get("name");
            const email = formData.get("email");
            const phone = formData.get("phone");
            const message = formData.get("message");

            const whatsappMessage = `Hallo, Artisan Kuliner Group Saya :\n\nName: ${name}\nEmail: ${email}\nPhone: ${phone}\nMessage: ${message}`;
            const whatsappUrl = `https://api.whatsapp.com/send?phone=${whatsappNumber}&text=${encodeURIComponent(whatsappMessage)}`;

            window.open(whatsappUrl, "_blank");
        });
    });
</script>
@endsection