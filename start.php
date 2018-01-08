<?php
   if(!empty($_GET['movie'])){
        $movie_url = 'http://www.omdbapi.com/?i=tt3896198&apikey=bf31b54b&t=' . urlencode($_GET['movie']);
        $movie_json = file_get_contents($movie_url);
	$movie_array = json_decode($movie_json, true);
    }
    if($movie_array['Response']=='False')
    {
        $movie_array['Title']='Sorry no match! Try again';
        $movie_array['imdbRating']='N/A';
        $movie_array['Year']='N/A';
        $movie_array['Genre']='N/A';
        $movie_array['Production']='N/A';
        $movie_array['Plot']='N/A';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Know movie</title>

        <link rel="stylesheet" href="css/style.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/style.js"></script>
    </head>
    <body>
        <div class="jumbotron text-center">
            <h1>KnowMovies.git</h1>
            <form class="form-inline" action="" method="get">
                <div class="input-group ">
                    <input type="search" class="form-control search input-lg" size="52" name="movie"  placeholder="Search your movie!" required>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-success btn-lg">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="container-fluid text-center"><h1><b> <?php echo $movie_array['Title'] ?></b></h1> </div>
    <div class="container section">
        <div class="col-sm-4"><img class="image" src="<?php echo 'http://img.omdbapi.com/?i=' . $movie_array['imdbID'].'&apikey=bf31b54b&t=' . $movie_array['Title'] ?>" /></div>
        <div class="col-sm-8">
            <h4> Rating:        </h4> <p><?Php echo $movie_array['imdbRating'] ?></p>              </br>
            <h4> Released year: </h4> <p><?Php echo $movie_array['Year'] ?></p>                    </br>
            <h4> Genre:         </h4> <p><?Php echo $movie_array['Genre'] ?></p>                   </br>
            <h4> Production:    </h4> <p><?Php echo $movie_array['Production'] ?></p>              </br>
            <button type="button" class="btn btn-default" id="ViewMe" onclick="document.getElementById('more').removeAttribute('class');" name="ViewMore"> View more +</button>
            <div class="hidden" id="more">
            <h4> Plot:          </h4> <p><?Php echo $movie_array['Plot'] ?></p>                    </br>
            </div>
        </div>
	 </div>
    </body>
</html>
