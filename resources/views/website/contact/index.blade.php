<x-guest-layout>
    <!-- Banner Area Starts -->
    <section class="banner-area banner-area2 contact-bg text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1><i>Liên hệ chúng tôi</i></h1>
                    <p class="pt-2"><i>Hình dạng quái thú phân chia màn đêm phía trên để di chuyển mang theo bóng
                            tối.</i></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Map Area Starts -->
    <section class="map-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60464.01274519857!2d105.63839207658813!3d18.7087824997067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139cddf0bf20f23%3A0x86154b56a284fa6d!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBWaW5o!5e0!3m2!1svi!2s!4v1696919572063!5m2!1svi!2s"
                            height="600" width="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Map Area End -->


    <!-- Contact Form Starts -->
    <section class="contact-form section-padding3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex">
                        <div class="into-icon">
                            <i class="fa fa-home"></i>
                        </div>
                        <div class="info-text">
                            <h5>TP.Vinh, Nghệ An</h5>
                            <p>Đường Lê Duẩn</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="into-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="info-text">
                            <h5>00 (440) 9865 562</h5>
                            <p>Mon to Fri 9am to 6 pm</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="into-icon">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="info-text">
                            <h5>support@colorlib.com</h5>
                            <p>Gửi cho chúng tôi câu hỏi của bạn bất cứ lúc nào</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form action="#">
                        <div class="left">

                            <input name ="name" type="text" class="form-control" placeholder="Your Name"
                                value="{{ Auth::user()->name ?? '' }}">
                            <input name="email" type="email" class="form-control" placeholder="Your Email"
                                value="{{ Auth::user()->email ?? '' }}">
                            <input name ="subject" type="text" class="form-control" placeholder="Subject"
                                value="{{ Auth::user()->subject ?? '' }}">


                        </div>
                        <div class="right">
                            <textarea name="message" cols="20" rows="7" placeholder="Enter Message" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Enter Message'" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">subscribe now</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form End -->
</x-guest-layout>
