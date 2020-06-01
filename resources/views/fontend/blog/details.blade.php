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

<div class="container pt-5">
<div class="row">
  <div class="span8">
    <div class="row">
      <div class="span8 pl-5">
        <h4 class="text-center"><strong><a href="#">{{$post->title}}</a></strong></h4>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-10 ">
        <a href="#" class="thumbnail text-center">
            <img src="{{asset($post->image)}}" alt="doc.jpg" class="img-fluid " width="100%">
        </a>
      </div>
      <div class="col-md-2">
          <h4 class=" ">সম্পর্কিত পোস্ট</h4>
                    <div class="post-widget">
                      @php
                        $releted =DB::table('blogposts')->orderBy('id','desc')->where('id','!=',$post->id)->take('4')->get();
                      @endphp
                        <ul>
                          @foreach ($releted as $reletedpost)
                         <li>
                                <a href="javascript:void(0)" onclick="view_post(12)">
                                    <img src="{{asset($reletedpost->image)}}" alt="" width="120px">
                                </a> <a href="{{ route('blog.details',$reletedpost->id) }}" onclick="view_post(12)">{{$reletedpost->title}}</a> </li>
                            <li>
                          @endforeach
                      

                        </ul>
                    </div>

              {{--       <div>
                      <h2 style="">Our Facebook Page</h2>
                   <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fsattbd%2F&width=350px&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId" width="300px" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>
 --}}      </div>
      <div class="col-sm-10 blog-text ">      
    
         {!!$post->body!!}
       
        
      </div>
    </div>
     <div class="row">
      <div class="col-sm-8">
          @php
         $tags = DB::table('posttags')
            ->join('tags', 'posttags.tag_id', '=', 'tags.id')
            ->where('post_id',$post->id)
            ->select('tags.*')
            ->get();
        @endphp
        <p></p>
        <p>
          <i class="icon-user"></i> by <a href="#">{{$post->doctor_name}}</a> 
          | <i class="icon-calendar"></i> {{$post->date}}
          | <i class="icon-comment"></i> <a href="#">view {{$post->view_count}}</a>
          | <i class="icon-tags"></i> Tags : @foreach ($tags as $posttag)
            <a href="#"><span class="label label-info">{{$posttag->name}}</span></a> 
          @endforeach 
          
        </p>
        
        
      </div>
      @php
    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

      @endphp
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
</div>

<hr>
@php
    $pass =DB::table('blogposts')->where('id',$post->id)->update(['view_count'=>$post->view_count+1]);
@endphp
 </div>
@endsection
@push('js')

@endpush