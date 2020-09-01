<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Institution;
use App\Form\AdminCategoriesType;
use App\Form\AdminInstitutionsType;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends BaseController
{
    public function categories() {
        $em = $this->getEntity(Category::class);
        $categories = $em->findAll();

        return $this->render('Admin\admin_categories.html.twig', [
            'categories' => $categories
        ]);
    }

    public function categories_new(Request $request) {
        $categories = new Category();
        $form = $this->createForm(AdminCategoriesType::class, $categories);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categories);
            $em->flush();

            $this->addFlash('success', $this->getText('admin_database_saved'));
            return $this->redirectToRoute('admin_categories');
        }

        return $this->render('Admin\admin_categories_new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function institutions() {
        $em = $this->getEntity(Institution::class);
        $institutions = $em->findAll();

        return $this->render('Admin\admin_institutions.html.twig', [
            'institutions' => $institutions
        ]);
    }

    public function institutions_new(Request $request) {
        $institution = new Institution();
        $form = $this->createForm(AdminInstitutionsType::class, $institution);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form ->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($institution);
            $em->flush();

            $this->addFlash('success', $this->getText('admin_database_saved'));
            return $this->redirectToRoute('admin_institutions');
        }

        return $this->render('Admin\admin_institutions_new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function vehicles() {
        return $this->render('Admin\admin_vehicles.html.twig');
    }

    public function vehicles_new() {
        return $this->render('Admin\admin_vehicles_new.html.twig');
    }

    public function repairs() {
        return $this->render('Admin\admin_repairs.html.twig');
    }

    public function repairs_new() {
        return $this->render('Admin\admin_repairs_new.html.twig');
    }

    public function performers() {
        return $this->render('Admin\admin_performers.html.twig');
    }

    public function performers_new() {
        return $this->render('Admin\admin_performers_new.html.twig');
    }

}