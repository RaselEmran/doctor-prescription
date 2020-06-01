@extends('fontpage')
@section('title','Blog')
@push('css')

@endpush
@section('content')
    <section class="blog-head">
        <div class="container">
            <div class="row">
                <h2> ব্লগ পোস্ট </h2>
            </div>
        </div>
    </section>

<div class="container pt-5 blog-page">
<div class="row">
  @foreach ($post as $element)
  

  <div class="span8">
    
    <div class="row">
      <div class="col-sm-4">
        <a href="#" class="thumbnail">
            <img src="{{asset($element->image)}}" alt="doc.jpg" class="img-fluid">
        </a>
      </div>
      <div class="col-sm-8 blog-text ">  
       <h4><strong><a href="{{ route('blog.details',$element->id) }}">{{$element->title}}</a></strong></h4>    
     
       {!!str_limit($element->body,'350') !!}
     
        <a class="btn btn-outline-primary" href="{{ route('blog.details',$element->id) }}">আরো পড়ুন</a>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">
        <p></p>
        @php
         $tags = DB::table('posttags')
            ->join('tags', 'posttags.tag_id', '=', 'tags.id')
            ->where('post_id',$element->id)
            ->select('tags.*')
            ->get();
        @endphp
        <p>
          <i class="icon-user"></i> by <a href="#">{{$element->doctor_name}}</a> 
          | <i class="icon-calendar"></i> {{$element->date}}
          | <i class="icon-comment"></i> <a href="#">view {{$element->view_count}}</a>
          | <i class="icon-tags"></i> Tags : @foreach ($tags as $posttag)
            <a href="#"><span class="label label-info">{{$posttag->name}}</span></a> 
          @endforeach 
          
        </p>
       @php
    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]/details/".$element->id;

      @endphp 
        
      </div>
      <div class="col-sm-4 social-icon">
                    <ul class="social-icon ">
                        <li>  শেয়ার : </li>
                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $actual_link; ?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/home?status=<?php echo $actual_link; ?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://plus.google.com/share?url=<?php echo $actual_link; ?>"><i class="fa fa-google-plus"></i></a></li>

                        
                    </ul>
                
      </div>
    </div>
  </div>
    @endforeach
          <div class="col-md-12 options border-bottom">

                            <!-- pagination -->
                            <ul class="pagination pull-left">
                                <li>{{ $post->links() }}</li>
                                
                            </ul>

                        </div>
</div>
<hr>


 </div>
@endsection
@push('js')

@endpush