<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Heroes Controller
 *
 * @property \App\Model\Table\HeroesTable $Heroes
 *
 * @method \App\Model\Entity\Hero[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HeroesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $heroes = $this->paginate($this->Heroes);

        $this->set(compact('heroes'));
    }

    /**
     * View method
     *
     * @param string|null $id Hero id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hero = $this->Heroes->get($id, [
            'contain' => []
        ]);

        $this->set('hero', $hero);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hero = $this->Heroes->newEntity();
        if ($this->request->is('post')) {
            $hero = $this->Heroes->patchEntity($hero, $this->request->getData());
            if ($this->Heroes->save($hero)) {
                $this->Flash->success(__('The hero has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hero could not be saved. Please, try again.'));
        }
        $this->set(compact('hero'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hero id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hero = $this->Heroes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hero = $this->Heroes->patchEntity($hero, $this->request->getData());
            if ($this->Heroes->save($hero)) {
                $this->Flash->success(__('The hero has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hero could not be saved. Please, try again.'));
        }
        $this->set(compact('hero'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hero id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hero = $this->Heroes->get($id);
        if ($this->Heroes->delete($hero)) {
            $this->Flash->success(__('The hero has been deleted.'));
        } else {
            $this->Flash->error(__('The hero could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
