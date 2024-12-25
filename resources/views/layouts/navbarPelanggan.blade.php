<style>
    nav{
        margin: 67px auto;
    }
    .brand{
        display: flex;
    }
    .row-nav{
        /* border: 1px solid; */
        align-items: center;
    }
    .brand .text h1{
        color: #99201E;
        font-size: 40px;
    }
    .brand .text p{
        color: #99201E;
        font-size: 24px ;
    }
    .text{
        line-height: 10px;
    }
    .nav-link{
        width: 120%;
        /* border: 1px solid; */
    }
    .nav-link ul{
        display: flex;
        /* align-items: center; */
        justify-content: center;
        list-style: none;
    }
    .nav-link ul li{
        margin: 0 30px;
    }
    .nav-link ul li a{
        color: #99201E;
        font-weight: 1000;
        text-decoration: none;
    }
    .nav-item.active {
    color: white;
    background-color: #007bff;
    border-radius: 5px;
    }

</style>
<nav>
    <div class="container">
        <div class="row row-nav">
            <div class="col-4 brand">
                <div class="img"><img src="/img/logo.png" alt="logo"></div>
                <div class="text">
                    <h1 class="mb-0">Hobby Shoes</h1>
                    <p class="mt-0">Tulungagung</p>
                </div>
            </div>
            <div class="col-6 offset-1">
                <div class="nav-link">
                    <ul>
                        <li>
                            <a href="/" class="nav-item" data-page="beranda">Beranda</a>
                        </li>
                        <li>
                            <a href="#layanan" class="nav-item">Layanan</a>
                        </li>
                        <li>
                            <a href="#kontak" class="nav-item" >Kontak & Lokasi</a>
                        </li>
                        <li>
                            <a href="{{ route('pelangganLacak') }}">Lacak</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>