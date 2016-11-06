<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
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

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/places")
     */
    public function postPlacesAction(Request $request)
    {
        $place = new Place();
        $place->setName($request->get('name'))
              ->setAddress($request->get('address'));

        $em = $this->getDoctrine()->getManager();
        $em->persist($place);
        $em->flush();

        return $place;
    }

    /**
     * @Rest\View()
     * @Rest\Get("/places/{id}")
     */
    public function getPlaceAction(Request $request)
    {
        $place = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Place')
            ->find($request->get('id'));

        if (empty($place)) {
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }

        return $place;
    }
}