<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Get;
use AppBundle\Entity\Place;

class PlaceController extends Controller
{

    /**
     * @Get("/places")
     */
    public function getPlacesAction(Request $request)
    {
        $places = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Place')
            ->findAll();

        $formatted = [];
        foreach ($places as $place) {
            $formatted[] = [
                'id' => $place->getId(),
                'name' => $place->getName(),
                'address' => $place->getAddress(),
            ];
        }

        return new JsonResponse($formatted);
    }

    /**
     * @Get("/places/{id}")
     */
    public function getPlaceAction($id, Request $request)
    {
        $place = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Place')
            ->find($id);

        if (empty($place)) {
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }

        $formatted = [
            'id' => $place->getId(),
            'name' => $place->getName(),
            'address' => $place->getAddress(),
        ];

        return new JsonResponse($formatted);
    }
}