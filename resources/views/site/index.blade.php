@extends('site.layout.layout')
@section('url')
{{Request::fullUrl()}}
@stop
@section('title')
 {{\App\Http\Helpers\Helpers::stringReplace($setting->name_ar,3)}}
@stop
@section('description')
   {{\App\Http\Helpers\Helpers::stringReplace($setting->description,3)}}
@stop
@section('css')

@endsection

@section('header')
  @include('site.layout.header')
@stop

@section('content')
    
    <!-- Header -->
    <header id="large-header" class="header demo large-header">
			<canvas id="demo-canvas"></canvas>
			<div class="container">
				<div class="content"> 
					<div class="row">
						<div class="col-lg-8" data-aos="fade-up"> 
							<div class="header-box"> 
								<h1 class="title">{!! $data['slider']->details !!}</h1>
							</div> 
						</div>  
					</div>
					<div class="row">
						<div class="col-lg-12 text-right" data-aos="fade-up"> 
							<img src="{{URL::to('/')}}/uploads/{{$data['slider']->image}}" class="img-fluid" alt="header-bg">
						</div> 
					</div>
				</div>
			</div> 
		</header>
      <!-- end:: navigation -->

<!-- features-section -->
		<section id="features">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6" data-aos="fade-up">
						<div class="section-title"> 
							<p>{{$data['statistics_st']->title}}</p>
							<h2>{!! $data['statistics_st']->details !!}</h2>
						</div>
					</div>
				</div>
				<div class="row">
          @php $i=1; @endphp
          @foreach($data['statistics'] as $s)
					<div class="col-lg-4 col-sm-6">
						<div class="features-box">
							<div class="features-box-icon red" data-aos="fade-up">
                @if($i == 1)
								<svg xmlns="http://www.w3.org/2000/svg" width="45" height="37.313" viewBox="0 0 45 37.313"><g transform="translate(0 -43.729)"><g transform="translate(0 60.072)"><path d="M38.408,233.061H34a6.573,6.573,0,0,0-1.732.233,6.6,6.6,0,0,0-5.878-3.614H18.607a6.6,6.6,0,0,0-5.878,3.614A6.573,6.573,0,0,0,11,233.061h-4.4A6.6,6.6,0,0,0,0,239.653v7.042a3.96,3.96,0,0,0,3.955,3.955h37.09A3.96,3.96,0,0,0,45,246.695v-7.042A6.6,6.6,0,0,0,38.408,233.061Zm-26.393,3.211v11.741H3.955a1.32,1.32,0,0,1-1.318-1.318v-7.042A3.96,3.96,0,0,1,6.592,235.7H11a3.943,3.943,0,0,1,1.034.138C12.022,235.981,12.015,236.126,12.015,236.272Zm18.333,11.741h-15.7V236.272a3.96,3.96,0,0,1,3.955-3.955h7.786a3.96,3.96,0,0,1,3.955,3.955Zm12.015-1.318a1.32,1.32,0,0,1-1.318,1.318h-8.06V236.272c0-.147-.007-.292-.016-.436A3.947,3.947,0,0,1,34,235.7h4.4a3.96,3.96,0,0,1,3.955,3.955Z" transform="translate(0 -229.68)"/></g><g transform="translate(2.937 51.004)"><path d="M39.272,126.5a5.858,5.858,0,1,0,5.858,5.858A5.864,5.864,0,0,0,39.272,126.5Zm0,9.078a3.221,3.221,0,1,1,3.221-3.221A3.224,3.224,0,0,1,39.271,135.582Z" transform="translate(-33.414 -126.504)"/></g><g transform="translate(14.674 43.729)"><path d="M174.788,43.729a7.826,7.826,0,1,0,7.826,7.826A7.834,7.834,0,0,0,174.788,43.729Zm0,13.014a5.189,5.189,0,1,1,5.189-5.189A5.195,5.195,0,0,1,174.788,56.743Z" transform="translate(-166.962 -43.729)"/></g><g transform="translate(30.348 51.004)"><path d="M351.152,126.5a5.858,5.858,0,1,0,5.858,5.858A5.864,5.864,0,0,0,351.152,126.5Zm0,9.078a3.221,3.221,0,1,1,3.221-3.221A3.225,3.225,0,0,1,351.152,135.582Z" transform="translate(-345.294 -126.504)"/></g></g></svg>
                @elseif($i == 2)
								<svg xmlns="http://www.w3.org/2000/svg" width="45" height="35.775" viewBox="0 0 45 35.775"><g transform="translate(31.219 5.175)"><path d="M368.52,122.916l-10.406-11.025a1.687,1.687,0,1,0-2.454,2.316l9.313,9.866-9.313,9.867a1.688,1.688,0,0,0,2.454,2.317l10.406-11.026A1.688,1.688,0,0,0,368.52,122.916Z" transform="translate(-355.199 -111.361)"/></g><g transform="translate(0 5.175)"><path d="M13.322,133.939l-9.313-9.867,9.313-9.867a1.688,1.688,0,0,0-2.455-2.316L.461,122.914a1.688,1.688,0,0,0,0,2.317l10.407,11.026a1.688,1.688,0,0,0,2.454-2.318Z" transform="translate(-0.001 -111.36)"/></g><g transform="translate(18.337 0)"><path d="M215.529,52.5a1.689,1.689,0,0,0-1.923,1.414l-4.95,32.4a1.688,1.688,0,0,0,1.414,1.923,1.736,1.736,0,0,0,.257.019,1.688,1.688,0,0,0,1.666-1.433l4.95-32.4A1.688,1.688,0,0,0,215.529,52.5Z" transform="translate(-208.636 -52.478)"/></g></svg>
                @else
								<svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45"><path d="M43.682,3.248H37.907q.031-.959.033-1.929A1.318,1.318,0,0,0,36.621,0H8.379A1.318,1.318,0,0,0,7.06,1.318q0,.97.033,1.929H1.318A1.318,1.318,0,0,0,0,4.566,28.574,28.574,0,0,0,4.347,20.259c2.771,4.165,6.462,6.554,10.449,6.786a13.537,13.537,0,0,0,2.855,2.4V35.3H15.44a4.854,4.854,0,0,0-4.849,4.849v2.212H10.5A1.318,1.318,0,0,0,10.5,45H34.5a1.318,1.318,0,0,0,0-2.637h-.094V40.151A4.854,4.854,0,0,0,29.56,35.3H27.349V29.443a13.528,13.528,0,0,0,2.855-2.4c3.987-.232,7.678-2.621,10.449-6.786A28.574,28.574,0,0,0,45,4.566,1.318,1.318,0,0,0,43.682,3.248ZM6.542,18.8A25.408,25.408,0,0,1,2.665,5.885H7.24a44.055,44.055,0,0,0,4.1,15.994q.527,1.055,1.1,1.993A12.715,12.715,0,0,1,6.542,18.8Zm25.23,21.352v2.212H13.228V40.151a2.215,2.215,0,0,1,2.212-2.212H29.56A2.215,2.215,0,0,1,31.772,40.151ZM24.712,35.3H20.288V30.589a8.578,8.578,0,0,0,4.424,0Zm.816-7.85a1.282,1.282,0,0,0-.171.086,6.156,6.156,0,0,1-5.714,0,1.312,1.312,0,0,0-.173-.088,10.612,10.612,0,0,1-2.98-2.456,1.334,1.334,0,0,0-.168-.2,20.782,20.782,0,0,1-2.629-4.1A43.52,43.52,0,0,1,9.713,2.637H35.287A43.53,43.53,0,0,1,31.306,20.7a20.8,20.8,0,0,1-2.629,4.1,1.3,1.3,0,0,0-.169.2A10.615,10.615,0,0,1,25.528,27.452ZM38.458,18.8a12.715,12.715,0,0,1-5.894,5.072q.572-.938,1.1-1.993a44.061,44.061,0,0,0,4.1-15.994h4.576A25.409,25.409,0,0,1,38.458,18.8Zm0,0"/></svg>
                @endif
							</div>
							<div class="features-box-content">
								<p class="title" data-aos="fade-up">{{$s->name}}</p>
								<h2 class="count" data-aos="fade-up">{{$s->number}}</h2>
							</div>
						</div>
          </div>
          @php $i++; @endphp
          @endforeach
					
				</div>
			</div>
		</section>
		<!-- End features-section -->   
		<!-- products-section -->
		<section id="products" class="bg-light">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6" data-aos="fade-up">
						<div class="section-title"> 
							<p>{{$data['products_st']->title}}</p>
							<h2 class="text-bold">{!! $data['products_st']->details !!}</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="owl-carousel owl-theme" id="owl-products"> 
              @foreach($data['products'] as $p)
							<a href="#!" class="products-box">
								<div class="products-box-pic">
									<img src="{{URL::to('/')}}/uploads/{{$p->photo}}" alt="card">
								</div>
								<div class="products-box-content">
									<h2 class="title">{{$p->title}}</h2>
									<p class="desc">{!! $p->details !!}</p> 
								</div>
              </a> 
              @endforeach
						
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End products-section --> 
		<!-- services-section -->
		<section id="services">
			<div class="container">
				<div class="row">
					<div class="col-lg-4" data-aos="fade-up">
						<div class="section-title text-left mt-5 pt-5"> 
							<p>الخدمات</p>
							<h2 class="text-bold mb-3">{{$data['service_t']->title}}</h2>
							<p>{!! $data['service_t']->details !!}</p>
						</div> 
					</div> 
					<div class="col-lg-8">
						<div class="row">
                @php $i=1; @endphp
                @foreach($data['service'] as $s)
  							<div class="col-sm-6">
								<div class="services-box @if($i==1)red @elseif($i==2) blue @else yellow @endif" data-aos="fade-up">
									<div class="icon">
                    @if($i==1)
										<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50"><path d="M306.977,346a.977.977,0,1,0,.977.977A.977.977,0,0,0,306.977,346Zm0,0" transform="translate(-276.117 -312.211)"/><path d="M45.117,0H4.883A4.888,4.888,0,0,0,0,4.883V34.766a4.888,4.888,0,0,0,4.883,4.883H20.117v4.492h-.977a4.884,4.884,0,0,0-4.883,4.883.976.976,0,0,0,.977.977H34.766a.976.976,0,0,0,.977-.977,4.888,4.888,0,0,0-4.883-4.883h-.977V39.648H45.117A4.888,4.888,0,0,0,50,34.766V4.883A4.888,4.888,0,0,0,45.117,0ZM4.883,1.953H45.117a2.933,2.933,0,0,1,2.93,2.93v25H43.555V7.422a.976.976,0,0,0-.977-.977H34.766a.976.976,0,0,0-.977.977V29.883H28.9c-.01-1.01-.037-2.006-.079-2.972a62.814,62.814,0,0,0-.763-7.813,4.883,4.883,0,0,0,1.333-6.369L26.008,6.866a.977.977,0,0,0-1.691,0L20.93,12.729A4.882,4.882,0,0,0,22,18.892a61.991,61.991,0,0,0-.823,8.018c-.044.976-.072,1.973-.082,2.974H16.211V15.234a.971.971,0,0,0-.1-.422s0-.01-.006-.015L12.2,6.985a.977.977,0,0,0-1.747,0L6.548,14.8l-.006.015a.971.971,0,0,0-.1.422V29.883H1.953v-25a2.933,2.933,0,0,1,2.93-2.93Zm30.859,27.93V8.4H41.6v1.953h-.977a.977.977,0,0,0,0,1.953H41.6v2.93h-.977a.977.977,0,0,0,0,1.953H41.6v2.93h-.977a.977.977,0,0,0,0,1.953H41.6v3.906h-.977a.977.977,0,0,0,0,1.953H41.6v1.953ZM25.162,20.05a4.89,4.89,0,0,0,1.054-.117c.181,1.162.447,3.217.605,6.044H23.186c.165-2.825.444-4.913.637-6.113a4.889,4.889,0,0,0,1.34.187Zm0-1.953a2.933,2.933,0,0,1-2.54-4.391l2.54-4.4L27.7,13.7A2.931,2.931,0,0,1,25.162,18.1ZM23.1,27.93h3.81c.021.642.035,1.294.042,1.953h-3.9c.007-.655.022-1.307.044-1.953ZM12.3,29.883V16.211h1.953V29.883Zm-3.906,0V16.211h1.953V29.883ZM9,14.258l2.326-4.652,2.326,4.652Zm24.62,33.789H16.377a2.935,2.935,0,0,1,2.763-1.953H30.859a2.934,2.934,0,0,1,2.762,1.953ZM27.93,44.141H22.07V39.648H27.93ZM45.117,37.7H4.883a2.933,2.933,0,0,1-2.93-2.93v-2.93H48.047v2.93A2.933,2.933,0,0,1,45.117,37.7Zm0,0"/><path d="M212.836,346h-5.859a.977.977,0,0,0,0,1.953h5.859a.977.977,0,0,0,0-1.953Zm0,0" transform="translate(-185.883 -312.211)"/></svg>
                   @elseif($i==2)
										<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50.184" viewBox="0 0 50 50.184"><g transform="translate(-0.879 0)"><g transform="translate(0.879 0)"><g transform="translate(0 0)"><path d="M45.026,12.555a5.949,5.949,0,0,0-1.8.277,10.687,10.687,0,0,0,.084-1.322A11.707,11.707,0,0,0,20.734,7.366a7.208,7.208,0,0,0-11.005,5.99,5.972,5.972,0,0,0-3-.8,5.853,5.853,0,1,0,0,11.707.836.836,0,1,0,0-1.672,4.181,4.181,0,1,1,3.6-6.425.836.836,0,0,0,1.475-.771,5.309,5.309,0,0,1-.4-2,5.5,5.5,0,0,1,5.544-5.435,5.585,5.585,0,0,1,3.667,1.391.836.836,0,0,0,1.355-.407,10.03,10.03,0,0,1,19.668,2.57,9.7,9.7,0,0,1-.364,2.592.836.836,0,0,0,1.285.909,4.287,4.287,0,0,1,2.472-.784,4.181,4.181,0,1,1,0,8.362.836.836,0,0,0,0,1.672,5.853,5.853,0,1,0,0-11.707Z" transform="translate(-0.879 0)"/></g></g><g transform="translate(9.153 31.788)"><g transform="translate(0)"><path d="M110.978,304.119H82.548a2.509,2.509,0,0,0-2.509,2.509v3.345a2.509,2.509,0,0,0,2.509,2.509h28.43a2.509,2.509,0,0,0,2.509-2.509v-3.345A2.509,2.509,0,0,0,110.978,304.119Zm.836,5.853a.836.836,0,0,1-.836.836H82.548a.836.836,0,0,1-.836-.836v-3.345a.836.836,0,0,1,.836-.836h28.43a.836.836,0,0,1,.836.836Z" transform="translate(-80.039 -304.119)"/></g></g><g transform="translate(36.162 34.348)"><path d="M340.049,328.615a1.621,1.621,0,1,0,1.631,1.61A1.62,1.62,0,0,0,340.049,328.615Zm.02,1.673c-.025,0-.042-.028-.042-.053l.042-.052Z" transform="translate(-338.439 -328.615)"/></g><g transform="translate(12.331 35.132)"><path d="M127.163,336.119H111.275a.836.836,0,0,0,0,1.672h15.888a.836.836,0,0,0,0-1.672Z" transform="translate(-110.439 -336.119)"/></g><g transform="translate(31.157 35.132)"><path d="M293.619,336.119H291.4a.836.836,0,1,0,0,1.672h2.224a.836.836,0,1,0,0-1.672Z" transform="translate(-290.559 -336.119)"/></g><g transform="translate(9.153 41.822)"><g transform="translate(0)"><path d="M110.978,400.119H82.548a2.509,2.509,0,0,0-2.509,2.509v3.345a2.509,2.509,0,0,0,2.509,2.509h28.43a2.509,2.509,0,0,0,2.509-2.509v-3.345A2.509,2.509,0,0,0,110.978,400.119Zm.836,5.853a.836.836,0,0,1-.836.836H82.548a.836.836,0,0,1-.836-.836v-3.345a.836.836,0,0,1,.836-.836h28.43a.836.836,0,0,1,.836.836Z" transform="translate(-80.039 -400.119)"/></g></g><g transform="translate(36.162 44.382)"><path d="M340.049,424.615a1.621,1.621,0,1,0,1.631,1.61A1.62,1.62,0,0,0,340.049,424.615Zm.02,1.673c-.025,0-.042-.028-.042-.053l.042-.052Z" transform="translate(-338.439 -424.615)"/></g><g transform="translate(12.331 45.167)"><path d="M127.163,432.119H111.275a.836.836,0,0,0,0,1.672h15.888a.836.836,0,0,0,0-1.672Z" transform="translate(-110.439 -432.119)"/></g><g transform="translate(31.157 45.167)"><path d="M293.619,432.119H291.4a.836.836,0,1,0,0,1.672h2.224a.836.836,0,1,0,0-1.672Z" transform="translate(-290.559 -432.119)"/></g><g transform="translate(9.153 21.753)"><g transform="translate(0)"><path d="M110.978,208.119H82.548a2.509,2.509,0,0,0-2.509,2.509v3.345a2.509,2.509,0,0,0,2.509,2.509h28.43a2.509,2.509,0,0,0,2.509-2.509v-3.345A2.509,2.509,0,0,0,110.978,208.119Zm.836,5.853a.836.836,0,0,1-.836.836H82.548a.836.836,0,0,1-.836-.836v-3.345a.836.836,0,0,1,.836-.836h28.43a.836.836,0,0,1,.836.836Z" transform="translate(-80.039 -208.119)"/></g></g><g transform="translate(35.903 24.363)"><path d="M339.2,234.427a1.635,1.635,0,0,0-2.943-.653,1.6,1.6,0,0,0-.269,1.208,1.636,1.636,0,0,0,1.609,1.345,1.678,1.678,0,0,0,.273-.023,1.615,1.615,0,0,0,1.061-.669A1.594,1.594,0,0,0,339.2,234.427Zm-1.646.294.038-.066,0,.1C337.561,234.76,337.558,234.739,337.557,234.722Z" transform="translate(-335.965 -233.084)"/></g><g transform="translate(12.163 25.098)"><path d="M125.563,240.119H109.675a.836.836,0,0,0,0,1.672h15.888a.836.836,0,0,0,0-1.672Z" transform="translate(-108.839 -240.119)"/></g><g transform="translate(30.623 25.098)"><path d="M288.507,240.119h-2.224a.836.836,0,0,0,0,1.672h2.224a.836.836,0,0,0,0-1.672Z" transform="translate(-285.447 -240.119)"/></g><g transform="translate(15.853 10.883)"><g transform="translate(0)"><path d="M150.572,106.874l-2.509-2.509a.836.836,0,0,0-1.182,0l-2.509,2.509a.836.836,0,0,0,1.182,1.182l1.081-1.081v5.507a.836.836,0,0,0,1.672,0v-5.507l1.081,1.081a.836.836,0,0,0,1.182-1.182Z" transform="translate(-144.138 -104.121)"/></g></g><g transform="translate(29.232 10.883)"><path d="M278.551,109.381a.836.836,0,0,0-1.162,0l-1.081,1.081v-5.507a.836.836,0,0,0-1.672,0v5.507l-1.081-1.081a.836.836,0,0,0-1.182,1.182l2.509,2.509a.836.836,0,0,0,1.182,0l2.509-2.509A.836.836,0,0,0,278.551,109.381Z" transform="translate(-272.138 -104.119)"/></g></g></svg>
                   @else 
                   <svg xmlns="http://www.w3.org/2000/svg" width="50" height="39.37" viewBox="0 0 50 39.37"><g transform="translate(0 -54)"><path d="M26.181,88.449a.984.984,0,0,0,.984.984H45.079a.984.984,0,0,0,.984-.984V80.575a.984.984,0,0,0-.984-.984H27.165a.984.984,0,0,0-.984.984Zm1.969-6.89H44.094v5.906H28.15Zm-.984-3.937H45.079a.984.984,0,0,0,.984-.984V66.8a.984.984,0,0,0-.984-.984H27.165a.984.984,0,0,0-.984.984v9.843A.984.984,0,0,0,27.165,77.622Zm.984-9.843H44.094v7.874H28.15ZM4.232,80.575a.984.984,0,0,1,.984-.984H10.63a.984.984,0,1,1,0,1.968H5.216A.984.984,0,0,1,4.232,80.575ZM19.98,84.512A.984.984,0,0,1,19,85.5H7.972a.984.984,0,0,1,0-1.969H19A.984.984,0,0,1,19.98,84.512Zm-5.61,3.937a.984.984,0,0,1-.984.984H5.216a.984.984,0,0,1,0-1.969h8.169A.984.984,0,0,1,14.37,88.449ZM9.822,74.8l2.74-6.89a.984.984,0,1,1,1.829.728l-2.74,6.89A.984.984,0,1,1,9.822,74.8Zm6.741-.46,1.549-2.674-1.54-2.554a.984.984,0,0,1,1.686-1.016l1.84,3.052a.984.984,0,0,1,.009,1l-1.84,3.177a.984.984,0,1,1-1.7-.987ZM4.115,71.146l1.84-3.052A.984.984,0,0,1,7.641,69.11L6.1,71.664,7.65,74.338a.984.984,0,1,1-1.7.987l-1.84-3.177A.985.985,0,0,1,4.115,71.146ZM5.905,58.921a.984.984,0,1,1-.984-.984A.984.984,0,0,1,5.905,58.921Zm4.429,0a.984.984,0,1,1-.984-.984A.984.984,0,0,1,10.335,58.921Zm4.429,0a.984.984,0,1,1-.984-.984A.984.984,0,0,1,14.764,58.921ZM31.658,93.37a1.008,1.008,0,0,0,1.017-.916.986.986,0,0,0-.982-1.052h-7.48V63.843H48.031V91.4H40.586a1.008,1.008,0,0,0-1.017.916.986.986,0,0,0,.982,1.053h8.465A.984.984,0,0,0,50,92.386V56.953A2.953,2.953,0,0,0,47.047,54H2.953A2.953,2.953,0,0,0,0,56.953V92.386a.984.984,0,0,0,.984.984ZM1.968,56.953a.985.985,0,0,1,.984-.984H47.047a.985.985,0,0,1,.984.984v4.921H1.968ZM22.244,91.4H1.968V63.843H22.244Zm14.862.984a.984.984,0,1,1-.984-.984A.986.986,0,0,1,37.106,92.386Z"/></g></svg>
                  @endif
                  </div>
									<div class="content">
										<h3>{{$s->title}}</h3>
										<p>{!! $s->details !!}</p>
									</div>
                </div> 
                @php $i++; @endphp
                </div> 
                @endforeach
							
              @if(false)
							<div class="col-sm-6">
								<div class="services-box blue" data-aos="fade-up">
									<div class="icon">
									</div>
									<div class="content">
										<h3>برمجة مواقع الويب</h3>
										<p>نقدم خدمات التصميم الخاصة بتصميم مواقع الويب و تطبيقات الموبايل، نقدم خدمات التصميم الخاصة بتصميم مواقع الويب و تطبيقات الموبايل</p>
									</div>
								</div>
								
								<div class="services-box yellow" data-aos="fade-up">
									<div class="icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50.184" viewBox="0 0 50 50.184"><g transform="translate(-0.879 0)"><g transform="translate(0.879 0)"><g transform="translate(0 0)"><path d="M45.026,12.555a5.949,5.949,0,0,0-1.8.277,10.687,10.687,0,0,0,.084-1.322A11.707,11.707,0,0,0,20.734,7.366a7.208,7.208,0,0,0-11.005,5.99,5.972,5.972,0,0,0-3-.8,5.853,5.853,0,1,0,0,11.707.836.836,0,1,0,0-1.672,4.181,4.181,0,1,1,3.6-6.425.836.836,0,0,0,1.475-.771,5.309,5.309,0,0,1-.4-2,5.5,5.5,0,0,1,5.544-5.435,5.585,5.585,0,0,1,3.667,1.391.836.836,0,0,0,1.355-.407,10.03,10.03,0,0,1,19.668,2.57,9.7,9.7,0,0,1-.364,2.592.836.836,0,0,0,1.285.909,4.287,4.287,0,0,1,2.472-.784,4.181,4.181,0,1,1,0,8.362.836.836,0,0,0,0,1.672,5.853,5.853,0,1,0,0-11.707Z" transform="translate(-0.879 0)"/></g></g><g transform="translate(9.153 31.788)"><g transform="translate(0)"><path d="M110.978,304.119H82.548a2.509,2.509,0,0,0-2.509,2.509v3.345a2.509,2.509,0,0,0,2.509,2.509h28.43a2.509,2.509,0,0,0,2.509-2.509v-3.345A2.509,2.509,0,0,0,110.978,304.119Zm.836,5.853a.836.836,0,0,1-.836.836H82.548a.836.836,0,0,1-.836-.836v-3.345a.836.836,0,0,1,.836-.836h28.43a.836.836,0,0,1,.836.836Z" transform="translate(-80.039 -304.119)"/></g></g><g transform="translate(36.162 34.348)"><path d="M340.049,328.615a1.621,1.621,0,1,0,1.631,1.61A1.62,1.62,0,0,0,340.049,328.615Zm.02,1.673c-.025,0-.042-.028-.042-.053l.042-.052Z" transform="translate(-338.439 -328.615)"/></g><g transform="translate(12.331 35.132)"><path d="M127.163,336.119H111.275a.836.836,0,0,0,0,1.672h15.888a.836.836,0,0,0,0-1.672Z" transform="translate(-110.439 -336.119)"/></g><g transform="translate(31.157 35.132)"><path d="M293.619,336.119H291.4a.836.836,0,1,0,0,1.672h2.224a.836.836,0,1,0,0-1.672Z" transform="translate(-290.559 -336.119)"/></g><g transform="translate(9.153 41.822)"><g transform="translate(0)"><path d="M110.978,400.119H82.548a2.509,2.509,0,0,0-2.509,2.509v3.345a2.509,2.509,0,0,0,2.509,2.509h28.43a2.509,2.509,0,0,0,2.509-2.509v-3.345A2.509,2.509,0,0,0,110.978,400.119Zm.836,5.853a.836.836,0,0,1-.836.836H82.548a.836.836,0,0,1-.836-.836v-3.345a.836.836,0,0,1,.836-.836h28.43a.836.836,0,0,1,.836.836Z" transform="translate(-80.039 -400.119)"/></g></g><g transform="translate(36.162 44.382)"><path d="M340.049,424.615a1.621,1.621,0,1,0,1.631,1.61A1.62,1.62,0,0,0,340.049,424.615Zm.02,1.673c-.025,0-.042-.028-.042-.053l.042-.052Z" transform="translate(-338.439 -424.615)"/></g><g transform="translate(12.331 45.167)"><path d="M127.163,432.119H111.275a.836.836,0,0,0,0,1.672h15.888a.836.836,0,0,0,0-1.672Z" transform="translate(-110.439 -432.119)"/></g><g transform="translate(31.157 45.167)"><path d="M293.619,432.119H291.4a.836.836,0,1,0,0,1.672h2.224a.836.836,0,1,0,0-1.672Z" transform="translate(-290.559 -432.119)"/></g><g transform="translate(9.153 21.753)"><g transform="translate(0)"><path d="M110.978,208.119H82.548a2.509,2.509,0,0,0-2.509,2.509v3.345a2.509,2.509,0,0,0,2.509,2.509h28.43a2.509,2.509,0,0,0,2.509-2.509v-3.345A2.509,2.509,0,0,0,110.978,208.119Zm.836,5.853a.836.836,0,0,1-.836.836H82.548a.836.836,0,0,1-.836-.836v-3.345a.836.836,0,0,1,.836-.836h28.43a.836.836,0,0,1,.836.836Z" transform="translate(-80.039 -208.119)"/></g></g><g transform="translate(35.903 24.363)"><path d="M339.2,234.427a1.635,1.635,0,0,0-2.943-.653,1.6,1.6,0,0,0-.269,1.208,1.636,1.636,0,0,0,1.609,1.345,1.678,1.678,0,0,0,.273-.023,1.615,1.615,0,0,0,1.061-.669A1.594,1.594,0,0,0,339.2,234.427Zm-1.646.294.038-.066,0,.1C337.561,234.76,337.558,234.739,337.557,234.722Z" transform="translate(-335.965 -233.084)"/></g><g transform="translate(12.163 25.098)"><path d="M125.563,240.119H109.675a.836.836,0,0,0,0,1.672h15.888a.836.836,0,0,0,0-1.672Z" transform="translate(-108.839 -240.119)"/></g><g transform="translate(30.623 25.098)"><path d="M288.507,240.119h-2.224a.836.836,0,0,0,0,1.672h2.224a.836.836,0,0,0,0-1.672Z" transform="translate(-285.447 -240.119)"/></g><g transform="translate(15.853 10.883)"><g transform="translate(0)"><path d="M150.572,106.874l-2.509-2.509a.836.836,0,0,0-1.182,0l-2.509,2.509a.836.836,0,0,0,1.182,1.182l1.081-1.081v5.507a.836.836,0,0,0,1.672,0v-5.507l1.081,1.081a.836.836,0,0,0,1.182-1.182Z" transform="translate(-144.138 -104.121)"/></g></g><g transform="translate(29.232 10.883)"><path d="M278.551,109.381a.836.836,0,0,0-1.162,0l-1.081,1.081v-5.507a.836.836,0,0,0-1.672,0v5.507l-1.081-1.081a.836.836,0,0,0-1.182,1.182l2.509,2.509a.836.836,0,0,0,1.182,0l2.509-2.509A.836.836,0,0,0,278.551,109.381Z" transform="translate(-272.138 -104.119)"/></g></g></svg>
									</div>
									<div class="content">
										<h3>استضافة</h3>
										<p>نقدم خدمات التصميم الخاصة بتصميم مواقع الويب و تطبيقات الموبايل، نقدم خدمات التصميم الخاصة بتصميم مواقع الويب و تطبيقات الموبايل</p>
									</div>
								</div>
              </div>
              @endif
						</div>
					</div> 
				</div>
			</div>
		</section>
		<!-- End services-section -->
		<!-- portfolio-section -->
		<section id="portfolio" class="bg-light">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-12" data-aos="fade-up">
						<div class="section-title text-left"> 
							<p>{{$data['business']->title}}</p>
							<h2 class="text-bold">{!! $data['business']->details !!}</h2>
						</div>
					</div>
				</div>  

				<div class="row">
					<div class="col-lg-12">
						<div class="owl-carousel owl-theme" id="owl-portfolio"> 
              @foreach($data['category'] as $c)
							<a  href="@if($c->url) {{$c->url}} @else echo #!  @endif" @if($c->url)  target="_blank" @endif class="portfolio-box"> 
								<img src="{{URL::to('/')}}/uploads/{{$c->photo}}" alt="Card">  
								<h2 class="title">{{$c->title}}</h2>  
              </a> 
              @endforeach
							
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End portfolio-section --> 
		<!-- partner-section" -->
		<section id="partners">
			<div class="container"> 
				<div class="row justify-content-center">
					<div class="col-lg-6" data-aos="fade-up">
						<div class="section-title"> 
							<h2 class="text-bold">{{$data['clients']->title}}</h2> 
						</div>
					</div>
				</div> 
				<div class="row">
					<div class="col-lg-12"> 
						<div class="owl-carousel owl-theme" id="owl-partners" data-aos="fade-up">
              @foreach( $data['our_clients'] as $ci)
							<a href="@if($ci->url) {{$ci->url}} @else echo #!  @endif" @if($ci->url)  target="_blank" @endif class="partner-box">
								<img src="{{URL::to('/')}}/uploads/{{$ci->image}}" alt="{{$ci->title}}">
              </a>
              @endforeach
						</div> 
					</div> 
				</div> 
			</div>
		</section>
		<!-- End partner-section --> 
		<!-- partner-section" -->
		<section class="new-project" >
			<div class="container">  
				<div class="row">
					<div class="col-lg-12"> 
						<div class="new-project-box">
							<div class="content">
								<h2 class="title" data-aos="fade-up">{{$data['project']->title}}</h2>
								<p class="desc" data-aos="fade-up">{!! $data['project']->details ?? '' !!}</p>
								<a href="#subscribe" data-aos="fade-up" class="btn btn-scroll"> تواصل معنا </a>
							</div>
							<img src="{{URL::to('/')}}/site/assets/img/comp.png" alt="comp" data-aos="fade-up">
						</div>
					</div> 
				</div> 
			</div>
		</section>
		<!-- End partner-section --> 
		<!-- subscribe-section" -->
		<section id="subscribe">
			<div class="container"> 
				<div class="row">
					<div class="col-lg-6" data-aos="fade-up">
						<div class="section-title text-left"> 
							<h2 class="text-bold">{!! $data['request_projects']->details ?? '' !!}</h2> 
						</div>
					</div>
				</div> 
				<div class="row">
					<div class="col-lg-12">
						<form class="form contact-form" id="form_contact" method="post" > 
                @csrf
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group " data-aos="fade-up">  
										<label>الاسم بالكامل</label>
										<input type="text" name="name" class="form-control name" placeholder="الاسم بالكامل" required>
										<div class="invalid-feedback"> مطلوب </div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group " data-aos="fade-up">  
										<label>البريد الالكتروني</label>
										<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control email" placeholder="example@mail.com" required>
										<div class="invalid-feedback"> مطلوب </div>
									</div>
								</div>
							</div> 
							
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group " data-aos="fade-up">  
										<label>ميزانية المشروع</label>
										<div class="form-row">
											<div class="col-3">
												<select name="currency" class="form-control currency" required>
                          <option disabled value="" selected> العملة</option>
                          @foreach($data['currency'] as $cu)
                          <option value="{{$cu->id}}">{{$cu->name}}</option>
                          @endforeach
												</select>
												<div class="invalid-feedback"> مطلوب </div>
											</div>
											<div class="col-9">
												<input type="text" name="amount" class="form-control amount" placeholder="ميزانية المشروع" required> 
												<div class="invalid-feedback"> مطلوب </div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group " data-aos="fade-up">  
										<label>اسم المشروع</label>
										<input type="text" name="name_project" class="form-control name_project" placeholder="اسم المشروع" required>
										<div class="invalid-feedback"> مطلوب </div>
									</div>
								</div>
							</div>
							<div class="form-group " data-aos="fade-up">  
								<label>تفاصيل المشروع</label>
								<textarea  name="details" rows="8" class="form-control details" placeholder="الرجاء كتابة نبذة صغيرة عن المشروع الخاص بك ... " required></textarea>
							</div>
							<div class="form-group " data-aos="fade-up"> 
								<button type="submit" name="submit" id="submit" class="btn btn-primary px-5 btn-ripple"> اشتراك </button>
							</div> 
						</form>
					</div> 
				</div> 
			</div>
		</section>
		<!-- End subscribe-section -->
@endsection
@section('js')
<script>
  // {{-- add_participation --}}
$('#form_contact').on('submit', function(e){
  e.preventDefault();
  var formData = new FormData(this);
      
    $.ajax({
        url: "{{URL::to('/')}}/project_request",
        type: "post",
        cache:false,
        contentType: false,
        processData: false,
        data: formData,
        success: function (data) {
            toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            if (data["status"] == true) {

              $('.contact-form .name').val('');
              $('.contact-form .email').val('');
              $('.contact-form .mobile').val('');
              $('.contact-form .details').val('');
              $('.contact-form .currency').val('');
              $('.contact-form .name_project').val('');
              $('.contact-form .amount').val('');

              toastr["success"](data["data"])
            } else {
                toastr["error"](data["data"])
            }
        }
    });

});

</script>
@endsection