<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Item;
use AppBundle\Form\ItemType;
use AppBundle\Repository\ItemRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index.home")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/features", name="index.features")
     */
    public function featuresAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/features.html.twig');
    }

    /**
     * @Route("/form/item", name="form.item")
     */
    public function itemAction(Request $request)
    {

        // check if form is legal
        $item = New Item();
        $item->setName($request->request->get('name'));
        $item->setPrice($request->request->get('price'));
        $item->setMoney($request->request->get('money'));

        $form = $this->createForm(ItemType::class,$item);

        $form->handleRequest($request);

        if($form->er)

        return $this->render('forms/items.html.twig');

    }
}
