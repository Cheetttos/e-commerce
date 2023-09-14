@extends('layout.e-commerce')

@section('title', 'Contacto')

@section('content')
    <div class="row banner" id="banner">
        <div class="col">
            <div id="imagen_banner">
                <h1 id="titulo" class="blanco">Contacto</h1>
            </div>
        </div>
    </div>
    </header>

    <section>
        <div class="container-fluid seccion">
            <div class="row cuadro_gris">
                <h4>Pueden contactar con Lince Store, a través de los siguientes canales</h4>
            </div>
            <div class="contact">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="contact-info">
                                <h2>Our Office</h2>
                                <h3><i class="fa fa-map-marker"></i>123 Office, Los Angeles, CA, USA</h3>
                                <h3><i class="fa fa-envelope"></i>office@example.com</h3>
                                <h3><i class="fa fa-phone"></i>+123-456-7890</h3>
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="contact-info">
                                <h2>Our Store</h2>
                                <h3><i class="fa fa-map-marker"></i>123 Store, Los Angeles, CA, USA</h3>
                                <h3><i class="fa fa-envelope"></i>store@example.com</h3>
                                <h3><i class="fa fa-phone"></i>+123-456-7890</h3>
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 form_quejas">

                            <form method="POST" action="{{ route('contact_post') }}">
                                @csrf

                                <!-- Mensaje -->
                                @if (session()->get('success'))
                                    <div class="alert alert-success text-center">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!-- Fin Mensaje -->
                                <label class="form-check-label" id="disabledFieldsetCheck1">
                                    Nombre
                                </label>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                                    aria-label="Username">
                                <label class="form-check-label" id="disabledFieldsetCheck2">
                                    Email
                                </label>
                                
                                    <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                                        id="exampleFormControlInput1">
                                <label class="form-check-label" id="disabledFieldsetCheck3">
                                    Asunto
                                </label>
                                <input type="text" name="subject" value="{{ old('subject') }}" class="form-control"
                                    aria-label="Username">
                                <label class="form-check-label" id="disabledFieldsetCheck4">
                                    Queja ó denuncia
                                </label>
                                    <textarea class="form-control" value="{{ old('message') }}" name="message" id="exampleFormControlTextarea1"
                                        rows="3"></textarea>
                                <button type="submit" class="btn btn-warning">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
    </section>
@endsection
