<?php

namespace App\Controller;

class AdminController extends BaseController
{
    public function categories() {
        return $this->render('Admin\admin_categories.html.twig');
    }

    public function categories_new() {
        return $this->render('Admin\admin_categories_new.html.twig');
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