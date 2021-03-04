<?php


namespace App\Service\Testimonials;


use App\Entity\Testimonials;

interface TestimonialsServiceInterface
{
public function insert(Testimonials $testimonials):bool;
public function getAllByUserComets(int $id):array;
public function getAllComets():array;
}