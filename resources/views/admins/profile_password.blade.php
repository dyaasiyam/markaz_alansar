@extends('admins.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">تغيير كلمة المرور</h3>
            <form action="{{ route('admin.profile_password') }}" method="POST">
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
