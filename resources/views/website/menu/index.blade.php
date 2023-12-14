<x-guest-layout>
    <!-- Banner Area Starts -->
    <section class="banner-area banner-area2 menu-bg text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1><i>Menu của chúng tôi</i></h1>
                    <p class="pt-2"><i>Hình dạng quái thú phân chia màn đêm phía trên để di chuyển mang theo bóng
                            tối.</i></p>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Food Area starts -->
    <section class="food-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="section-top">
                        <h3><span class="style-change">Chúng tôi phục vụ</span> <br>những món ăn ngon</h3>
                        <p class="pt-3">Họ đang chia nhau và họ sẽ mang lại lợi nhuận cho chúng tôi sau khi anh ấy câu
                            cá ở đó
                            Người lớn hơn di chuyển, di chuyển Sẽ không cùng nhau không cho ruồi chia giữa cá trên lưới.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($menu as $menu)
                    <div class="col-md-4 col-sm-6">
                        <div class="single-food mt-5 mt-sm-0">
                            <div class="food-img">
                                <a href="#" class="img-flui"
                                    style="background-image: url({{ Storage::url($menu->image) }});"></a>
                            </div>
                            <div class="food-content">
                                <div class="d-flex justify-content-between">
                                    <h5>{{ $menu->name }}</h5>
                                    <span class="style-change">{{ $menu->price }}</span>
                                </div>
                                <p class="pt-3">{{ $menu->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Food Area End -->

    <!-- Table Area Starts -->
    <section class="table-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top2 text-center">
                        <h3>Đặt <span>bàn</span> của bạn</h3>
                        <p><i>Hình dạng quái thú phân chia màn đêm phía trên để di chuyển mang theo bóng tối.</i></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="#">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" id="datepicker">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                            </div>
                            <input type="text" id="datepicker2">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                            </div>
                            <input type="text">
                        </div>
                        <div class="table-btn text-center">
                            <a href="#" class="template-btn template-btn2 mt-4">Đặt bàn của bạn</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Table Area End -->
</x-guest-layout>
