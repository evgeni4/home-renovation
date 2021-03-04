<?php


namespace App\Service\Testimonials;


use App\Entity\Testimonials;
use App\Repository\TestimonialsRepository;

class TestimonialsService implements TestimonialsServiceInterface
{
private $testimonialsRepository;

    /**
     * TestimonialsService constructor.
     * @param $testimonialsRepository
     */
    public function __construct(TestimonialsRepository $testimonialsRepository)
    {
        $this->testimonialsRepository = $testimonialsRepository;
    }

    public function insert(Testimonials $testimonials): bool
    {
        return $this->testimonialsRepository->add($testimonials);
    }

    public function getAllByUserComets(int $id): array
    {
        return $this->testimonialsRepository->findBy(['author'=>$id]);
    }

    public function getAllComets(): array
    {
       return $this->testimonialsRepository->findAll();
    }
}