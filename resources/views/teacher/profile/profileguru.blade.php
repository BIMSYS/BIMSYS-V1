@extends('layouts.contentLayout', ['title' => 'Profile Guru'])
<style>
    #id {
        font-weight: 100;
        font-size: x-small;
    }
</style>
@section('content')
<section class="content-header">
    <div class="container">
        <div class="card mb-3" style="background-image: linear-gradient(150deg, #7df9ff, #2c75ff, #3137fd); height: 250px;">
            <div class="container d-flex justify-content-center">
                <img src="{{ URL::asset('/img/profile-user.png')}}" style="height: 75px; width: 75px; border-radius: 50%;" class="card-img-top mt-5 " alt="..." id="profpict">
            </div>
            <h3 class="text-center text-light mt-3">Rafi Adinegoro</h3>
        </div>

</section>
<section class="content">
    <div class="container">
        <div class="card card-primary card-tabs">
            <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Edit Profile</a>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        <h6 style="font-weight: bold;">User ID</h6>
                        <p>@rafiadinegoro</p>
                        <hr>
                        <h6 style="font-weight: bold;">Email Address</h6>
                        <p>rafiadinegoro30@gmail.com</p>
                        <hr>

                    </div>
                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                        <form>
                            <div class="row">
                                <div class="col d-flex justify-content-center mt-5">
                                    <img src="{{URL::asset('/img/profile-user.png')}}" alt="" style="height: 250px; width: 250px;">
                                </div>
                                <div class="col mt-5">
                                    <div class="mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-primary">
                                                <span class="far fa-user" style="width: 20px;"></span>
                                            </div>
                                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Rafi Adinegoro" autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-primary">
                                                <span class="fas fa-portrait" style="width: 20px;"></span>
                                            </div>
                                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="@rafiadinegoro" autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-primary">
                                            <span class="fas fa-envelope" style="width: 20px;"></span>
                                        </div>
                                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="rafiadinegoro30@gmail.com" autocomplete="new-password">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary" style="border-radius: 5%;"><img src="{{URL::asset('/img/edit.png')}}" style="width: 25px; height: 25px;" class="mb-1" alt="">&nbsp; &nbsp; Submit</button>
                                </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- /.card -->
    </div>
    </div>
</section>
@endsection