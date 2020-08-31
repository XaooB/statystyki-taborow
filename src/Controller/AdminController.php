<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\AdminCategoriesType;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends BaseController
{
    public function categories() {
        $em = $this->getDoctrine()->getManager()->getRepository(Category::class);
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

            $this->addFlash('success', 'Kategoria została dodana!');
            return $this->redirectToRoute('admin_categories');
        }

        return $this->render('Admin\admin_categories_new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function institutions() {
        return $this->render('Admin\admin_institutions.html.twig');
    }

    public function institutions_new() {
        return $this->render('Admin\admin_institutions_new.html.twig');
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