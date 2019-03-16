<?php

namespace App;

use Config;
use GuzzleHttp\Client;

class Movies
{
    private $Client;
    private $api_host;
    private $api_key;

    public function __construct()
    {
        $this->Client = new Client(['http_errors' => false]);
        $this->api_host = "https://api.themoviedb.org/3/";
        $this->api_key = config('moviedb.api_key');
    }


	/**
	 * Make a call to The MovieDB API to get the genres.
	 *
	 * @return JSON
	 */
	public function getGenres()
	{
		$response = $this->Client->request('GET', $this->api_host . "genre/movie/list?api_key=" . $this->api_key);
        $responseBody = $response->getBody()->getContents();
		$result = json_decode($responseBody, true);

        if ($response->getStatusCode() != 200) {
          echo $response->getReasonPhrase();
        } else {
          return $result;
        }
	}


    /**
	 * Make a call to The MovieDB API to get the movies belonging to a genre.
	 *
	 * @return JSON
	 */
	public function getMovies($genres, $page)
	{
          $response = $this->Client->request('GET', $this->api_host . "discover/movie?api_key=" . $this->api_key . "&with_genres=" . $genres . "&page=" . $page);
          $responseBody = $response->getBody()->getContents();
          $result = json_decode($responseBody, true);

          if ($response->getStatusCode() != 200) {
            echo $response->getReasonPhrase();
          } else {
            return $result;
          }
	}


    /**
     * Make a call to The MovieDB API to get the details of a movie from its ID.
     *
     * @return JSON
     */
    public function getDetails($movieID)
    {
          $response = $this->Client->request('GET', $this->api_host . "movie/" . $movieID . "?api_key=" . $this->api_key);
          $responseBody = $response->getBody()->getContents();
          $result = json_decode($responseBody, true);

          if ($response->getStatusCode() != 200) {
            echo $response->getReasonPhrase();
          } else {
            return $result;
          }
    }


    /**
     * Make a call to The MovieDB API to get a list of movies from a query term.
     *
     * @return JSON
     */
    public function search($term, $page)
    {
          $response = $this->Client->request('GET', $this->api_host . "search/movie?api_key=" . $this->api_key . "&query=" . $term . "&page=" . $page);
          $responseBody = $response->getBody()->getContents();
          $result = json_decode($responseBody, true);

          if ($response->getStatusCode() != 200) {
            echo $response->getReasonPhrase();
          } else {
            return $result;
          }
    }




}
