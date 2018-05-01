<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SeoController extends Controller
{
    private $urlPart = "/public/json/data.json";
    /**
     * @Route("/studentai", name="studentai")
     */
    public function index()
    {
        $url = $this->get('kernel')->getProjectDir() . $this->urlPart;
        $json = file_get_contents($url);
        $data = json_decode($json, true);

        return $this->render('seo/index.html.twig',
            [
                'title' => 'Studentai',
                'data' => $data
            ]);
    }

    /**
     * @Route("/akademija", name="akademija")
     */
    public function akademija(Request $request)
    {
        $utm_campaign = $request->get('utm_campaign');
        $utm_term = $request->get('utm_term');
        $utm_content = $request->get('utm_content');
        $url = $this->get('kernel')->getProjectDir() . $this->urlPart;
        $json = file_get_contents($url);
        $data = json_decode($json, true);

        return $this->render('seo/scores.html.twig',
            [
                'utm_campaign' => $utm_campaign,
                'utm_term' => $utm_term,
                'utm_content' => $utm_content,
                'data' => $data
            ]);
    }
}
