<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Place;

class PlaceController extends Controller
{

    /**
     * @Rest\View()
     * @Rest\Get("/places")
     */
    public function getPlacesAction(Request $request)
    {
        $places = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Place')
            ->findAll();

        return $places;
    }

//    /**
//     * @Get("/places/{id}")
//     */
//    public function getPlaceAction($id, Request $request)
//    {
//        $place = $this->getDoctrine()->getManager()
//            ->getRepository('AppBundle:Place')
//            ->find($id);
//
//        if (empty($place)) {
//            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
//        }
//
//        $formatted = [
//            'id' => $place->getId(),
//            'name' => $place->getName(),
//            'address' => $place->getAddress(),
//        ];
//
//        return new JsonResponse($formatted);
//    }
}