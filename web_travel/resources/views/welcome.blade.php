@extends('layouts.frontend')

@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="background: black;">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://travelumroh.co.id/wp-content/uploads/2021/03/10.-Ketahui-Perbedaan-Haji-dan-Umroh-Sebelum-Menunaikannya.jpg"
                class="d-block w-100" alt="..." style="opacity: 0.5; height: 1080px;">
            <div class="carousel-caption d-none d-md-block" style="opacity: 1;">
                <h5>HAJI STANDARD</h5>
                <p>HAJI merupakan jenis ibadah yang dilakukan oleh umat muslim. Ibadah haji didahului oleh puasa asyura
                    yang jatuh pada tanggal 10 dzulhijjah. Lama waktu ibadah haji adalah sekitar 40 hari sehingga banyak
                    calon jamaah yang memilih agen travel untuk mengurus perjalanan mereka. Berikut beberapa contoh
                    kalimat iklan untuk promosi agent travel haji.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://wallpaperaccess.com/full/1408398.jpg" class="d-block w-100" alt="..."
                style="opacity: 0.5;height: 1080px;">
            <div class="carousel-caption d-none d-md-block" style="opacity: 1;">
                <h5>BALON UDARA CAPPADOCIA</h5>
                <p>Berlokasi di barat daya Kota Kayseri, Cappadocia merupakan tujuan wisata populer di Turki. Kota ini
                    sangat kental dengan nilai sejarah yang unik. Cappadocia berarti tanah kuda yang indah. Sebab, kota
                    ini punya banyak kuda liar yang berkeliaran di daerah tersebut sejak berabad-abad lalu. Selain kuda
                    liar, salah satu ciri khas yang paling dikenali dari Cappadocia adalah balon udara warna-warni yang
                    memeriahkan langit kota ini.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://wallpapercave.com/wp/wp9829655.jpg" class="d-block w-100" alt="..."
                style="opacity: 0.5;height: 1080px;">
            <div class="carousel-caption d-none d-md-block" style="opacity: 1;">
                <h5>7 SUMMIT, Rinjani</h5>
                <p>Indonesia memang kaya akan keindahan alamnya. Gunung, laut, persawahan, semuanya memperlihatkan
                    betapa indahnya alam Indonesia. Salah satu pesona alam Indonesia adalah Gunung Rinjani. Gunung
                    dengan ketinggian 3.726 mdpl ini, memang merupakan salah satu pilihan bagi para pendaki, baik
                    pendaki dalam negeri maupun dari luar negeri. Bagaimana tidak, cerita yang tersebar tentang
                    keindahannya, membuat setiap pendaki pasti tertantang untuk mengeksplorasi gunung yang terletak di
                    Lombok, Nusa Tenggara Barat ini.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container mt-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>
                Paket Tersedia
            </span>
            <span>
                <a href="{{ route('paket.index') }}" class="btn btn-primary">View More</a>
            </span>
        </div>
        <div class="card-body row align-items-center">
            @foreach ($packages as $item)
            <div class="col-sm-4">
                <div class="card">
                    <img src="{{ Storage::url($item->category->foto) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_paket }}</h5>
                        <p class="card-text">{{ $item->tujuan }}</p>
                        <p class="card-text">
                            Stok Tersedia : <span class="text-danger">{{ $item->stok }}</span>
                        </p>
                        <p>
                            Destinasi : {{$item->tujuan}}
                        </p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        @auth
                        @if ($item->stok == 0)
                        <button class="btn btn-primary" disabled>Stok Habis</button>
                        @else
                        <a href="{{ route('paket.show', $item->id) }}" class="btn btn-outline-primary">Detail</a>
                        <form action="{{ route('paket.create') }}" method="get">
                            <input type="hidden" name="paket_id" value="{{ $item->id }}">
                            <button class="btn btn-primary">Beli Sekarang</button>
                        </form>
                        @endif
                        @endauth
                        @guest
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                        @endguest
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection