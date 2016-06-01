<?php

/**
 * Controller por defecto si no se usa el routes
 * 
 */
class LoginController extends AppController
{

    public function index()
    {
        
        
        View::template('login');
        if ((new Sesion)->logged()) {
            Flash::info('Usted ya está logeado. No es necesario entrar nuevamente.');
            return Redirect::to('index');
        }
        if (Input::hasPost('email')) {
            if ((new Sesion)->setLogin(Input::post('email'), Input::post('password'))) {
                return Redirect::to('index');
            } else {
                Flash::error('Hubo un error al procesar su acceso. Intente nuevamente');
            }
        }
    }
 
    function logout() {
        Sesion::destroy();
        Flash::info('Hasta pronto.');
        return Redirect::to('/login');
    }
}
