<?php
namespace App\Controller;
use App\Data\Data;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PeopleController extends Controller
{
    /**
     * @Route("/people", name="people")
     */
    public function index()
    {
        return $this->render('people/index.html.twig', [
            'controller_name' => 'PeopleController',
        ]);
    }
    /**
     * @Route("/validatePerson/{element}", name="validatePerson")
     * @Method({"POST"})
     */
    public function validateStudent(Data $data, Request $request, $element)
    {
        try {
            $input = json_decode($request->getContent(), true)['input'];
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Invalid method'], Response::HTTP_BAD_REQUEST);
        }
        switch ($element) {
            case 'name':
                return new JsonResponse(['valid' => in_array(strtolower($input), $data->getStudents())]);
        }
        return new JsonResponse(['error' => 'Invalid method'], Response::HTTP_BAD_REQUEST);
    }
    /**
     * @Route("/validateTeam/{element}", name="validateTeam")
     * @Method({"POST"})
     */
    public function validateTeam(Data $data, Request $request, $element)
    {
        try {
            $input = json_decode($request->getContent(), true)['input'];
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Invalid method'], Response::HTTP_BAD_REQUEST);
        }
        switch ($element) {
            case 'name':
                return new JsonResponse(['valid' => in_array(strtolower($input), $data->getTeams())]);
        }
        return new JsonResponse(['error' => 'Invalid method'], Response::HTTP_BAD_REQUEST);
    }
}