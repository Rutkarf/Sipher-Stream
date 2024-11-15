<?php
namespace App\Models;

class FilmModel {
    private $id;
    private $title;
    private $originalTitle;
    private $posterPath;
    private $backdropPath;
    private $overview;
    private $releaseDate;
    private $originalLanguage;
    private $adult;
    private $genreIds = [];
    private $popularity;
    private $voteCount;
    private $voteAverage;
    private $video;

    // Getters
    public function getId(): int { return $this->id; }
    public function getTitle(): string { return $this->title; }
    public function getOriginalTitle(): string { return $this->originalTitle; }
    public function getPosterPath(): ?string { return $this->posterPath; }
    public function getBackdropPath(): ?string { return $this->backdropPath; }
    public function getOverview(): string { return $this->overview; }
    public function getReleaseDate(): string { return $this->releaseDate; }
    public function getOriginalLanguage(): string { return $this->originalLanguage; }
    public function isAdult(): bool { return $this->adult; }
    public function getGenreIds(): array { return $this->genreIds; }
    public function getPopularity(): float { return $this->popularity; }
    public function getVoteCount(): int { return $this->voteCount; }
    public function getVoteAverage(): float { return $this->voteAverage; }
    public function isVideo(): bool { return $this->video; }

    // Setters
    public function setId(int $id): void { $this->id = $id; }
    public function setTitle(string $title): void { $this->title = $title; }
    public function setOriginalTitle(string $originalTitle): void { $this->originalTitle = $originalTitle; }
    public function setPosterPath(?string $posterPath): void { $this->posterPath = $posterPath; }
    public function setBackdropPath(?string $backdropPath): void { $this->backdropPath = $backdropPath; }
    public function setOverview(string $overview): void { $this->overview = $overview; }
    public function setReleaseDate(string $releaseDate): void { $this->releaseDate = $releaseDate; }
    public function setOriginalLanguage(string $originalLanguage): void { $this->originalLanguage = $originalLanguage; }
    public function setAdult(bool $adult): void { $this->adult = $adult; }
    public function setGenreIds(array $genreIds): void { $this->genreIds = $genreIds; }
    public function setPopularity(float $popularity): void { $this->popularity = $popularity; }
    public function setVoteCount(int $voteCount): void { $this->voteCount = $voteCount; }
    public function setVoteAverage(float $voteAverage): void { $this->voteAverage = $voteAverage; }
    public function setVideo(bool $video): void { $this->video = $video; }

    public static function getPopularMovies(): array
    {
        $apiKey = '454b45a1be533c307cf83a5462a0e3e9';
        $url = "https://api.themoviedb.org/3/movie/popular?api_key={$apiKey}&language=fr-FR";
        
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        
        $movies = [];
        foreach ($data['results'] as $movieData) {
            $movie = new self();
            $movie->setId($movieData['id']);
            $movie->setTitle($movieData['title']);
            $movie->setOriginalTitle($movieData['original_title']);
            $movie->setPosterPath($movieData['poster_path']);
            $movie->setBackdropPath($movieData['backdrop_path']);
            $movie->setOverview($movieData['overview']);
            $movie->setReleaseDate($movieData['release_date']);
            $movie->setOriginalLanguage($movieData['original_language']);
            $movie->setAdult($movieData['adult']);
            $movie->setGenreIds($movieData['genre_ids']);
            $movie->setPopularity($movieData['popularity']);
            $movie->setVoteCount($movieData['vote_count']);
            $movie->setVoteAverage($movieData['vote_average']);
            $movie->setVideo($movieData['video']);
            
            $movies[] = $movie;
        }
        
        return $movies;
    }
}
