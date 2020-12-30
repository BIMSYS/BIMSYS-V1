@extends('layouts.contentLayout', ['title' => 'Create User'])

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Create User</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="col-md-12 d-flex justify-content-center">
        <div class="card">
            <div class="card-header bg-primary">
                <h1 style="text-align:center;">Create New User</h1>
            </div>

            <div class="card-body">
                <fieldset>
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <div class="form-group ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary">Name</div>
                                </div>

                                <input type="text" name="user-name"
                                    class="form-control @error('user-name') is-invalid @enderror" name="user-name"
                                    placeholder="Name" value="{{ old('user-name') }}" required autocomplete="user-name"
                                    autofocus>
                                @error('user-name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="input-group mb-3 mx-1">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary">Role</div>
                                </div>

                                <select class="form-control custom-select @error('user-role') is-invalid @enderror"
                                    id="user-role" name="user-role" value="{{ old('user-role') }}" required
                                    autocomplete="user-role" autofocus>
                                    <option value="#">Choose Role..</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
                                </select>
                                @error('user-role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary">Username</div>
                                </div>

                                <input type="text" name="user-username"
                                    class="form-control @error('user-username') is-invalid @enderror"
                                    name="user-username" placeholder="Username" value="{{ old('user-username') }}"
                                    required autocomplete="user-username" autofocus>
                                @error('user-username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary">Email</div>
                                </div>

                                <input type="email" name="user-email"
                                    class="form-control @error('user-email') is-invalid @enderror" name="user-email"
                                    placeholder="Email" value="{{ old('user-email') }}" required
                                    autocomplete="user-email" autofocus>
                                @error('user-email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-primary">Password</div>
                                    </div>

                                    <input type="password" name="user-password"
                                        class="form-control @error('user-password') is-invalid @enderror"
                                        name="user-password" placeholder="Password" value="{{ old('user-password') }}"
                                        required autocomplete="user-password" autofocus>
                                    @error('user-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-primary">Confirm Password</div>
                                    </div>

                                    <input id="user-confirm-password" type="password" class="form-control"
                                        name="user-confirm-password" placeholder="Confirm Password" required
                                        autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary">Profile Image</div>
                                </div>

                                <div class="custom-file">
                                    <input type="file"
                                        class="custom-file-input @error('user-image') is-invalid @enderror"
                                        id="user-image" name="user-image" value="{{ old('user-image') }}">
                                    <label class="custom-file-label" for="user-image">Choose file</label>

                                    @error('user-image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <ul class="nav justify-content-center">
                                <button type="submit" class="border-0 bg-transparent"><img
                                        src="{{ URL::asset('/img/check.png') }}" style="width: 50px; height: 50px;"
                                        class="mb-2 mr-3 mt-3" alt="Submit"></button>
                                <button type="reset" class="border-0 bg-transparent"><img
                                        src="{{ URL::asset('/img/cancel.png') }}" style="width: 50px; height: 50px;"
                                        class="mb-2 mr-3 mt-3" alt="Cancel"></button>
                            </ul>
                        </div>
                    </form>
                </fieldset>


            </div> <!-- tutup card body -->
        </div> <!-- tutup card -->
    </div> <!-- tutup col -->

</section>
@endsection

@push('js')
<!-- Img JS -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".custom-file-input").on("change", function() {
            var name = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(name);
        });
    });
</script>
@endpush