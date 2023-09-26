@extends('website.app')
@section('title','تسجيل الدخول- بوابة الطالب')

@section('website')
<section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="{{ asset('front/images/student.png') }}"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 ">
          <form method="POST" action="{{ route('login.action') }}">
            @csrf
            {{-- أهم وحدة هاي  --}}
            <input type="hidden" name="guard" value="web">

            <div class="divider d-flex align-items-center my-4">
              <h3 class="text-center fw-bold mx-3 mb-0">بوابة الطالب -تسجيل الدخول</h3>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4  text-right">
                <label class="form-label" for="form3Example3">رقم الطالب</label>

              <input type="tel" name="number" id="form3Example3" class="form-control form-control-lg text-right  @error('number') is-invalid @enderror"
                placeholder="رقم الطالب"  value="{{ old('number') }}" required autocomplete="number" autofocus/>
                @error('number')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3 text-right">
                <label class="form-label" for="form3Example3">كلمة المرور</label>
              <input type="password" name="password" id="form3Example4" class="form-control form-control-lg text-right @error('password') is-invalid @enderror"
                placeholder="كلمة المرور" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">تسجيل الدخول</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>


@endsection
