@extends('admins.master')
@section('title','الأياء')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">إضافة ولي  أمر</h1>

<div class="container">
    <div class="row">
        <form action="{{ route('admin.parent.store') }}" method="POST" >
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>اسم الأب</label>
                        <input type="text" name="name" placeholder="اسم الأب" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        />
                        @error('name')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>رقم الجوال</label>
                        <input type="text" name="phone" placeholder="رقم الجوال" class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone')}}"
                        />
                        @error('phone')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            </div>

            <button class="btn btn-success">اضافة الوالد</button>

        </form>

        <table class="table">
            <tr>
                <th>#</th>
                <th> اسم الأب</th>
                <th>رقم الهاتف</th>
                <th>رقم الهوية</th>
                <th>الحذف</th>
            </tr>
            @forelse ($parents as $parent )
            <tr>
                <td>{{ $parent->id }}</td>
                <td>{{ $parent->name }}</td>
                <td>{{ $parent->phone }}</td>
                <td>{{ $parent->id_number }}</td>
                <td>
                    <form class="d-inline" id="deleteForm" action="{{ route('admin.parent.destroy', $parent->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger" onclick="deletName(event, '{{ $parent->name }}')"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="5" class="text-center">لايوجد بيانات</td>
            </tr>

            @endforelse
            {{ $parents->links() }}
        </table>
</div>
@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
    @if (session('msg'))
    Toast.fire({
       icon: '{{ session("type") }}',
      title: '{{ session("msg") }}'
      })
    @endif
</script>


@endsection
