<?php
namespace App\Models;

class SerieModel {
    private $id;
    private $name;
    private $originalName;
    private $posterPath;
    private $backdropPath;
    private $overview;
    private $firstAirDate;
    private $originalLanguage;
    private $genreIds = [];
    private $popularity;
    private $voteCount;
    private $voteAverage;
    private $originCountry = [];

    // Getters
    public function getId(): int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getOriginalName(): string { return $this->originalName; }
    public function getPosterPath(): ?string { return $this->posterPath; }
    public function getBackdropPath(): ?string { return $this->backdropPath; }
    public function getOverview(): string { return $this->overview; }
    public function getFirstAirDate(): string { return $this->firstAirDate; }
    public function getOriginalLanguage(): string { return $this->originalLanguage; }
    public function getGenreIds(): array { return $this->genreIds; }
    public function getPopularity(): float { return $this->popularity; }
    public function getVoteCount(): int { return $this->voteCount; }
    public function getVoteAverage(): float { return $this->voteAverage; }
    public function getOriginCountry(): array { return $this->originCountry; }

    // Setters
    public function setId(int $id): void { $this->id = $id; }
    public function setName(string $name): void { $this->name = $name; }
    public function setOriginalName(string $originalName): void { $this->originalName = $originalName; }
    public function setPosterPath(?string $posterPath): void { $this->posterPath = $posterPath; }
    public function setBackdropPath(?string $backdropPath): void { $this->backdropPath = $backdropPath; }
    public function setOverview(string $overview): void { $this->overview = $overview; }
    public function setFirstAirDate(string $firstAirDate): void { $this->firstAirDate = $firstAirDate; }
    public function setOriginalLanguage(string $originalLanguage): void { $this->originalLanguage = $originalLanguage; }
    public function setGenreIds(array $genreIds): void { $this->genreIds = $genreIds; }
    public function setPopularity(float $popularity): void { $this->popularity = $popularity; }
    public function setVoteCount(int $voteCount): void { $this->voteCount = $voteCount; }
    public function setVoteAverage(float $voteAverage): void { $this->voteAverage = $voteAverage; }
    public function setOriginCountry(array $originCountry): void { $this->originCountry = $originCountry; }

    public static function getPopularSeries(): array
    {
        $apiKey = '454b45a1be533c307cf83a5462a0e3e9';
        $url = "https://api.themoviedb.org/3/tv/popular?api_key={$apiKey}&language=fr-FR";
        
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        
        $series = [];
        foreach ($data['results'] as $serieData) {
            $serie = new self();
            $serie->setId($serieData['id']);
            $serie->setName($serieData['name']);
            $serie->setOriginalName($serieData['original_name']);
            $serie->setPosterPath($serieData['poster_path']);
            $serie->setBackdropPath($serieData['backdrop_path']);
            $serie->setOverview($serieData['overview']);
            $serie->setFirstAirDate($serieData['first_air_date']);
            $serie->setOriginalLanguage($serieData['original_language']);
            $serie->setGenreIds($serieData['genre_ids']);
            $serie->setPopularity($serieData['popularity']);
            $serie->setVoteCount($serieData['vote_count']);
            $serie->setVoteAverage($serieData['vote_average']);
            $serie->setOriginCountry($serieData['origin_country']);
            
            $series[] = $serie;
        }
        
        return $series;
    }
}
