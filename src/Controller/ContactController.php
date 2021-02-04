<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/contact", name="contact_")
*/
class ContactController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param Request $request
     * @param MailerInterface $mailer
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form =$this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $email = (new Email())
                ->from($contact->getEmail())
                ->to($this->getParameter('mailer_from'))
                ->subject($contact->getSubject())
                ->html($this->renderView('contact/mail.html.twig', [
                    'contact' => $contact,
                ]));
            $mailer->send($email);
            $this->addFlash('success', 'Votre message a bien été envoyé !');
            return $this->redirectToRoute('contact_index');
        }
        return $this->render('contact/index.html.twig',  [
            "form" => $form->createView()
        ]);
    }
}
