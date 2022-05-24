@extends('dashboard.base')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Edit Template</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('mail.index') }}" class="btn addbtn">Back</a> 
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('mail.update', $template->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{ $template->name ?? '' }}" placeholder="Name" name="name">
                                    @error('name')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-8">
                                    <label>Subject <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" value="{{ $template->subject ?? '' }}" placeholder="Subject" name="subject">
                                    @error('subject')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror      
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4 text-center">
                                    <label>Template Content Item</label>
                                    @foreach(json_decode($template->variables) as $var)
                                        <p>[{{$var}}]</p>
                                    @endforeach
                                </div>
                                <div class="col-md-8">
                                    <label>Template Content <span class="text-danger">*</span></label>
                                    <textarea class="ckeditor form-control" name="content" rows="20" placeholder="  Enter your email template content here">{!! $template->content !!}</textarea>
                                    @error('content')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button class="btn addbtn" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('javascript')
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection
