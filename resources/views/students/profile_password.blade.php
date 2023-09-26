@extends('students.layouts.master')
@section('css')

@endsection

@section('title')
تغيير كلمة المرور
@stop
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> تغيير كلمة المرور
            </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">تغيير</a></li>
                <li class="breadcrumb-item active"> كلمة المرور
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form action="{{ route('student.profile_password') }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>كلمة المرور القديمة</label>
                                <div class="input-group">
                                    <input type="password" id="oldPassword" name="old_password" placeholder="كلمة المرور القديمة" class="form-control @error('old_password') is-invalid @enderror"/>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <input type="checkbox" id="showOldPassword">
                                        </div>
                                    </div>
                                </div>
                                @error('old_password')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>كلمة المرور الجديدة</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" placeholder="كلمة المرور الجديدة" class="form-control @error('password') is-invalid @enderror"/>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <input type="checkbox" id="showPassword"> <!-- تبديل نوع الحقل هنا -->
                                        </div>
                                    </div>
                                </div>
                                @error('password')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>تأكيد كلمة المرور</label>
                                <div class="input-group">
                                    <input type="password" id="passwordConfirmation" name="password_confirmation" placeholder="تأكيد كلمة المرور" class="form-control"/>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <input type="checkbox" id="showPasswordConfirmation">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <button class="btn btn-success">تغيير كلمة المرور</button>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    const passwordInput = document.getElementById('password');
    const showPasswordCheckbox = document.getElementById('showPassword');

    showPasswordCheckbox.addEventListener('change', function() {
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>
<script>
    const oldPasswordInput = document.getElementById('oldPassword');
    const showOldPasswordCheckbox = document.getElementById('showOldPassword');

    showOldPasswordCheckbox.addEventListener('change', function() {
        if (this.checked) {
            oldPasswordInput.type = 'text';
        } else {
            oldPasswordInput.type = 'password';
        }
    });
</script>
<script>
    const passwordConfirmationInput = document.getElementById('passwordConfirmation');
    const showPasswordConfirmationCheckbox = document.getElementById('showPasswordConfirmation');

    showPasswordConfirmationCheckbox.addEventListener('change', function() {
        if (this.checked) {
            passwordConfirmationInput.type = 'text';
        } else {
            passwordConfirmationInput.type = 'password';
        }
    });
</script>


@endsection


