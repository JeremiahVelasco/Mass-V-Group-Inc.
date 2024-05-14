@extends('layouts.app')
@section('content')
    <section class="products">
        <div class="product-container">
            @foreach ($batteries as $battery)
                <div class="product-card">
                    <img src="{{asset('storage/'.$battery->image) }}" alt="megaforce batteries">
                    <h2>{{ $battery->name }}</h2>
                    <ul class="main-details">
                        <li>{{ $battery->description1 }}</li>
                        <li>{{ $battery->description2 }}</li>
                        <li>{{ $battery->description3 }}</li>
                    </ul>
                    <br>
                    <ul class="misc">
                        <li>{{ $battery->warranty }}</li>
                    </ul>
                    <button><a id = "inquire" href = "{{ url('/contact') }}">Inquire</a></button>
                </div>
            @endforeach
        </div>
    </section>
@endsection
</body>

</html>
