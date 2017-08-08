@extends('layouts.index')
@section('title', 'users')

@section('content')

{{--<div class="container">--}}
    {{--<div class="header clearfix">--}}
        {{--<nav>--}}
            {{--<ul class="nav nav-pills pull-right">--}}
                {{--<li role="presentation" class="active"><a href="#">Home</a></li>--}}
                {{--<li role="presentation"><a href="#">About</a></li>--}}
                {{--<li role="presentation"><a href="#">Contact</a></li>--}}
            {{--</ul>--}}
        {{--</nav>--}}
        {{--<h3 class="text-muted">Project name</h3>--}}
    {{--</div>--}}

    {{--<div class="jumbotron">
        <h1>Jumbotron heading</h1>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
    </div>--}}

    <div class="row marketing">
        <div class=".col-xs-12 .col-sm-12 .col-md-12 col-lg-12">
           @foreach($users as $user)
            <div class="developer clearfix">
               <div class="avatar">
                   <a href="https://placeholder.com"><img src="http://via.placeholder.com/150x150"></a>
               </div>
               <div class="dev-info">
                   <div class="header-developer">
                       <a href="{{ route('profile', ['id' => $user->id]) }}"><h4>{{ $user->first_name }} {{ $user->last_name }}</h4></a>
                   </div>

                   <div>
                       @foreach($user->specialization() as $specialization)
                       <p>Specialization: {{ $specialization->title }}</p>
                       @endforeach
                       @foreach($user->count() as $country)
                       <p>Country: {{ $country->name }}</p>
                       @endforeach
                       @foreach($user->reg() as $reg)
                       {{--@foreach($users->jobs as $region)--}}
                       <p>Region: {{ $reg->name }}</p>
                       @endforeach
                       @foreach($user->cit() as $cit)
                       {{--@endforeach--}}
                       <p>City: {{ $cit->name }}</p>
                       @endforeach
                       @if ($user->experience !== 0)
                       <p>expereince: {{ $user->experience }} years</p>
                       @else
                       <p>expereince: less 1 years</p>
                       @endif
                   </div>
                   <div>
                       <p>Technology:</p>
                       @foreach($user->userTechnologies() as $technology)
                       <p>{{ $technology->title }};</p>
                       @endforeach
                   </div>
               </div>
           </div>
           @endforeach
               {{ $users->links() }}
        </div>


        {{--<div class="col-lg-12">--}}
            {{--<h4>Subheading</h4>--}}
            {{--<p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>--}}

            {{--<h4>Subheading</h4>--}}
            {{--<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>--}}

            {{--<h4>Subheading</h4>--}}
            {{--<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>--}}
        {{--</div>--}}
    </div>
    {{--<footer class="footer">--}}
        {{--<p>&copy; 2016 Company, Inc.</p>--}}
    {{--</footer>--}}

{{--</div> <!-- /container -->--}}

@endsection
