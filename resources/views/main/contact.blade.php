@extends('layouts.app')
@section('content')
    <section class="contact">
        <div class="map">
            <iframe width="800" height="550" style="border:0" loading="lazy" allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDdbmlqwiCpiMIfOZZPJwg6T811tt3eoU8
                &q=Mass V Group, Congressional Avenue, Project 8, Quezon City, Metro Manila, Philippines">
            </iframe>
        </div>
        <div class="contact-form">
            <form action="">
                <h2>Have a query? Send us an Email</h2>
                <label for="email">Email</label>
                <input type="email" placeholder="e.g., juandelacruz@gmail.com">
                <label for="subject">Subject</label>
                <input type="text" placeholder="e.g., Support">
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
                <button>Send</button>
            </form>
        </div>

    </section>
@endsection
</body>

</html>
