@extends('layouts.app')

@section('content')
<!--
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
-->

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="container">
      <h2>Uber-Shortener</h2>
		{!! Form::open(array('url'=>'/','method'=>'post')) !!}
		{!! Form::text('link',Request::old('link'),array('placeholder'=>'Insert your URL here and press enter!')) !!}
		{!! Form::close() !!}
		<br>
		
		  <table style="margin:50px 0 0 0;" class="table table-bordered">
    <thead>
      <tr>
		  
		  <td>URL</td>
		  <td>IP ADDRESS</td>
		  <td>CITY</td>
		  <td>STATE</td>
		  <td>COUNTRY CODE</td>
		  <td>COUNTRY</td>
		  <td>CURRENCY CODE</td>
		  <td>CURRENCY SYMBOL</td>
		  <td>LATITUDE</td>
		  <td>LONGITUDE</td>
		  <td>UBER</td>
      </tr>
    </thead>
			  
    <tbody>
		 @foreach($urls as $value)
		  <?php
		$url = $value->url;
		$host = parse_url($url, PHP_URL_HOST);
		$ip = gethostbyname($host);
		$data = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
	  
	  ?>
		<tr>
		
			<td><a href="{{ $value->url }}">{{ $value->url }}</a><br>
			
			<form action="{{@url('home').'/'.$value->id}}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-danger">Detete</button>
            </form>
			</td>
			<td><?= $data['geoplugin_request'] ?></td>
			<td><?= $data['geoplugin_city'] ?></td>
			<td><?= $data['geoplugin_region'] ?></td>
			<td><?= $data['geoplugin_countryCode'] ?></td>
			<td><?= $data['geoplugin_countryName'] ?></td>
			<td><?= $data['geoplugin_currencyCode'] ?></td>
			<td><?= $data['geoplugin_currencySymbol'] ?></td>
			<td><?= $data['geoplugin_latitude'] ?></td>
			<td><?= $data['geoplugin_longitude'] ?></td>
        	<td>{{ $value->hash }}</td>
		</tr>
		@endforeach
			</tbody>
		</table>

		<ul class="pagination pagination-lg">
<li>{{ $urls->links() }}</li>
		</ul>
		 <div>
		@if(Session::has('link'))
			<h3 class="success"><br>
			{{Html::link(Session::get('link'),'Click here for your shortened URL')}}</h3>
		@endif
		
     	@if(Session::has('errors'))
			<h3 class="error"><br>{{$errors->first('link')}}</h3>
		@endif	
			
				</div>
		</div>
                </div>

@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
@endsection
