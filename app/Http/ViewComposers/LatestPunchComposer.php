<?php

namespace App\Http\ViewComposers;

use App\Repositories\HumanResources\Employees\Reports;
use App\Repositories\PunchRepository;
use Illuminate\View\View;

class LatestPunchComposer
{
    /**
     * Create a new profile composer.
     *
     * @param  Reports $reports
     *
     * @return void
     */
    public function __construct(
        /**
         * The user repository implementation.
         */
        protected PunchRepository $repo
    )
    {
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'next_punch_id' => $this->repo->nextPunchId(),
        ]);
    }
}
