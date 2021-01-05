@extends('layouts.app')

@section('content')
<section class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="down-contact">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="sidebar-item contact-form">
                                <div class="sidebar-heading">
                                    <h2>Send us a message</h2>
                                </div>
                                <div class="content">
                                    {!! Form::open(['action' =>
                                    'App\Http\Controllers\ContactUsFormController@contactUsForm', 'method' => 'POST'])
                                    !!}

                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            {{Form::label('name', 'Name')}}
                                            {{Form::text('Name', '',['id' => 'name', 'name' => 'name', 'placeholder' => 'Name'])}}
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            {{Form::label('email', 'Email')}}
                                            {{Form::text('Email', '',['id' => 'email', 'name' => 'email', 'placeholder' => 'example@mail.com'])}}
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            {{Form::label('subject', 'Subject')}}
                                            {{Form::text('Subject', '',['id' => 'subject', 'name' => 'subject', 'placeholder' => 'subject'])}}
                                        </div>
                                        <div class="col-lg-12">
                                            {{Form::label('message', 'Message')}}
                                            {{Form::textarea('Message', '',['id' => 'message', 'name' => 'message', 'placeholder' => 'Your Message'])}}

                                        </div>
                                        <div class="col-lg-12">
                                            {{Form::submit('Send Message', ['class' => 'main-button', 'id' => 'form-submit'])}}
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sidebar-item contact-information">
                                <div class="sidebar-heading">
                                    <h2>contact information</h2>
                                </div>
                                <div class="content">
                                    <ul>

                                        <li>
                                            <h5>info@company.com</h5>
                                            <span>EMAIL ADDRESS</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection
