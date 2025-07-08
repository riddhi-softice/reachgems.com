@extends('admin.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Common Setting</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        </ol>
    </nav>
</div>

<section class="section">
    <form action="{{ route('change_setting') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Price Setting</h5>
                        @foreach ($settings as $setting)
                            @if ($setting->setting_key == 'USD_price')
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-4 col-form-label">1 USD to INR</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="USD_price" value="{{ old('setting_value', $setting->setting_value) }}" placholder="USD Price" required>
                                        <small class="form-text text-muted">{{ $setting->data_comment }}</small>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Top Header Setting</h5>

                        @foreach ($settings as $setting)
                            @if ($setting->setting_key == 'top_header_heading1')
                                <div class="row mb-3">
                                    <label for="top_header_heading1" class="col-sm-4 col-form-label">Top Header Heading-1</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="top_header_heading1" class="form-control" name="top_header_heading1" value="{{ old('setting_value', $setting->setting_value) }}" placeholder="{{ $setting->data_comment }}" required>
                                        <small class="form-text text-muted">{{ $setting->data_comment }}</small>
                                    </div>
                                </div>
                            @endif
                        
                            @if ($setting->setting_key == 'top_header_heading2')
                                <div class="row mb-3">
                                    <label for="top_header_heading2" class="col-sm-4 col-form-label">Top Header Heading-2</label>
                                    <div class="col-sm-8">
                                        <textarea id="top_header_heading2" name="top_header_heading2" class="form-control" rows="2" placeholder="{{ $setting->data_comment }}" >{{ old('setting_value', $setting->setting_value) }}</textarea>
                                        <small class="form-text text-muted">{{ $setting->data_comment }}</small>
                                    </div>
                                </div>
                            @endif
                          
                            @if ($setting->setting_key == 'top_header_time_status')
                                <div class="row mb-3">
                                    <label for="top_header_time_status" class="col-sm-4 col-form-label">Top Header Time Status</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="top_header_time_status" name="top_header_time_status">                                           
                                            <option value="is_enable" {{ $setting->setting_value == 'is_enable' ? 'selected' : ''  }}>Enable</option>
                                            <option value="is_disable" {{ $setting->setting_value == 'is_disable' ? 'selected' : ''  }}>Disable</option>
                                        </select>
                                        <small class="form-text text-muted">{{ $setting->data_comment }}</small>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Category Setting</h5>

                        @foreach ($settings as $setting)
                            @if ($setting->setting_key == 'cat_heading')
                                <div class="row mb-3">
                                    <label for="cat_heading" class="col-sm-4 col-form-label">Category Heading</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="cat_heading" class="form-control" name="cat_heading" value="{{ old('setting_value', $setting->setting_value) }}" placeholder="{{ $setting->data_comment }}" required>
                                        <small class="form-text text-muted">{{ $setting->data_comment }}</small>
                                    </div>
                                </div>
                            @endif
                        
                            @if ($setting->setting_key == 'cat_desc')
                                <div class="row mb-3">
                                    <label for="cat_desc" class="col-sm-4 col-form-label">Category Description</label>
                                    <div class="col-sm-8">
                                        <textarea id="cat_desc" name="cat_desc" class="form-control" rows="2" placeholder="{{ $setting->data_comment }}" required>{{ old('setting_value', $setting->setting_value) }}</textarea>
                                        <small class="form-text text-muted">{{ $setting->data_comment }}</small>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Video Setting</h5>

                        @foreach ($settings as $setting)
                            @if ($setting->setting_key == 'video_heading')
                                <div class="row mb-3">
                                    <label for="video_heading" class="col-sm-4 col-form-label">Category Heading</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="video_heading" class="form-control" name="video_heading" value="{{ old('setting_value', $setting->setting_value) }}" placeholder="{{ $setting->data_comment }}" required>
                                        <small class="form-text text-muted">{{ $setting->data_comment }}</small>
                                    </div>
                                </div>
                            @endif
                        
                            @if ($setting->setting_key == 'video_description')
                                <div class="row mb-3">
                                    <label for="video_description" class="col-sm-4 col-form-label">Category Description</label>
                                    <div class="col-sm-8">
                                        <textarea id="video_description" name="video_description" class="form-control" rows="4" placeholder="{{ $setting->data_comment }}" required>{{ old('setting_value', $setting->setting_value) }}</textarea>
                                        <small class="form-text text-muted">{{ $setting->data_comment }}</small>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    
                    </div>
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</section>
@endsection
@section('javascript')
@endsection