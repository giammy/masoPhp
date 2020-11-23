<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use App\Entity\Utente;;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class RootController extends AbstractController
{
    private $params;

    public function __construct(ParameterBagInterface $params) {
        $this->params = $params;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function homeAction(/*LoggerInterface $appLogger*/)
    {
        $username = $this->get('security.token_storage')->getToken()->getUser()->getUsername();
        //$appLogger->info("IN: homeAction: username='" . $username . "'");

        return $this->render('index.html.twig', [
            'controller_name' => 'HomeController',
            'username' => $username,
        ]);
    }


    /**
     * @Route("/manage/mostrapersona", name="mostrapersona")
     */
    public function mostraPersonaAction(/*LoggerInterface $appLogger*/)
    {
        $username = $this->get('security.token_storage')->getToken()->getUser()->getUsername();
	$allowedUsers = preg_split('/, */', $this->params->get('users_manager'));
        if (!in_array($username, $allowedUsers)) {
            //$appLogger->info("IN: showallAction: username='" . $username . "' NOT allowed");
            return $this->redirectToRoute('homepage');
        }
        //$appLogger->info("IN: mostraPersona: username='" . $username . "'");
        $repo = $this->getDoctrine()->getRepository(Utente::class);
	$listToShow = $repo->findAll();

        return $this->render('mostrapersona.html.twig', [
            'controller_name' => 'mostraPersonaController',
            'username' => $username,
	    'list' => $listToShow,
        ]);
    }

    public function creaCodiceUtente($repo) {
        $len = intval($this->params->get('codice_utente_length'));
	do {
	    for ($randomNumber = mt_rand(1, 9), $i = 1; $i < $len; $i++) {
                $randomNumber .= mt_rand(0, 9);
            }
	    $obj = $repo->findOneBy(['CodiceUtente' => $randomNumber]);
        } while (!is_null($obj));
        return $randomNumber;
    }

    /**
     * @Route("/manage/modificapersona/{id}", name="modificapersona")
     */
    public function modificaPersonaAction(Request $request, /*LoggerInterface $appLogger*/$id="-1")
    {
        $id = intval($id);
        $username = $this->get('security.token_storage')->getToken()->getUser()->getUsername();
	$allowedUsers = preg_split('/, */', $this->params->get('users_manager'));
        if (!in_array($username, $allowedUsers)) {
            //$appLogger->info("IN: showallAction: username='" . $username . "' NOT allowed");
            return $this->redirectToRoute('homepage');
        }
        //$appLogger->info("IN: mostraPersona: username='" . $username . "'");

        $repo = $this->getDoctrine()->getRepository(Utente::class);

        // if id == -1 -> new user, else edit id user TODO
	$account = $repo->find($id);
        if (!$account) {
            // id does not exist: create new user
            $account = new Utente();
	    //$dt = new \DateTime(date('Y-m-d H:i:s'));
            //$account->setCreated($dt);
            $account->setCodiceUtente($this->creaCodiceUtente($repo));
        }

        $form = $this->createFormBuilder($account)
            ->add('cognome', TextType::class, array(
                         'required' => false,))
	    ->add('nome', TextType::class, array(
                         'required' => false,))
            ->add('soprannome', TextType::class, array(
                         'required' => false,))
            ->add('indirizzo', TextType::class, array(
                         'required' => false,))
            ->add('citta', TextType::class, array(
                         'required' => false,))
            ->add('provincia', TextType::class, array(
                         'required' => false,))
            ->add('stato', TextType::class, array(
                         'required' => false,))
            ->add('codiceFiscale', TextType::class, array(
                         'required' => false,))
            ->add('telefono1', TextType::class, array(
                         'required' => false,))
            ->add('telefono2', TextType::class, array(
                         'required' => false,))
            ->add('email', TextType::class, array(
                         'required' => false,))
            ->add('nota', TextType::class, array(
                         'required' => false,))
            ->getForm();
	$theClass = "button";
        $theStyle = "width:256px;";
        $form->add('salva', SubmitType::class, array('label' => 'SALVA',
                'attr' => array('class' => $theClass, 'style' => $theStyle )
            ));

	$form->handleRequest($request);

	if ($form->isSubmitted() && $form->isValid()) {
             // $form->getData() holds the submitted values
             // but, the original variable has also been updated
	     $account = $form->getData();

             $em = $this->getDoctrine()->getManager();
             $em->persist($account);
             $em->flush();
             return $this->redirectToRoute('mostrapersona');
       }

        return $this->render('modificapersona.html.twig', [
            'form' => $form->createView(),
            'controller_name' => 'HomeController',
            'username' => $username,
            'id' => $id,
        ]);
    }

    /**
     * @Route("/manage/cancellapersona/{id}", name="cancellapersona")
     */
    public function cancellaPersonaAction(Request $request, /*LoggerInterface $appLogger*/$id="-1")
    {
        $id = intval($id);
        $username = $this->get('security.token_storage')->getToken()->getUser()->getUsername();
	$allowedUsers = preg_split('/, */', $this->params->get('users_manager'));
        if (!in_array($username, $allowedUsers)) {
            //$appLogger->info("IN: showallAction: username='" . $username . "' NOT allowed");
            return $this->redirectToRoute('homepage');
        }
        //$appLogger->info("IN: mostraPersona: username='" . $username . "'");

        $repo = $this->getDoctrine()->getRepository(Utente::class);

	$account = $repo->find($id);
        if ($account) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($account);
            $em->flush();
        }

        return $this->redirectToRoute('mostrapersona');
    }

}