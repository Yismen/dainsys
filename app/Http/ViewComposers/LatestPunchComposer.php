<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\PunchRepository;
use App\Repositories\HumanResources\Employees\Reports;

class LatestPunchComposer
{
    /**
     * The user repository implementation.
     *
     * @var Reports
     */
    protected PunchRepository $repo;

    /**
     * Create a new profile composer.
     *
     * @param  Reports $reports
     * @return void
     */
    public function __construct(PunchRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'next_punch_id' => $this->repo->nextPunchId()
        ]);
    }
}
