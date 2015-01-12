<!-- Based upon http://getbootstrap.com/examples/sticky-footer-navbar/ -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/book_flat.ico">

    <title>Biblioctet @section('title') @show</title>

    <!-- Bootstrap core CSS -->
	<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" /> -->
	{{ HTML::style('css/bootstrap.min.css') }}

  <!-- Custom styles for this template -->
  <!-- <link href="css/main.css" rel="stylesheet" /> -->
  <!-- <link href="css/footer.css" rel="stylesheet" /> -->
  {{ HTML::style('css/main.css') }}
  {{ HTML::style('css/footer.css') }}

	@section('addStyle') @show

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    {{-- This -the ''; part- is a bit of a "hack", as it prevents echoing the variable on the page but still assigns the default value as needed /in a blade template/. --}}
    @if (Auth::check())
      {{''; $username = Auth::user()->username;}}
    @else
      {{''; $username = 'NoName'}}
    @endif
    @if (!Session::has('categoriesArray'))
      {{ App::make('LibraryController')->doCategoriesArray()}}
      {{''; $categoriesArray = Session::get('categoriesArray') }}
    @else
      {{''; $categoriesArray = Session::get('categoriesArray') }}
    @endif

    {{ Navbar::create(NAVBAR::NAVBAR_TOP)
            ->withBrand('Biblioctet')
            ->withContent(
              Image::circle(
                '/book_flat_32x32.png', 
                'Logo'
              )
              // ->responsive()
            )
            ->withContent(
              Navigation::pills(
                array(
                  array(
                    'title' =>  'Accueil',
                    'link'  =>  URL::route('home')
                  ),
                )
              )
            )
            ->withContent(
              Navigation::pills(
                array(
                  array(
                    'Catégories',
                    $categoriesArray
                  ),
                )
              )
            )
            // ->withContent(
            //     '<form class="navbar-form navbar-left" role="search">
            //       <div class="form-group">
            //         <input type="text" class="form-control" placeholder="Search">
            //       </div>
            //       <button type="submit" class="btn btn-default">Submit</button>
            //     </form>'
            // )
            ->withContent(
              Navigation::pills(
                array(
                  array(
                    'title' =>  $username,
                    'link'  =>  '#',
                    false,
                    true,
                    null,
                    'callback'  =>  function()
                    {
                      return Auth::check();
                    }
                  ),
                  array(
                    'title' =>  'Créer un compte',
                    'link'  =>  'register',
                    false,
                    true,
                    null,
                    'callback'  =>  function()
                    {
                      return !Auth::check();
                    }
                  ),
                  array(
                    'title' =>  'Connexion',
                    'link'  =>  URL::route('login'), 
                    false, 
                    false, 
                    null, 
                    'callback' => function()
                    {
                      return !Auth::check();
                    }
                  ),
                  array(
                    'title' =>  'Déconnexion',
                    'link'  =>  URL::route('logout'), 
                    false, 
                    false, 
                    null, 
                    'callback' => function()
                    {
                      return Auth::check();
                    }
                  ),
                  Navigation::NAVIGATION_DIVIDER,
                  array(
                    'title' =>  'À propos',
                    'link'  =>  URL::route('about')
                  ),
                )
              )
              ->right()
            );
    }}
  {{-- @endif --}}

    @section('addContent')

    @show

    <footer class="footer">
      <div class="container">
        <p class="text-muted">© Biblioctet 2014</p>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
	  {{ HTML::script('js/jquery-1.11.2.min.js') }}
    <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script> -->
	  <!-- <script src="js/bootstrap.min.js"></script> -->
    {{ HTML::script('js/bootstrap.min.js') }}

	  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <script src="js/ie10-viewport-bug-workaround.js"></script> -->
    {{ HTML::script('js/ie10-viewport-bug-workaround.js') }}
  </body>
</html>
