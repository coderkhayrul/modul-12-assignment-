@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @guest
                    <div class="card">
                        <div class="card-header">{{ env('APP_NAME') }}</div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Login Email</label>
                                <div class="col-md-6">
                                    <input disabled id="email" type="text" class="form-control" value="admin@mail.com">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Login Password</label>
                                <div class="col-md-6">
                                    <input id="password" disabled type="text" class="form-control" value="password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Login Email</label>
                                <div class="col-md-6">
                                    <input disabled id="email" type="text" class="form-control" value="user@mail.com">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Login Password</label>
                                <div class="col-md-6">
                                    <input id="password" disabled type="text" class="form-control" value="password">
                                </div>
                            </div>
                            <br>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <h4 class="text-center text-info">Application Setup Guide And Steps</h4>
                                    <p class="text-center">1. Create a database in your local machine and name it
                                        <strong>Online Bus Ticket Booking </strong>(example)
                                    </p>
                                    <p class="text-center">2. Connect Database With Your Application And Enter The Command:
                                        <code>php artisan migrate:fresh --seed</code>
                                    </p>
                                    <p class="text-center">3. Run <strong>composer install</strong> to install all the
                                        dependencies</p>
                                    <p class="text-center">3. Run <strong>npm install</strong> to install all the node
                                        dependencies</p>
                                    <p class="text-center">3. Run <strong>npm run dev</strong> to Compile all Asset File With
                                        Live Changes </p>
                                    <p class="text-center">4. Run <strong>php artisan serve</strong> to start the application
                                    </p>
                                    <p class="text-center">5. Visit <strong>http://localhost:8000</strong> to view the
                                        application</p>
                                    <p class="text-center">6. Login with the credentials above</p>
                                    <p class="text-center">7. Enjoy the application</p>

                                    <p class="text-center">Thank you for using this application</p>
                                    <p class="text-center">For more information, contact me on <strong>+8801835061968</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endguest
                @auth
                    <div class="text-center mt-5">
                        <h1 class="text-success">Online Bus Ticket Booking</h1>
                        <h4 class="text-dark">A Simple Bus Ticket Management System</h4>
                        <p class="text-dark">Developed By <strong>Khayrul Islam Shanto</strong></p>
                        <p class="text-dark">Contact: <strong>+8801835061968</strong></p>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
