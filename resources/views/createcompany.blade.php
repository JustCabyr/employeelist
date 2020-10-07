 @extends('layouts.temp')

 @section('content')
    <h1>Create new Company</h1>
    <form method="post" action="/company" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter company name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Enter company email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="logo">Upload Logo</label>
            <input type="file" class="file" name="logo" multiple data-preview-file-type="any" data-upload-url="#" placeholder="Upload logo" value="{{ old('logo') }}">
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="text" class="form-control" name="website" id="website" placeholder="Enter company website" value="{{ old('website') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
 @endsection