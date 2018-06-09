<?php

namespace App\Controller;

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
        $pastels = [
            [
                'img' => 'img/photos/ondine-2.jpg',
                'title' => "Sacré de Birmanie, 30x40cm",
            ],

            [
                'img' => 'img/photos/photo-9.jpg',
                'title' => "Méduse, 24x32cm",
            ],

            [
                'img' => 'img/photos/photo-16.jpg',
                'title' => "Cavalier King Charles, 30x40cm",
            ],

            [
                'img' => 'img/photos/photo-25.jpg',
                'title' => "Macaque de Barbarie, 18x24cm",
            ],

            [
                'img' => 'img/photos/salem-2.jpg',
                'title' => "Bleu russe, 30x40cm",
            ],

            [
                'img' => 'img/photos/photo-11.jpg',
                'title' => "Hibou & Harfang des neiges, format A3",
            ],

            [
                'img' => 'img/photos/photo-14.jpg',
                'title' => "Berger Allemand, 30x40cm",
            ],

            [
                'img' => 'img/photos/d45399_bf5fec1de6fc49f8bce8f4bbb77db0ad_mv2_d_4000_6000_s_4_2.jpg',
                'title' => "Chat, 30x40cm",
            ],

            [
                'img' => 'img/photos/photo-23.jpg',
                'title' => "Calopsittes, 18x24cm",
            ],

            [
                'img' => 'img/photos/IMG_2679.jpg',
                'title' => "Panthère noire, format A4",
            ],

            [
                'img' => 'img/photos/IMG_2676.jpg',
                'title' => "Smaug, format A4",
            ],

            [
                'img' => 'img/photos/photo-12.jpg',
                'title' => "Sacré de Birmanie, format A3",
            ],
        ];

        $paintings = [
            [
                'img' => 'img/photos/raton-laveur.jpg',
                'title' => "Raton laveur, 20x20cm",
            ],

            [
                'img' => 'img/photos/photo-19.jpg',
                'title' => "Irish Cob, 56x56cm",
            ],

            [
                'img' => 'img/photos/photo-18.jpg',
                'title' => "Bergers Malinois, 73x54cm",
            ],

            [
                'img' => 'img/photos/photo-26.jpg',
                'title' => "Martin Pêcheur, 11cm",
            ],

            [
                'img' => 'img/photos/photo-3.jpg',
                'title' => "Cocker, 38x55cm",
            ],

            [
                'img' => 'img/photos/photo-4.jpg',
                'title' => "Gorille, 24x30cm",
            ],

            [
                'img' => 'img/photos/photo-20.jpg',
                'title' => "Papillon, 11cm",
            ],

            [
                'img' => 'img/photos/photo-10.jpg',
                'title' => "Chat Noir, 20x20cm",
            ],

            [
                'img' => 'img/photos/photo-15.jpg',
                'title' => "Berger Australien, 30x40cm",
            ],

            [
                'img' => 'img/photos/cigogne.jpg',
                'title' => "Cigogne, 24x30cm",
            ],

            [
                'img' => 'img/photos/meduse.jpg',
                'title' => "Méduse, 60x30cm",
            ],

            [
                'img' => 'img/photos/chimpanze-min.jpg',
                'title' => "Chimpanzé, 50x73cm",
            ],

            [
                'img' => 'img/photos/photo-6.jpg',
                'title' => "Hérisson, 20x20cm",
            ],

            [
                'img' => 'img/photos/photo-17.jpg',
                'title' => "Lémurien, 11cm",
            ],

            [
                'img' => 'img/photos/photo-27.jpg',
                'title' => "Perroquet, 41x27cm",
            ],

            [
                'img' => 'img/photos/photo-29.jpg',
                'title' => "Toucan, 40x80cm",
            ],
        ];

        $watercolors = [
            [
                'img' => 'img/photos/photo-0.jpg',

                'title' => 'Rouge-gorge, format A5',
            ],

            [
                'img' => 'img/photos/photo-5.jpg',
                'title' => "Guépard, Format A5",
            ],

            [
                'img' => 'img/photos/photo-21.jpg',
                'title' => "Raton Laveur, format A4",
            ],

            [
                'img' => 'img/photos/photo-13.jpg',
                'title' => 'Les Inséparables, format A5',
            ],
            [
                'img' => 'img/photos/photo-7.jpg',
                'title' => "Héron, 24X32cm",
            ],

            [
                'img' => 'img/photos/photo-1.jpg',

                'title' => 'Jack Russel, format A5',
            ],

            [
                'img' => 'img/photos/photo-2.jpg',
                'title' => 'Cochons d\'Inde, 10x15cm',
            ],
            [
                'img' => 'img/photos/photo-22.jpg',
                'title' => "Cheval,format A5",
            ],

            [
                'img' => 'img/photos/photo-28.jpg',
                'title' => 'Cheval, format A4',
            ],
            [
                'img' => 'img/photos/photo-24.jpg',
                'title' => "Gorille, format A5",
            ]
        ];

        return $this->render('pages/gallery.html.twig', [
            'arrPastels' => array_chunk($pastels, ceil(count($pastels) / 3)),
            'arrPaintings' => array_chunk($paintings, ceil(count($paintings) / 3)),
            'arrWatercolors' => array_chunk($watercolors, ceil(count($watercolors) / 3)),
        ]);
    }
}
