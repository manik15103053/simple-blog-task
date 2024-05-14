@extends('layouts.master')

@section('main-content')
<h4 class="mt-5 mb-3">Category</h4>
        <div class="row">
            @if($categories->isNotEmpty())
                @foreach($categories as $item)
                    <div class="col-sm-2">
                        <div class="card category-custom-card">
                            <div class="card-body">
                                <h5 class="card-title custom-title text-center"><a href="#" class="category-link">{{ $item->name ?? "" }}</a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <!----end Card Item---->
        <!-----Blog Post----->
        <h4 class="mt-5">Blog Post</h4>
        <div class="row">
            @if($blogs->isNotEmpty())
                @foreach($blogs as $blog)
                    <div class="col-md-4">
                        <div class="card mt-3" style="width: 18rem;">
                            <img src="{{ asset($blog->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->title ?? "" }}</h5>
                                <p class="card-text">{{ Str::limit($blog->text_content,100,'..') ?? "" }}.</p>

                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
@endsection
