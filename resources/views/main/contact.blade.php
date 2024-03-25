@extends('layouts.app')
@section('content')
    <section class="contact">
        <div class="map">
            <iframe width="800" height="550" style="border:0; border-radius: 4px;" loading="lazy" allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDdbmlqwiCpiMIfOZZPJwg6T811tt3eoU8
                &q=MVG Circle 1001 Corp. , 3F, 34 Congressional Ave, Project 8, Lungsod Quezon, Kalakhang Maynila">
            </iframe>
        </div>
        <div class="contact-form">
            <form id="contact">
                <h2>Have a query? Send us an Email</h2>
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="e.g., juandelacruz@gmail.com">
                <label for="subject">Subject</label>
                <input type="text" id="subject" placeholder="e.g., Support">
                <label for="message">Message</label>
                <textarea name="message" id="message-content" cols="10" rows="10"
                    style = "width: 100%; height: 150px; background: none; border: none">
                </textarea>
                <button onclick="sendEmail(event)">Send</button>
            </form>
        </div>

    </section>
@endsection
</body>

</html>
