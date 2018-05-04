@extends('main')
@section('title','Contact Me')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>About Us</h1>
            <hr>
            <form action="">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" class="form-control">
                </div>

                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea type="text" id="message" name="message" class="form-control">Type Your Message Here...</textarea>
                </div>
                <input type="submit" class="btn btn-success" value="Send Message">
            </form>

        </div>
    </div>
@endsection