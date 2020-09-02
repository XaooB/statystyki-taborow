<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Institution;
use App\Entity\Performer;
use App\Entity\Vehicle;
use App\Form\AdminCategoriesType;
use App\Form\AdminInstitutionsType;
use App\Form\AdminPerformersType;
use App\Form\AdminVehiclesType;
use App\Services\DoctrineManagerService;
use App\Services\TextDictionary;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends BaseController
{
    /**
     * @var DoctrineManagerService
     */
    protected $em;

    /**
     * @var TextDictionary
     */
    protected $textDictionary;

    public function __construct(TextDictionary $textDictionary, DoctrineManagerService $em)
    {
        $this->textDictionary = $textDictionary;
        $this->em = $em;
    }

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
            $this->em->save($categories);

            $this->addFlash('success', $this->textDictionary->getText('admin_database_saved'));
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
            $this->em->save($institution);

            $this->addFlash('success', $this->$this->textDictionary->getText('admin_database_saved'));
            return $this->redirectToRoute('admin_institutions');
        }

        return $this->render('Admin\admin_institutions_new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function vehicles() {
        $em = $this->getEntity(Vehicle::class);
        $vehicles = $em->findAll();

        return $this->render('Admin\admin_vehicles.html.twig', [
            'vehicles' => $vehicles
        ]);
    }

    public function vehicles_new(Request $request) {
        $vehicle = new Vehicle();
        $form = $this->createForm(AdminVehiclesType::class, $vehicle);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->save($vehicle);

            $this->addFlash('success', $this->textDictionary->getText('admin_database_saved'));
            return $this->redirectToRoute('admin_vehicles');
        }
        return $this->render('Admin\admin_vehicles_new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function repairs() {
        return $this->render('Admin\admin_repairs.html.twig');
    }

    public function repairs_new() {
        return $this->render('Admin\admin_repairs_new.html.twig');
    }

    public function performers() {
        $em = $this->getEntity(Performer::class);
        $performers = $em->findAll();

        return $this->render('Admin\admin_performers.html.twig', [
            'performers' => $performers
        ]);
    }

    public function performers_new(Request $request) {
        $performers = new Performer();
        $form = $this->createForm(AdminPerformersType::class, $performers);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->save($performers);

            $this->addFlash('success', $this->textDictionary->getText('admin_database_saved'));
            return $this->redirectToRoute('admin_performers');
        }
        return $this->render('Admin\admin_performers_new.html.twig', [
            'form' => $form->createView()
        ]);
    }

}