@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    /* Centralizar conteúdo */
    .welcome-section {
        text-align: center;
        margin-top: 40px;
        margin-bottom: 40px;
    }

    
    .carousel-container {
        max-width: 900px; 
        margin: 0 auto;  
    }

    .carousel-item img {
        height: 450px; 
        object-fit: cover;


    }
               
    .carousel-caption h5,
    .carousel-caption p {
    color: #000 !important;
    text-shadow: none !important;
}

    .carousel-caption {
    background: rgba(255, 255, 255, 0.6);
    border-radius: 8px;
}

    }
</style>

<div class="welcome-section">
    <h1 class="fw-bold">Bem-vindo ao SportStore</h1>
    <p class="text-muted">Aqui você encontra o melhor do mercado em material esportivo.</p>
</div>

<div class="carousel-container">
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"></button>
        </div>

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="https://dasports.com.br/cdn/shop/files/camisa-adidas-internacional-202526-i-com-patrocinios-6773870.webp?v=1756698731" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Camisetas</h5>
                    <p>Camiseta Internacional Home 2025</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="https://images.tcdn.com.br/img/img_prod/1044362/bermuda_jordan_sports_diamond_masculina_preta_3042_1_471c1219843e90797a77cda21e2f9715.png" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Bermudas</h5>
                    <p>Bermuda Jordan Black</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5yCGbJb5Rsg9v5aYp822zztUs7QZj9jaIP3ZUG9c62zh93XMWKbuLk9UhjDJOFsEjLp0&usqp=CAU" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Chuteiras</h5>
                    <p>Chuteira Nike Mercurial</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="https://d3qoj2c6mu9s8x.cloudfront.net/Custom/Content/Products/17/21/17210_mini-bola-adidas-copa-do-mundo-brazuca-14_z1_636378803711572862.webp" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Equipamentos</h5>
                    <p>Mini Bola Brazuca</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWCHSiw9jeA1Hy7L-mA23JwqiZAuH6aKYjKoCm_lEf_jgSKl0cCMcktB7l3Z1B0BkccS0&usqp=CAUz" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Academia</h5>
                    <p>Halteres 10kg</p>
                </div>
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

@endsection
