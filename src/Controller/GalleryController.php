<?php

namespace App\Controller;

use Contentful\Delivery\Query;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class GalleryController
 * @package App\Controller
 */
class GalleryController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function __invoke(Request $request)
    {
        $client = $this->get('contentful.delivery');

        $query = new Query();
        $query->setContentType('galleryImage')
            ->orderBy('fields.position');

        $galleryImages = $client->getEntries($query);
        $pastels = [];
        $paintings = [];
        $watercolors = [];

        foreach ($galleryImages as $galleryImage) {

//            echo $galleryImage->getImage()->getFile()->getUrl();
//            echo $galleryImage->getTitle();
//            echo $galleryImage->getPosition();
//            echo $galleryImage->getCategory();

            if ($galleryImage->getCategory() === 'Pastel'){
                $pastels[]= $galleryImage;
            };
            if ($galleryImage->getCategory() === 'Aquarelle'){
                $watercolors[]= $galleryImage;
            };
            if ($galleryImage->getCategory() === 'Peinture'){
                $paintings[]= $galleryImage;
            };
//            echo "<br>";
        }

//        var_dump(count($pastels));
//        var_dump(count($watercolors));
//        var_dump(count($paintings));

        return $this->render('pages/gallery.html.twig', [
            'arrPastels' => array_chunk($pastels, ceil(count($pastels) / 3)),
            'arrPaintings' => array_chunk($paintings, ceil(count($paintings) / 3)),
            'arrWatercolors' => array_chunk($watercolors, ceil(count($watercolors) / 3)),
        ]);
    }
}
