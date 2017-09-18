<?php

namespace BackendBundle\Controller;

use BackendBundle\Entity\Nutrition;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Nutrition controller.
 *
 * @Route("nutrition")
 */
class NutritionController extends Controller
{
    /**
     * Lists all nutrition entities.
     *
     * @Route("/", name="nutrition_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $nutritions = $em->getRepository('BackendBundle:Nutrition')->findAll();

        return $this->render('nutrition/index.html.twig', array(
            'nutritions' => $nutritions,
        ));
    }

    /**
     * Creates a new nutrition entity.
     *
     * @Route("/new", name="nutrition_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $nutrition = new Nutrition();
        $form = $this->createForm('BackendBundle\Form\NutritionType', $nutrition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $nutrition->getIllustration();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                "uploads",
                $fileName
            );
            $nutrition->setIllustration($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($nutrition);
            $em->flush();

            return $this->redirectToRoute('nutrition_show', array('id' => $nutrition->getId()));
        }

        return $this->render('nutrition/new.html.twig', array(
            'nutrition' => $nutrition,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a nutrition entity.
     *
     * @Route("/{id}", name="nutrition_show")
     * @Method("GET")
     */
    public function showAction(Nutrition $nutrition)
    {
        $deleteForm = $this->createDeleteForm($nutrition);

        return $this->render('nutrition/show.html.twig', array(
            'nutrition' => $nutrition,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing nutrition entity.
     *
     * @Route("/{id}/edit", name="nutrition_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Nutrition $nutrition)
    {
        $deleteForm = $this->createDeleteForm($nutrition);
        $editForm = $this->createForm('BackendBundle\Form\NutritionType', $nutrition);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $file = $nutrition->getIllustration();
            
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                "uploads",
                $fileName
            );
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('nutrition_edit', array('id' => $nutrition->getId()));
        }

        return $this->render('nutrition/edit.html.twig', array(
            'nutrition' => $nutrition,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a nutrition entity.
     *
     * @Route("/{id}", name="nutrition_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Nutrition $nutrition)
    {
        $form = $this->createDeleteForm($nutrition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($nutrition);
            $em->flush();
        }

        return $this->redirectToRoute('nutrition_index');
    }

    /**
     * Creates a form to delete a nutrition entity.
     *
     * @param Nutrition $nutrition The nutrition entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Nutrition $nutrition)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nutrition_delete', array('id' => $nutrition->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
