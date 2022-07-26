<?php

class HomeController
{
    public function index()
    {
        Flight::render('home.php');
    }

    public function getListMovie()
    {

        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', 'https://pastebin.com/raw/cVyp3McN');
        $listMovies = json_decode($res->getBody());
        $possibleMovies = [];
        $inputTime = Flight::request()->data->time;
        $inputGenre = Flight::request()->data->genre;
        foreach ($listMovies as $movie) {
            $genres = $movie->genres;
            $showingTimes = $movie->showings;
            $matchedShowingTime = null;
            foreach ($showingTimes as $showingTime) {
                $showingTimeArr = explode('+', $showingTime);
                $time = $showingTimeArr[0];
                $timeZone = $showingTimeArr[1];
                if (strtotime($time) > strtotime($inputTime)) {
                    if (!$matchedShowingTime || strtotime($matchedShowingTime) > strtotime($time)) {
                        $matchedShowingTime = $time;
                    }
                }
            }
            if (in_array($inputGenre, $genres) && $matchedShowingTime) {
                $movie->matchedShowingTime = $matchedShowingTime;
                $possibleMovies[] = $movie;
            }
        }
        usort($possibleMovies, function ($a, $b) {
            return $b->rating - $a->rating;
        });
        Flight::render('home.php', compact('inputTime', 'inputGenre', 'possibleMovies'));
    }
}
