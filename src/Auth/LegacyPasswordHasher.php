<?php
namespace App\Auth;

use Cake\Auth\AbstractPasswordHasher;

class LegacyPasswordHasher extends AbstractPasswordHasher
{

    public function hash($password)
    {
        return sha1($password);
    }

    public function check($password, $hashedPassword)
    {
        return sha1($password) === $hashedPassword;
    }

public function initialize()
{
    parent::initialize();
    $this->Auth->config('checkAuthIn', 'Controller.initialize');
    $this->loadComponent('Auth', [
        'authenticate' => [
            'Form' => [
                'passwordHasher' => [
                    'className' => 'Fallback',
                    'hashers' => [
                        'Default',
                        'Weak' => ['hashType' => 'sha1']
                    ]
                ]
            ]
        ]
    ]);

}
public function login()
{
    
    if ($this->request->is('post')) {
        $user = $this->Auth->identify();
        if ($user) {
            $this->Auth->setUser($user);
            if ($this->Auth->authenticationProvider()->needsPasswordRehash()) {
                $user = $this->Users->get($this->Auth->user('id'));
                $user->password = $this->request->getData('password');
                $this->Users->save($user);
            }
            return $this->redirect($this->Auth->redirectUrl());
        }
       return $this->Auth->user('id');
    }
}
public function register()
{
    $user = $this->Users->newEntity($this->request->getData());
    if ($this->Users->save($user)) {
        $this->Auth->setUser($user->toArray());
        return $this->redirect([
            'controller' => 'Users',
            'action' => 'home'
        ]);
    }
}
public function logout()
{
    return $this->redirect($this->Auth->logout());
}
}
