<?php
namespace App\Repositories;
use App\Contracts\BookingMovieRepository;
use App\Models\BookingMovie;
class BookingMovieRepositoryEloquent extends AbstractRepositoryEloquent implements BookingMovieRepository
{
    public function model()
    {
        return new BookingMovie;
    }    
}