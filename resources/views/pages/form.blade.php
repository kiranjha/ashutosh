@extends('layouts.app')
@section('content')
<hr>
        <div class="flex-center position-ref full-height">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 id="test">Form Validate</h4>
                </div>
                <div class="panel-body">
                
                        <form action="{{ route('store.form.validate') }}" method="post" enctype="multipart/form-data" id="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="username" class="form-control" >
                                    
                                </div>
                                <div class="col-md-4">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" >
                                </div>
                                <div class="col-md-4">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <fieldset>
                            <legend>About School</legend>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        {{Form::label('country', 'Country')}}
                                        <select name="country" id="country" class="form-control" ="">
                                        <option value="">Select Country</option>
                                        
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        {{Form::label('state', 'State')}}
                                        <select name="state" id="state" class="form-control" ="">
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="contact">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email Here" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="location">Phone</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Mobile No Here" >
                                    </div>

                                    <div class="col-md-4">
                                        <label for="establish">Website Url</label>
                                        <input type="text" name="url" class="form-control" >
                                    </div>
                                    <div class="col-md-4">
                                        <label for="agree">
                                            Agree<input type="checkbox" name="agree" id="agree" class="checkbox">
                                        </label><br>
                                        <label for="newsletter">
                                            Mail<input type="checkbox" name="newsletter" id="newsletter" class="checkbox">
                                        </label>    
                                            
                                            <fieldset id="mail_topic">
                                                <legend>Mail Subscription</legend>
                                                <label for="Tech">For Tech Subscription
                                                    <input type="checkbox" name="topic" id="tech" value="tech">
                                                </label><br>
                                                <label for="science">For Science Subscription
                                                    <input type="checkbox" name="topic" id="science" value="science">
                                                </label><br>
                                                <label for="blog">For Blog Subscription
                                                    <input type="checkbox" name="topic" id="blog" value="blog">
                                                </label><br>
                                                <label for="error" class="error"> Please select at least two options</label>
                                            </fieldset>   
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row">
                            <div class="col-sm-12">
                                <textarea name="message" id="message" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <input type="submit" value="Submit" class="submit">
                        </form>
                    </div>
            </div>
        </div>
@endsection
