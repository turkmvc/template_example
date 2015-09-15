@inject('settings', 'Whole\Core\Injections\SettingsInjection')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{!! (isset($title) && $title!="")?$title." - ":'' !!}{!! $settings->get()->title !!}</title>
    <meta name="keywords" content="{!! (isset($keywords) && $keywords!='')?$keywords:$settings->get()->meta_keywords !!}">
    <meta name="description" content="{!! (isset($description) && $description!='')?$description:$settings->get()->meta_description !!}">
    @if($settings->get()->favicon!="")
    <link rel="shortcut icon" href="{{ $settings->get()->favicon }}" type="image/x-icon">
    <link rel="icon" href="{{ $settings->get()->favicon }}" type="image/x-icon">
    @endif

    {!! Html::style('assets/template_example/css/bootstrap.min.css') !!}
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    {!! Html::style('assets/template_example/css/custom.css') !!}
</head>
<body>
  <div class="container-fluid">
    <div class="row header">
        <div class="col-md-3 logo">
          <a href="{{ route('master_page') }}">
              <img  alt="{{ $settings->get()->logo_title }}" src="{!! $settings->get()->logo !!}" />
          </a>
            <div class="mobile-nav"><a href="#"> <i class="glyphicon glyphicon-align-justify"></i> </a></div>
        </div><!-- .col-md-3 -->
        <div class="col-md-9" style="padding: 0; margin: 0;">
		<div class="navigasyon-bar">
		@yield('header_right')
		</div>
		<div class="navigasyon">
		@yield('navigation')
		</div>
        </div><!-- .col-md-9 -->
    </div><!-- .header  .row -->

  </div><!-- ####end##### -->
  @yield('content_top')

  <div class="container">
          <div class="row">
            @unless(in_array('content_left',$hidden_fields))
            <div class="col-md-4" id="sidebar">
              @yield('content_left')
            </div>
            @endunless

            @unless(in_array('content_main',$hidden_fields))
              <div class="@if(in_array('content_left',$hidden_fields) &&
              in_array('content_right',$hidden_fields)){{ 'col-md-12 col-lg-12'
              }}@elseif(in_array('content_left',$hidden_fields) ||
              in_array('content_right',$hidden_fields)){{ 'col-lg-8 col-md-8'
            }}@else{{ 'col-lg-5 col-md-5' }}@endif">
                @yield('content_main')
              </div>
            @endunless

              @unless(in_array('content_right',$hidden_fields))
              <div class="col-md-4" id="sidebar">
                @yield('content_right')
              </div>
              @endunless
            </div>
          </div>
@yield('content_bottom')
              <div id="footer" class="row">
                  <div class="container">
                      <div class="row">
                        <div class="col-xs-6 copyright-text text-left">{!! $settings->get()->copyright !!}</div>
                        <div class="col-xs-6 copyright-text text-right">Bu Bir <a href="http://swbilisim.com" target="_blank">SW Bilişim</a> Ürünüdür.</div>
                          <!--row-->
                      </div>
                      <!--container-->
                  </div>
              </div>




              </div><!-- .container -->

              <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
              <!-- Include all compiled plugins (below), or include individual files as needed -->
              {!! Html::script('assets/template_example/js/bootstrap.min.js') !!}
              {!! Html::script('assets/template_example/js/custom.js') !!}
              </body>
              </html>

</body>
</html>
