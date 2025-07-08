@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>FAQs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('categories.index') }}">FAQs</a></li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit FAQ</h5>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('faqs.update', $faq->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Question</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="question" value="{{ old('question', $faq->question) }}" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Answer</label>
                                <div class="col-sm-8">
                                    <textarea id="answer" name="answer" class="form-control" rows="4" required>{{ old('answer', $faq->answer) }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                {{-- <label class="col-sm-2 col-form-label"></label> --}}
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('javascript')
@endsection
