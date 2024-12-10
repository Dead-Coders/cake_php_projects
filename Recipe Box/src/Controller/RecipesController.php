<?php


namespace App\Controller;


use App\Form\RecipesForm;
use App\Model\Document\RecipesDocument;
use Cake\ORM\Entity;

class RecipesController extends AppController
{
    /**
     * @var RecipesDocument
     */
    private $Recipes;

    /**
     * @inheritDoc
     */
    public function initialize(): void
    {
        $this->Recipes = new RecipesDocument();
        parent::initialize(); // TODO: Change the autogenerated stub
    }

    /**
     * Index action
     *
     * @return void
     */
    public function index()
    {
        $Model = new RecipesDocument();
        $recipes = $Model->getAll(true);
        $this->set(compact('recipes'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recipe = $this->Recipes->get($id);

        $this->set(compact('recipe'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $form = new RecipesForm();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if ($form->execute($data)) {
                $data['ingredients'] = explode(',', $data['ingredients']);
                $this->Recipes->save(new Entity($data));
                $this->Flash->success(__('The recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
        }
        $this->viewBuilder()->setTemplate('form');
        $this->set(compact('form'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function edit($id)
    {
        $recipe = $this->Recipes->get($id);
        $recipe = json_decode(json_encode($recipe), true);
        $form = new RecipesForm();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if ($form->execute($data)) {
                $data['ingredients'] = explode(',', $data['ingredients']);
                $entity = new Entity($recipe);
                $entity = $entity->set($data);
                $this->Recipes->save($entity);
                $this->Flash->success(__('The recipe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recipe could not be saved. Please, try again.'));
        } else {
            $recipe['ingredients'] = implode(',',  $recipe['ingredients'] ?? []);
            $form->setData($recipe);
        }
        $this->viewBuilder()->setTemplate('form');
        $this->set(compact('form'));
    }

}
