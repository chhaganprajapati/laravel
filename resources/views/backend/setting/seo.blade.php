@extends('admin.admin_master')

@section('admin')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card corona-gradient-card">
            <div class="card-body py-0 px-0 px-sm-3">
              <div class="row align-items-center">
                <div class="col-4 col-sm-3 col-xl-2">
                  <img src="{{ asset('backend/assets/images/dashboard/Group126@2x.png') }}" class="gradient-corona-img img-fluid" alt="">
                </div>
                <div class="col-5 col-sm-7 col-xl-8 p-0">
                  <h4 class="mb-1 mb-sm-0">Welcome to Easy News</h4>
                </div>
                <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                  <span>
                    <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Visit Frontend?</a>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Update SEO Setting</h4>
            <form class="forms-sample" action="{{ route('update.social',$seo->id) }}" method="POST">
                @csrf
              <div class="form-group">
                <label for="exampleInputUsername1">Facebook</label>
                <input type="text" name="facebook" class="form-control" value="{{ $social->facebook }}">
                @error('facebook')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Twitter</label>
                <input type="text" name="twitter" class="form-control" value="{{ $social->twitter }}">
                @error('twitter')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Youtube</label>
                <input type="text" name="youtube" class="form-control" value="{{ $social->youtube }}">
                @error('youtube')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Linkdin</label>
                <input type="text" name="linkdin" class="form-control" value="{{ $social->linkdin }}">
                @error('linkdin')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Instagram</label>
                <input type="text" name="instagram" class="form-control" value="{{ $social->instagram }}">
                @error('instagram')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary mr-2">Update</button>
            </form>
          </div>
        </div>
    </div>

</div>
@endsection
