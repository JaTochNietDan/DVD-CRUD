<?php

include('models/DVD.php');

class MainController
{
    public static function index()
    {
        $dvds = DVD::All();
        
        return View::Show('index', array('dvds' => $dvds));
    }
    
    public static function show($id)
    {
        $dvd = DVD::Find($id);
        
        if(!$dvd)
        {
            Flash::Error('DVD Not found!');
            return View::Redirect('index.php');
        }
            
        return View::Show('show', array('dvd' => $dvd));
    }
    
    public static function delete()
    {
        if(!Input::check_token())
        {
            Flash::Error('Invalid token, CSRF attack detected.');
            return View::Redirect('/');
        }
        
        $dvd = DVD::Find(Input::get('id'));
        
        if(!$dvd)
        {
            Flash::Error('DVD Not found!');
            return View::Redirect('index.php');
        }
            
        $dvd->delete();
        
        Flash::Success('DVD successfully deleted!');
        
        return View::Redirect('index.php');
    }
    
    public static function update($id)
    {
        if(!Input::check_token())
        {
            Flash::Error('Invalid token, CSRF attack detected.');
            return View::Redirect('/');
        }
        
        $dvd = DVD::Find($id);
        
        if(!$dvd)
        {
            Flash::Error('DVD Not found!');
            return View::Redirect('index.php');
        }
        
        $v = Validator::make(Input::all(), DVD::$rules);
        
        if($v->hasErrors())
        {
            Flash::Error($v->errors());
            return View::Show('edit', array('dvd' => $dvd));
        }
        
        $dvd->update(Input::all());
        
        Flash::Success('Successfully edited DVD!');
        
        return View::Redirect('index.php');
    }
    
    public static function edit($id)
    {
        $dvd = DVD::Find($id);
        
        if(!$dvd)
        {
            Flash::Error('DVD Not found!');
            return View::Redirect('index.php');
        }
        
        return View::Show('edit', array('dvd' => $dvd));
    }
    
    public static function create()
    {
        return View::Show('create');
    }
    
    public static function store()
    {
        if(!Input::check_token())
        {
            Flash::Error('Invalid token, CSRF attack detected.');
            return View::Redirect('/');
        }
        
        $v = Validator::make(Input::all(), DVD::$rules);
        
        if($v->hasErrors())
        {
            Flash::Error($v->errors());
            return View::Show('create');
        }
        
        DVD::Create(Input::all());
        
        Flash::Success('Successfully created new title!');
        
        return View::Redirect('index.php');
    }
}

?>