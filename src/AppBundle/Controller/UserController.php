<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Get;
use AppBundle\Entity\User;

class UserController extends Controller
{
    /**
     * @Get("/users")
     */
    public function getUsersAction(Request $request)
    {
        $users = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:User')
            ->findAll();

        $formatted = [];
        foreach ($users as $user) {
            $formatted[] = [
                'id' => $user->getId(),
                'firstname' => $user->getFirstname(),
                'lastname' => $user->getLastname(),
                'email' => $user->getEmail(),
            ];
        }

        return new JsonResponse($formatted);
    }

    /**
     * @Get("/users/{user_id}")
     */
    public function getUserAction($user_id, Request $request)
    {
        $user = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:User')
            ->find($user_id);

        if (empty($user)) {
            return new JsonResponse(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }

        $formatted = [
            'id' => $user->getId(),
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
            'email' => $user->getEmail(),
        ];

        return new JsonResponse($formatted);
    }

}