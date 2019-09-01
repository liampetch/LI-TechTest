<?php

namespace App\Controller;


use App\Repository\SoldPropertyRepository;
use App\View\SoldPropertiesView;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class PropertiesController extends AbstractController
{
    private $soldPropertyRepository;

    public function __construct(SoldPropertyRepository $propertyRepository)
    {
        $this->soldPropertyRepository = $propertyRepository;
    }

    public function list(Request $request)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        return new Response(
            $serializer->serialize($this->soldPropertyRepository->getAll(), 'json')
        );
    }
}
