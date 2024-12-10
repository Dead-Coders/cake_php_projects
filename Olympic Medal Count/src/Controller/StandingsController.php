<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Countries Controller
 *
 * @property \App\Model\Table\CountriesTable $Countries
 */
class StandingsController extends AppController
{
    /**
     * @inheritDoc
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Countries');
    }

    /**
     *
     */
    public function index()
    {
        $countries = $this->Countries->find()
            ->orderDesc('gold_medal_count')
            ->orderDesc('silver_medal_count')
            ->orderDesc('bronze_medal_count')
            ->toArray();

        $this->set(compact('countries'));
    }

    /**
     *
     * @param string|null $countryId
     */
    public function detail($countryId)
    {
        $this->viewBuilder()->disableAutoLayout();
        $query = $this->Countries->Medals->find('detailCountry', [
            'countryId' => $countryId,
        ]);
        $totals = $query->all();
        $sports = $this->Countries->Medals->Sports->find('list')
            ->where([
                'id IN' => $totals->extract('sport_id')->toList(),
            ])
            ->toArray();

        $this->set(compact('totals', 'sports'));
    }

}
