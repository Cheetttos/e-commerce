<!--Importando la plantilla -->
@extends('layout.e-commerce')

@section('title', 'Product by category')

@section('content')
    <div class="accordion" id="accordionExample">
        @foreach ($categories as $c)
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">

                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$c->id}}"
                            aria-expanded="true" aria-controls="collapse{{$c->id}}">
                            {{$c->name}}
                        </button>
                        <div id="collapse{{$c->id}}" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                @foreach ($c->products as $p)
                                    <img {{ asset('') }} >
                                @endforeach
                            </div>
                        </div>

                    </h2>
                </div>
        @endforeach

    </div>
    </div>
@endsection
