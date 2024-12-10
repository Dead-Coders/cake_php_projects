<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\Query;

/**
 * Blogs Controller
 *
 * @property \App\Model\Table\BlogsTable $Blogs
 * @method \App\Model\Entity\Blog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BlogsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Blogs->find('index', [
            'tagSlug' => $this->request->getParam('tag_slug'),
            'search' => $this->request->getQueryParams(),
        ]);

        $blogs = $this->paginate($query)->toArray();

        $this->set(compact('blogs'));
    }

    /**
     * View method
     *
     * @param string|null $slug Blog slug.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $blog = $this->Blogs->find('slugged', [
            'contain' => ['Tags'],
            'slug' => $slug,
        ])->firstOrFail();

        $this->set(compact('blog'));
    }
}
