<?php

class Cursos extends Controller {

    function __construct() {
        parent::__construct();
        //Auth::autentica();
        $this->view->js = array('cursos/cursos.js');
    }
    
    function index() {
        $this->view->title = 'Manutenção de Cursos';
		$this->view->render('header');
        $this->view->render('cursos/index');
		$this->view->render('footer');
    }
     function addCurso()
    {
        $this->model->insert();
    }
    
	function listaCursos()
    {
        $this->model->listaCursos();
    }
	
	function del()
    {
        $this->model->del();
    }
	
	
	function loadData($id)
    {
        $this->model->loadData($id);
    }
	
	function save()
    {
        $this->model->save();
    }
}