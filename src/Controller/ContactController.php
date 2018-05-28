<?php

namespace App\Controller;

use App\Form\Model\Contact;
use App\Form\Type\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ContactController
 * @package App\Form\Type
 */
class ContactController extends Controller
{

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function __invoke(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class, null, [
            'method' => Request::METHOD_POST,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Contact $contact */
            $contact = $form->getData();

            $message = (new \Swift_Message('[Website] Demande de contact leamuller.com - ' . $contact->getEmail()))
                ->setFrom($contact->getEmail())
                ->setTo('contact@leamuller.com')
                ->setBody(
                    $this->renderView(
                        'email/contact.html.twig',
                        [
                            'contact' => $contact,
                        ]
                    ),
                    'text/html'
                );

            foreach ($contact->getImages() as $image) {
                if (!$image instanceof UploadedFile) {
                    continue;
                }

                $message->attach(
                    \Swift_Attachment::fromPath(
                        $image->getRealPath()
                    )
                        ->setFilename(
                            $image->getClientOriginalName()
                        )
                        ->setContentType(
                            $image->getClientMimeType()
                        )
                );
            }

            try {
                $mailer->send($message);
            } catch (\Exception $e) {

            }

            return $this->redirectToRoute('contact', [
                'success' => true,
            ]);
        }

        return $this->render('pages/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
