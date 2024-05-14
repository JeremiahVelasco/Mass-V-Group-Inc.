@extends('layouts.app')
@section('content')
    <section class="lubricants">
        <img src="assets/samic-collection.png" alt="">
        <h1>SAMIC Lubricants</h1>
        <h3>Lubricants Specialist in Automotive, Marine, Industrial and Commercial</h3>
        <ul>
            <li>From U.A.E.</li>
            <li>Finest base oil procured from Exxon Mobil, Korean and European Refineries</li>
            <li>Superior additives from Afton, Chevron, Infinium and Lubrizol</li>
        </ul>
    </section>

    <section class="posters">
        <img src="/assets/SamicOne.png" alt="SAMIC-Product-Page">
        <img src="/assets/SamicTwo.png" alt="SAMIC-Product-Page">
    </section>

    <section class="catalog">
        <h1 class="catalog-title">SAMIC Catalog</h1>
        <div class="embed-container" id="catalog">
            <embed id="samic-catalog" src="samic-catalog.pdf" type="application/pdf">
        </div>
        <h1 class="catalog-title">SAMIC Product List</h1>
        <div class="embed-container" id="list">
            <embed id="samic-product-list" src="samic-product-list.pdf" type="application/pdf">
        </div>
    </section>
@endsection
